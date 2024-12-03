<?php


use App\Http\Controllers\Web\Backend\Admin\CMS\Home\HomePsychologiestController;
use App\Http\Controllers\Web\Backend\Admin\CMS\Home\PsychologistsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\Admin\FAQController;
use App\Http\Controllers\Web\Backend\Admin\BlogController;
use App\Http\Controllers\Web\Backend\Admin\DashboardController;
use App\Http\Controllers\Web\Backend\Admin\CMS\AboutUsController;
use App\Http\Controllers\Web\Backend\Admin\NotificationController;
use App\Http\Controllers\Web\Backend\Admin\Doctor\DoctorController;
use App\Http\Controllers\Web\Backend\Admin\CMS\Home\RebatesController;
use App\Http\Controllers\Web\Backend\Admin\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Admin\Settings\SettingController;
use App\Http\Controllers\Web\Backend\Admin\CMS\OurPsychologistsController;
use App\Http\Controllers\Web\Backend\Admin\Settings\DynamicPageController;
use App\Http\Controllers\Web\Backend\Admin\Settings\MailSettingController;
use App\Http\Controllers\Web\Backend\Admin\Settings\SocialLinksController;
use App\Http\Controllers\Web\Backend\Admin\CMS\Service\WhatExpectController;
use App\Http\Controllers\Web\Backend\Admin\CMS\Service\BenefitsTherapyController;
use App\Http\Controllers\Web\Backend\Admin\CMS\Service\IndividualTherapyController;
use App\Http\Controllers\Web\Backend\Admin\CMS\Home\BannerController as HomeBannerController;
use App\Http\Controllers\Web\Backend\Admin\CMS\Home\ServiceController as HomeServiceContainer;
use App\Http\Controllers\Web\Backend\Admin\psychologySessionController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// Route::middleware(['auth', 'verified'])->group(function () {

//Dynamic Page
Route::controller(DynamicPageController::class)->prefix('setting/dynamic')->name('setting.dynamic.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::patch('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::get('/status/{id}', 'status')->name('status');
});


//! Route for Social Links
Route::controller(SocialLinksController::class)->group(function () {
    Route::get('/social-links', 'socialLinks')->name('setting.social.index');
    Route::post('/social-links/store', 'socialLinksStore')->name('setting.social.store');
    Route::get('/social-links/edit/{id}', 'socialLinksEdit')->name('setting.social.edit');
    Route::put('/social-links/update/{id}', 'socialLinksUpdate')->name('setting.social.update');
    Route::delete('/social-links/delete/{id}',  'socialLinksDelete')->name('setting.social.delete');
});

//! Route for Profile Settings
Route::controller(ProfileController::class)->group(function () {
    Route::get('setting/profile', 'index')->name('setting.profile.index');
    Route::put('setting/profile/update', 'UpdateProfile')->name('setting.profile.update');
    Route::put('setting/profile/update/Password', 'UpdatePassword')->name('setting.profile.update.Password');
    Route::post('setting/profile/update/Picture', 'UpdateProfilePicture')->name('update.profile.picture');
});

//! Route for Mail Settings
Route::controller(MailSettingController::class)->group(function () {
    Route::get('setting/mail', 'index')->name('setting.mail.index');
    Route::patch('setting/mail', 'update')->name('setting.mail.update');
});

    Route::controller(\App\Http\Controllers\Web\Backend\Admin\StripeSettingController::class)->group(function () {
        Route::get('/setting/stripe', 'index')->name('stripe.setting.index');
        Route::post('setting/stripe/update', 'update')->name('stripe.setting.update');
    });

//! Route for Stripe Settings
Route::controller(SettingController::class)->group(function () {
    Route::get('setting/general', 'index')->name('setting.general.index');
    Route::patch('setting/general', 'update')->name('setting.general.update');
});

//! Route for Notification
Route::controller(NotificationController::class)->prefix('notification')->name('notification.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::POST('read/single/{id}', 'readSingle')->name('read.single');

    Route::POST('read/all', 'readAll')->name('read.all');
});


/** CMS **/

//Home Banner cms
Route::controller(HomeBannerController::class)->prefix('cms/home/banner')->name('cms.home.banner.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/content', 'content')->name('content');
});

//Home Service cms
Route::controller(HomeServiceContainer::class)->prefix('cms/home/service')->name('cms.home.service.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/content', 'content')->name('content');
});

Route::controller(HomePsychologiestController::class)->prefix('cms/home/psychologist')->name('cms.home.psychologist.')
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::patch('/content', 'content')->name('content');
    });

//Home Psychologists cms
Route::controller(PsychologistsController::class)->prefix('cms/home/psychologists')->name('cms.home.psychologists.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::patch('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::get('/status/{id}', 'status')->name('status');
    Route::patch('/content', 'content')->name('content');
});

//Home Rebates cms
Route::controller(RebatesController::class)->prefix('cms/home/rebates')->name('cms.home.rebates.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::patch('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::post('/status/{id}', 'status')->name('status');
    Route::patch('/content', 'content')->name('content');
});

//About Us Cms routes
Route::controller(AboutUsController::class)->group(function () {
    Route::get('aboutUs', 'index')->name('aboutUs.index');
    Route::get('aboutUs/create', 'create')->name('aboutUs.create');
    Route::post('aboutUs/store', 'store')->name('aboutUs.store');
    Route::get('aboutUs/edit/{id}', 'edit')->name('aboutUs.edit');
    Route::put('aboutUs/update/{id}', 'update')->name('aboutUs.update');
    Route::delete('aboutUs/delete/{id}', 'destroy')->name('aboutUs.destroy');
    Route::post('aboutUs/status/{id}', 'status')->name('aboutUs.status');
});

//Service Individual Therapy Cms
Route::controller(IndividualTherapyController::class)->prefix('cms/service/individualTherapy')->name('cms.service.individualTherapy.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/content', 'content')->name('content');
});

//Benefits Therapy Cms routes
Route::controller(BenefitsTherapyController::class)->prefix('cms/service/benefitsTherapy')->name('cms.service.benefitsTherapy.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::post('/status/{id}', 'status')->name('status');
    Route::patch('/content', 'content')->name('content');
});

//What to expect Cms routes
Route::controller(WhatExpectController::class)->prefix('cms/service/whatToExpect')->name('cms.service.whatToExpect.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::post('/status/{id}', 'status')->name('status');
    Route::patch('/content', 'content')->name('content');
});

//Our Psycholgists page meet with team Cms
Route::controller(OurPsychologistsController::class)->prefix('cms/ourPsychologists/meetWithTeam')->name('cms.ourPsychologists.meetWithTeam.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::patch('/content', 'content')->name('content');
});

//Blog Controller Routes
Route::controller(BlogController::class)->group(function () {
    Route::get('blog', 'index')->name('blog.index');
    Route::get('blog/create', 'create')->name('blog.create');
    Route::post('blog/store', 'store')->name('blog.store');
    Route::get('blog/edit/{id}', 'edit')->name('blog.edit');
    Route::put('blog/update/{id}', 'update')->name('blog.update');
    Route::delete('blog/delete/{id}', 'destroy')->name('blog.destroy');
    Route::post('blog/status/{id}', 'status')->name('blog.status');
});

//FAQ Controller Routes
Route::controller(FAQController::class)->group(function () {
    Route::get('faq', 'index')->name('faq.index');
    Route::get('faq/create', 'create')->name('faq.create');
    Route::post('faq/store', 'store')->name('faq.store');
    Route::get('faq/edit/{id}', 'edit')->name('faq.edit');
    Route::put('faq/update/{id}', 'update')->name('faq.update');
    Route::delete('faq/delete/{id}', 'destroy')->name('faq.destroy');
    Route::post('faq/status/{id}', 'status')->name('faq.status');
});

// Admin Doctors Controller Routes
Route::controller(DoctorController::class)->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/view/{id}', 'view')->name('view')->middleware('auth');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
    Route::post('/status/{id}', 'status')->name('status');
});

Route::controller(PsychologySessionController::class)->prefix('psychology/session')->name('psychology.session.')
    ->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::post('/update/{id}', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
});
// });
