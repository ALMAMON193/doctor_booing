<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web'])->group(base_path('routes/frontend.php'));
            Route::middleware(['web', 'auth', 'admin'])->prefix('admin')->name('admin.')->group(base_path('routes/backend.php'));
            Route::middleware(['web', 'auth', 'doctor'])->prefix('doctor')->name('doctor.')->group(base_path('routes/doctor.php'));
            Route::middleware(['web', 'auth', 'client'])->prefix('client')->name('client.')->group(base_path('routes/client.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => App\Http\Middleware\AdminMiddleware::class,
            'doctor' => App\Http\Middleware\DoctorMiddleware::class,
            'client' => App\Http\Middleware\ClientMiddleware::class,
            'authCheck' => App\Http\Middleware\AuthCheckMiddleware::class
        ]);
        $middleware->validateCsrfTokens(except: [
            '/payment/webhook',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
