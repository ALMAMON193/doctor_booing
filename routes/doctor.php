<?php

use App\Http\Controllers\Web\Backend\Admin\Doctor\ProfileController;
use App\Http\Controllers\Web\Backend\Doctor\AppointmentController;
use App\Http\Controllers\Web\Backend\Doctor\DashboardController;
use App\Http\Controllers\Web\Backend\Doctor\TimeSlotController;
use App\Http\Controllers\Web\Backend\Doctor\WalletController;
use App\Http\Controllers\Web\Payment\AccountController;
use Illuminate\Support\Facades\Route;

Route::controller(DashboardController::class)->group(function () {
    Route::get('/', 'index')->name('dashboard');
    Route::get('/appointments', 'appointments')->name('appointments');
    Route::get('/schedule', 'schedule')->name('schedule');
    Route::get('/invoices', 'invoices')->name('invoices');
    Route::get('/messages', 'messages')->name('messages');
    Route::get('/settings', 'settings')->name('settings');
});


Route::controller(AppointmentController::class)->prefix('appointment')->name('appointment.')->group(function () {
   Route::get('/', 'index')->name('appointments');
   Route::get('/create', 'create')->name('create');
   Route::post('/store', 'store')->name('store');
   Route::get('/edit/{id}', 'edit')->name('edit');
   Route::post('/update/{id}', 'update')->name('update');
   Route::delete('/delete/{id}', 'destroy')->name('destroy');
   Route::patch('/status/{id}', 'status')->name('status');
   Route::get('details/appointments/{id}', 'details')->name('details');
});


Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/appointments', [DashboardController::class, 'appointments'])->name('appointments');
    Route::get('/schedule', [DashboardController::class, 'schedule'])->name('schedule');
    Route::get('/invoices', [DashboardController::class, 'invoices'])->name('invoices');
    Route::get('/messages', [DashboardController::class, 'messages'])->name('messages');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');
    // Route::get('/time-slots', [DashboardController::class, 'timeSlot'])->name('time.slots');


    Route::controller(AppointmentController::class)->prefix('appointment')->name('appointment.')->group(function () {
        Route::get('/', 'index')->name('appointments');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
        Route::patch('/status/{id}', 'status')->name('status');
        Route::get('details/appointments/{id}', 'details')->name('details');
    });


    Route::controller(TimeSlotController::class)->prefix('timeslot')->name('timeslot.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
        Route::post('/status/{id}', 'status')->name('status');
    });

    Route::controller(ProfileController::class)->prefix('/setting')->name('setting.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update-profile', 'UpdateProfile')->name('update.profile');
        Route::post('/upload-avatar', 'uploadAvatar')->name('update.avatar');
        Route::post('/update/profile/password', 'UpdatePassword')->name('update.Password');
    });

    Route::controller(WalletController::class)->prefix('wallet')->name('wallet.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    Route::get('/stripe/account/create', [AccountController::class, 'stripeAccount'])->name('stripe.account.connect');
    Route::get('/stripe/account/success-connect', [AccountController::class, 'successConnect'])->name('stripe.account.success.connect');

});


Route::controller(WalletController::class)->prefix('wallet')->name('wallet.')->group(function (){
    Route::get('/', 'index')->name('index');
});
Route::controller(AccountController::class)->prefix('stripe/account')->name('stripe.account.')->group(function (){
    Route::get('/create', 'stripeAccount')->name('connect');
    Route::get('/success-connect', 'successConnect')->name('success.connect');
    Route::get('/dashboard', 'stripeDashboard')->name('dashboard');
    Route::post('/withdraw', 'withdraw')->name('withdraw');
});


