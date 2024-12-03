<?php

namespace App\Http\Controllers\Web\Payment;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        \Stripe\Stripe::setApiKey(config('stripe.STRIPE_SECRET_KEY'));
    }
    public function stripeAccount()
    {
        try {
            $stripe_account_id = Auth::user()->stripe_acc_id;
            if (empty($stripe_account_id)) {
                $account = \Stripe\Account::create([
                    'type' => 'express',
                    'country' => 'US',
                    'email' => Auth::user()->email,
                    'capabilities' => [
                        'card_payments' => ['requested' => true],
                        'transfers' => ['requested' => true],
                    ],
                ]);
                Auth::user()->update([
                    'stripe_acc_id' => $account->id,
                ]);
            }else{
                $account = \Stripe\Account::retrieve($stripe_account_id);
            }
            $accountLink = \Stripe\AccountLink::create([
                'account' => $account->id,
                'refresh_url' => route('doctor.stripe.account.connect'),
                'return_url' => route('doctor.stripe.account.success.connect'),
                'type' => 'account_onboarding',
            ]);

            return redirect($accountLink?->url);
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function stripeDashboard()
    {
        try {
            $stripe_account_id = Auth::user()->stripe_acc_id;
            $loginLink = \Stripe\Account::createLoginLink($stripe_account_id);
            // Redirect the doctor to the Stripe Express Dashboard
            return redirect($loginLink->url);
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
        ]);
        try {
            $doctor = Auth::user();
            if (!$doctor->stripe_acc_id) {
                return redirect()->back()->with('error', 'Stripe account not found');
            }
            // Fetch the doctor's available balance
            $balance = \Stripe\Balance::retrieve([
                'stripe_account' => $doctor->stripe_acc_id,
            ]);
            $availableBalance = $balance->available[0] && $balance->available[0]->amount > 0 !== null ? $balance->available[0]->amount / 100 : 0;

            if ($availableBalance <= 0) {
                return redirect()->back()->with('error', 'No available balance to withdraw');
            }
           \Stripe\Payout::create(
                [
                    'amount' => $request->amount * 100,
                    'currency' => 'usd',
                ],
                ['stripe_account' => $doctor->stripe_acc_id]
            );
            return redirect()->back()->with('success', 'Withdrawal initiated successfully!');
        }catch (\Exception $exception){
            if ($exception?->stripeCode === 'balance_insufficient'){
                return redirect()->back()->with('error', 'No available balance to withdraw');
            }
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    public function successConnect()
    {
        auth()->user()->update([
            'is_connected' => true
        ]);
        return redirect()->route('doctor.dashboard')->with('success', 'Connected');
    }
}
