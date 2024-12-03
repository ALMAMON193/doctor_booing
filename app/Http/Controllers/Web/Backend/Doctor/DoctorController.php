<?php

namespace App\Http\Controllers\Web\Backend\Doctor;


use App\Models\AppointmentBooking;
use Exception;
use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class DoctorController extends Controller
{
    public function createPsychologistAccount()
    {
        return view('doctor.create_account');
    }
    public function store(Request $request): ?\Illuminate\Http\RedirectResponse
    {
        // Validation rules
        $request->validate([
            'name' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'dob' => 'required|date',
            'phone' => ['required', 'string', 'max:20','phone:US'],
            'language' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'qualification' => 'required',
            'ahpra_registraion_number' => 'required|string|max:255',
            'practice_name' => 'required|string|max:255',
            'session_duration' => 'required|integer',
            'session_price' => 'required|integer',
            'practice_address' => 'required|string|max:255',
            'therapy_mode' => 'required|string|max:255',
            'client_age_group' => 'required|not_in:Select',
            'area_of_expertise' => 'required|array',
            'experience' => 'required|integer',
            'upload_certificate' => 'required|file|mimes:pdf,jpeg,png,jpg',
            'profile_description' => 'required|string|max:1000',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,svg,gif',
            'terms_registration' => 'required|accepted',
            'terms_agreement' => 'required|accepted',
        ]);


        try {
            $areaOfExpertise = $request->input('area_of_expertise');
            if (is_array($areaOfExpertise)) {
                $areaOfExpertise = implode(',', $areaOfExpertise);
            }

            // Handle file upload for certificate
            $certificatePath = $request->hasFile('upload_certificate')
                ? Helper::fileUpload($request->file('upload_certificate'), 'doctor/certificate', Str::random(10))
                : null;

            // Handle file upload for avatar
            $avatarPath = $request->hasFile('avatar')
                ? Helper::fileUpload($request->file('avatar'), 'doctor/avatar', Str::random(10))
                : null;

            // Generate slug from the area of expertise
            $slug = Str::slug($areaOfExpertise);


            \Stripe\Stripe::setApiKey(config('stripe.STRIPE_SECRET_KEY'));
            $account = \Stripe\Account::create([
                'type' => 'express',
                'country' => 'US',
                'email' => $request->email,
                'capabilities' => [
                    'card_payments' => ['requested' => true],
                    'transfers' => ['requested' => true],
                ],
            ]);
            // Create the user (doctor)
            $doctor = User::create([
                'name' => $request->input('name'),
                'lname' => $request->input('lname'),
                'gender' => $request->input('gender'),
                'dob' => $request->input('dob'),
                'phone' => $request->input('phone'),
                'language' => $request->input('language'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'qualification' => $request->input('qualification'),
                'ahpra_registraion_number' => $request->input('ahpra_registraion_number'),
                'practice_name' => $request->input('practice_name'),
                'session_duration' => $request->input('session_duration'),
                'session_price' => $request->input('session_price'),
                'practice_address' => $request->input('practice_address'),
                'therapy_mode' => $request->input('therapy_mode'),
                'client_age_group' => $request->input('client_age_group'),
                'area_of_expertise' => $areaOfExpertise,
                'experience' => $request->input('experience'),
                'upload_certificate' => $certificatePath,
                'profile_description' => $request->input('profile_description'),
                'avatar' => $avatarPath,
                'terms_registration' => $request->has('terms_registration') ? 1 : 0,
                'terms_agreement' => $request->has('terms_agreement') ? 1 : 0,
                'role' => 'doctor',
                'slug' => $slug, // Add slug to the user record
                'stripe_acc_id' => $account->id,
            ]);
            // Trigger event for new registration
            event(new Registered($doctor));
            // Log the doctor in automatically
            Auth::login($doctor);
            // Redirect to the doctor's profile page with the generated slug
            return redirect()->route('home', ['slug' => $doctor->slug])->with('success', 'Psychologist created and logged in successfully!');
        } catch (Exception $exception) {
            return redirect()->back()->withInput()->with('error', $exception->getMessage());
        }
    }
    public function phychologistView(Request $request, $slug)
    {

        if (!auth()->check()) {
            return redirect()->route('login')->with('warning', 'Please login first!');
        }
        $doctor = User::where('slug', $slug)->firstOrFail();
        $timeSlots = $doctor->timeSlots()->where('status', 'available')->get();
        $sessionPrice = $doctor->session_price;

        return view('frontend.layouts.psychologist.details', compact('doctor', 'timeSlots', 'sessionPrice'));
    }

    // public function phychologistAvailableTime(Request $request, $slug, $appointment_date)
    // {
    //     $doctor = User::where('slug', $slug)->firstOrFail();
    //     $booked_timeSlots = AppointmentBooking::where('psychologist_id', $doctor->id)
    //         ->where('appointment_date', $appointment_date)
    //         ->get();
    //     return response()->json([
    //         "data" => $booked_timeSlots
    //     ]);
    // }
}
