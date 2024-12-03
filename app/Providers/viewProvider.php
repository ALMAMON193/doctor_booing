<?php

namespace App\Providers;

use App\Models\SocialLink;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class viewProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        view::composer('frontend.app', function($view){

            $social = SocialLink::where('status', 'active')->limit(4)->get();
            $view->with('social', $social);

        });

    }
}
