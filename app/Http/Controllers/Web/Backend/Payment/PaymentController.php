<?php

namespace App\Http\Controllers\Web\Backend\Payment;
use App\Models\TimeSlot;
use App\Notifications\ClientNotification;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Stripe\Account;
use Stripe\Stripe;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AppointmentBooking;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Webhook;

class PaymentController extends Controller
{
    public function __construct()
    {
        \Stripe\Stripe::setApiKey(config('stripe.STRIPE_SECRET_KEY'));
    }

    public function store(Request $request,string $slug)
    {
        $doctor = User::where('role', 'doctor')->where('slug',$slug)->first();
        if (empty($doctor)) {
            return redirect()->back()->with('error','Sorry! Doctor not found');
        }
        // Validate incoming request
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => [
                'required',
                'phone:US'
            ],
            'consultant_type' => 'required|string|max:255',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time_id' => 'required|exists:time_slots,id',
            'message' => 'required|string|max:1000',
        ],[
            'appointment_time_id.required' => 'Appointment Time is required.',
            'appointment_time_id.exists' => 'Appointment Time is not found.',
            'phone.phone' => 'Invalid phone number.',
        ]);

        try {
            $appointmentTime = TimeSlot::find($request->appointment_time_id);
            if (!$appointmentTime) {
                return redirect()->back()->with('error','Appointment Time is not found.');
            }

            $existingBooking = AppointmentBooking::where('psychologist_id',$doctor->id)->whereNot('status','cancelled')->where('appointment_date',$request->appointment_date)->where('appointment_time_id',$appointmentTime->id)->first();
            if (!empty($existingBooking)) {
                return redirect()->back()->withInput()->with('error','This appointment already booked.');
            }
           DB::beginTransaction();
            // Create a new appointment instance
            $appointment = new AppointmentBooking();
            // Assign validated and formatted data to the model
            $appointment->first_name = $request->input('first_name');
            $appointment->last_name = $request->input('last_name');
            $appointment->email = $request->input('email');
            $appointment->phone = $request->input('phone');
            $appointment->user_id = auth()->user()->id;
            $appointment->consultant_type = $request->input('consultant_type');
            $appointment->appointment_date = Carbon::parse($request->input('appointment_date'));
            $appointment->appointment_time = $appointmentTime->start_time;
            $appointment->appointment_time_id = $appointmentTime->id;
            $appointment->psychologist_id = $doctor->id;
            $appointment->message = $request->input('message');
            $appointment->save();

            $appointment->payment()->create([
                "amount" => $doctor->session_price,
                "status" => 'pending',
                'payment_method' => 'stripe',
            ]);

            Account::update($doctor->stripe_acc_id, [
                'capabilities' => [
                    'card_payments' => ['requested' => false],
                    'transfers' => ['requested' => true],
                ],
            ]);

            $session = StripeSession::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => 'Appointment to '.$doctor->name,
                            ],
                            'unit_amount' => $doctor->session_price * 100,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'payment_intent_data' => [
                    'application_fee_amount' => $doctor->session_price > 0 ? ((($doctor->session_price / 100) * 7)  * 100) : 0,
                    'transfer_data' => [
                        'destination' => $doctor->stripe_acc_id,
                    ],
                ],
                'customer_email' => Auth::user()->email,
                'success_url' => route('appointments.success'),
                'cancel_url' => route('appointments.fail'),
                'metadata' => [
                    'appointment_id' => $appointment->id,
                    'payment_type' => 'appointment'
                ],
            ]);

            if ($session->url){
                \DB::commit();
                return redirect()->away($session->url);
            }else{
                \DB::rollBack();
                return redirect()->back()->with('error','Something went wrong.');
            }
        }catch (Exception $e) {
//            dd($e);
            \DB::rollBack();
            return redirect()->back()->with('error','Sorry! this doctor account has some issue.');
        }
    }

    //Handle web hook
    public function handle(Request $request)
    {
        $endpoint_secret = config('stripe.STRIPE_WEBHOOK_SECRET');
        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');
        try {
            $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 500);
        }
        // Handle the event
        switch ($event->type) {
            case 'checkout.session.completed':
                $paymentIntent = $event->data?->object;
                $paymentType = $paymentIntent?->metadata?->payment_type ?? null;
                $appointment_id = $paymentIntent?->metadata?->appointment_id ?? null;
                try {
                    if ($paymentType === 'appointment') {
                        $appointment = AppointmentBooking::with(['user','psychologist'])->findOrFail($appointment_id);
                        $client = $appointment?->user;
                        $doctor = $appointment?->psychologist;
                        if ($appointment !== null) {
                            $appointment->update(['status' => 'confirmed']);
                            $appointment->payment()->update([
                                'transaction_id' => $paymentIntent->payment_intent,
                                'status' => 'completed'
                            ]);
                            // notify user
                            if ($client){
                                $client?->notify(new ClientNotification("Your appointment with {$doctor->name} has been confirmed. The appointment is scheduled for {$appointment?->appointment_time?->format('H:i:s')}."));
                            }
                            if ($doctor){
                                $doctor?->notify(new ClientNotification("You have a new patient appointment scheduled with {$client->name}. Please review the details for confirmation."));
                            }
                            return response()->json(['message' => 'Appointment confirmed successfully.'], 200);
                        } else {
                            return response()->json(['error' => 'appointment not found.'], 200);
                        }
                    } else {
                        return response()->json(['error' => 'Received unknown payment type on meta data'], 200);
                    }
                } catch (\Exception $exception) {
                    return response()->json(['error' => $exception->getMessage()], 500);
                }
                break;
            default:
                return response()->json(['message' => 'Received unknown event type: '.$event->type], 200);
        }
    }



    public function success()
    {
        return redirect()->route('client.dashboard')->with('success','Appointment booked successfully.');
    }
    public function fail()
    {
        return redirect()->route('client.dashboard')->with('error','Payment failed.');
    }

}
