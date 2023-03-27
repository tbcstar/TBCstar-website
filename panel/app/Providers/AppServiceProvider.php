<?php

namespace App\Providers;

use App\Models\UserData;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(array_key_exists(request()->segment(1), config('app.locales'))) {
            app()->setLocale(request()->segment(1));
        }
    }
}
