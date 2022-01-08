<?php

namespace App\Providers;

use App\Models\SiteSetting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('backend.*', function ($view) {
            $view->with('aclList',Session::get('acl'));
        });

        View::composer('backend.include.left-side-navbar',function ($view){
            $view->with('routeName',\Illuminate\Support\Facades\Route::currentRouteName());
        });
    }
}
