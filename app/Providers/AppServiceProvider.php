<?php

namespace App\Providers;
use File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $menus = [];
        if (File::exists(base_path('resources/laravel-admin/menus.json'))) {
            $menus = json_decode(File::get(base_path('resources/laravel-admin/menus.json')));
            view()->share('laravelAdminMenus', $menus);
        }

        Schema::defaultStringLength(191);

    }


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
