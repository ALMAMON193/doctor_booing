<?php

use App\Http\Controllers\Web\Backend\Admin\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Frontend\HomeController;
use App\Http\Controllers\Web\Frontend\PageController;
use App\Http\Controllers\Web\Payment\AccountController;
use App\Http\Controllers\Web\Backend\Doctor\DoctorController;
use App\Http\Controllers\Web\Backend\Payment\PaymentController;



Route::controller(PageController::class)->group(function () {

    Route::get('/', 'index')->name('home');
    Route::get('/service', 'service')->name('service');
    Route::get('/ourPsychologist', 'ourPsychologist')->name('ourPsychologist');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/blog/details/{slug}', 'blogDetails')->name('blogDetails');
    Route::get('/aboutUs', 'about')->name('about');
    Route::get('/verify', 'verify')->name('verify');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/account-type', 'index')->name('account.type');
    Route::get('/create/client-account', 'createClientAccount')->name('create.client.account');

});
Route::controller(DoctorController::class)->group(function () {
    Route::get('/create/psychologist-account', 'createPsychologistAccount')->name('create.psychologist.account');
    Route::post('/phychologist/store', 'store')->name('phychologist.store');
    Route::get('/psychologist/{slug}', 'phychologistView')->name('phychologist.view');
    // Route::get('/psychologist/{date}/', 'phychologistAvailableTime')->name('phychologist.availabe');
});

Route::get('/appointments/create', [PaymentController::class, 'create'])->name('appointments.create');
Route::post('/appointments/doctor/{slug}', [PaymentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/booking/success', [PaymentController::class, 'success'])->name('appointments.success');
Route::get('/appointments/booking/fail', [PaymentController::class, 'fail'])->name('appointments.fail');
Route::post('payment/webhook', [PaymentController::class, 'handle']);


Route::post('delete/single/{id}', [NotificationController::class, 'deleteSingle'])->name('notification.delete.single');