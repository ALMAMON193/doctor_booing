<?php

namespace App\Http\Controllers\Web\Auth;

use Exception;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;

class PasswordResetLinkController extends Controller
{
    // Show the "Forgot Password" page
    public function create(): View
    {
        return view('auth.Forgot-password');
    }

    /**
     * Handle an incoming OTP password reset request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate email input
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Retrieve user by email
        $user = User::where('email', $request->email)->first();

        // If no user found, return with an error message
        if (!$user) {
            return back()->withInput($request->only('email'))->withErrors(['email' => __('We could not find a user with that email address.')]);
        }

        // Generate a 4-digit OTP
        $otp = rand(1000, 9999);

        // Store OTP and its expiration time (valid for 10 minutes)
        $user->otp = $otp;
        $user->otp_expires_at = now()->addMinutes(10);
        $user->save();

        // Send OTP via email
        try {
            Mail::send('emails.otp', ['otp' => $otp, 'user' => $user], function ($message) use ($user) {
                $message->to($user->email)
                    ->subject('Your Password Reset OTP');
            });
        } catch (Exception $e) {
            return back()->withErrors(['email' => __('There was an issue sending the OTP. Please try again.')]);
        }

        // Redirect to OTP verification page with email as parameter and success message
        return redirect()->route('password.verify', ['email' => $user->email])
            ->with('t-success', 'We have sent an OTP to your email address.');
    }

    // Show the OTP verification form
    public function verifyOtpForm($email)
    {
        return view("auth.Verify-otp", compact('email'));
    }

    // Verify the OTP and proceed to password reset
    public function verifyOtp(Request $request)
    {
        // Validate that the OTP is an array with 4 digits
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|array|size:4',  // Validate that OTP is an array of 4 items
            'otp.*' => 'digits:1',  // Validate that each OTP digit is a single digit
        ]);

        // Ensure that otp is actually an array before imploding
        $otp = implode('', $request->otp);

        // Retrieve the user by email
        $user = User::where('email', $request->email)->first();

        // Check if user exists and the OTP is correct
        if (!$user || $otp != $user->otp) {
            return back()->withErrors(['otp' => 'The OTP is incorrect or has expired.']);
        }

        // Check if OTP has expired
        if ($user->otp_expires_at < now()) {
            return back()->withErrors(['otp' => 'The OTP has expired.']);
        }

        // OTP is valid, proceed to password reset
        return redirect()->route('password.reset.form', ['email' => $user->email]);
    }


    // Show the password reset form
    public function resetPasswordForm($email)
    {
        // Make sure $email is passed to the view
        return view('auth.Reset-password', compact('email'));
    }

    // Handle the password reset
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->route('password.request')->withErrors(['email' => 'We could not find a user with that email address.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        // Optionally, clear OTP or reset expiration
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        return redirect()->route('login')->with('t-success', 'Your password has been reset!');
    }
}
