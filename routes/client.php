<?php


use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\Client\DoctorController;
use App\Http\Controllers\Web\Backend\Client\RatingController;
use App\Http\Controllers\Web\Backend\Client\SettingController;
use App\Http\Controllers\Web\Backend\Client\ScheduleController;
use App\Http\Controllers\Web\Backend\Client\DashboardController;
use App\Http\Controllers\Web\Backend\Client\AppointmentController;




/* Route::get('/dashboard', function () {
    return view('backend.client.layouts.index');
})->name('dashboard');
 */



    // Client Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/doctorsProfile', [DashboardController::class, 'doctorsProfile'])->name('doctorsProfile');
    Route::get('/schedule', [DashboardController::class, 'schedule'])->name('schedule');
    Route::get('/invoices', [DashboardController::class, 'invoices'])->name('invoices');
    // Route::get('/messages', [DashboardController::class, 'messages'])->name('messages');
    Route::get('/settings', [DashboardController::class, 'settings'])->name('settings');

    Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
    Route::get('/ratings/{id}', [RatingController::class, 'show'])->name('ratings.index');


    Route::controller(DoctorController::class)->prefix('/doctors')->name('doctors.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/view/{id}', 'view')->name('view');
        Route::get('/make-appointment/{id}', 'phychologistViewClient')->name('makeAppointment');
    });

    Route::controller(SettingController::class)->prefix('/setting')->name('setting.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update-profile', 'UpdateProfile')->name('update.profile');
        Route::post('/upload-avatar', 'uploadAvatar')->name('update.avatar');
        Route::post('/update/profile/password', 'UpdatePassword')->name('update.Password');
    });

Route::controller(\App\Http\Controllers\Web\Backend\Client\PaymentHistoryController::class)->prefix('/payment/history')
    ->name
('payment.history.')->group(function () {
    Route::get('/', 'index')->name('index');

});

    //Appointment Controller Routes
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

    //Schedule controller routes
    Route::controller(ScheduleController::class)->prefix('schedule')->name('schedule.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

