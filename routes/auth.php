<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Auth\PasswordController;
use App\Http\Controllers\Web\Auth\NewPasswordController;
use App\Http\Controllers\Web\Auth\VerifyEmailController;
use App\Http\Controllers\Web\Auth\RegisteredUserController;
use App\Http\Controllers\Web\Auth\PasswordResetLinkController;
use App\Http\Controllers\Web\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Web\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Web\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Web\Auth\EmailVerificationNotificationController;

Route::middleware('authCheck')->group(function () {

    Route::post('register', [RegisteredUserController::class, 'store'])->name('client.store');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Forgot password routes
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    // Route to handle the OTP request
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    // Route to show the OTP verification form
    Route::get('Verify-otp/{email}', [PasswordResetLinkController::class, 'verifyOtpForm'])->name('password.verify');

    // Route to show the reset password form
    Route::get('reset-password/{email}', [PasswordResetLinkController::class, 'resetPasswordForm'])->name('password.reset.form');

    // Route to handle OTP verification
    Route::post('Verify-otp', [PasswordResetLinkController::class, 'verifyOtp'])->name('password.verify.submit');

    // Route to handle the actual password reset
    Route::post('reset-password', [PasswordResetLinkController::class, 'resetPassword'])->name('password.store');
});




Route::middleware('auth')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
