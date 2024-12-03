<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->intended(route('admin.dashboard', absolute: false).'?verified=1');
                case 'doctor':
                    return redirect()->intended(route('doctor.dashboard', absolute: false).'?verified=1');
                case 'client':
                    return redirect()->intended(route('client.dashboard', absolute: false).'?verified=1');
                default:
                    return redirect()->intended(route('home', absolute: false).'?verified=1');
            }
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        switch (Auth::user()->role) {
            case 'admin':
                return redirect()->intended(route('admin.dashboard', absolute: false).'?verified=1');
            case 'doctor':
                return redirect()->intended(route('doctor.dashboard', absolute: false).'?verified=1');
            case 'client':
                return redirect()->intended(route('client.dashboard', absolute: false).'?verified=1');
            default:
                return redirect()->intended(route('home', absolute: false).'?verified=1');
        }
    }
}
