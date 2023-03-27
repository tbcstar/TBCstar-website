<?php

namespace App\Providers;

use App\Models\Characters;
use App\Services\Logs\Log;
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

        view()->composer('*', function($view)
        {
            if (auth()->check()) {
                $view->with('char', Characters::where('id', auth()->id())->get());
            }else {
                $view->with('char', null);
            }
        });

        view()->composer('*', function($view)
        {
            if (auth()->check()) {
                $view->with('charMenu', Characters::where('id', auth()->id())->where('isActive', 1)->first());
            }else {
                $view->with('charMenu', null);
            }
        });

        Log::Initialize(true, 2);
    }
}
