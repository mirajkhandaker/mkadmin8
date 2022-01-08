<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            if (empty(Session::get('siteSetting'))){
                Session::put('siteSetting', SiteSetting::find(1));
            }
            $view->with('siteSetting',Session::get('siteSetting'));
        });
    }
}
