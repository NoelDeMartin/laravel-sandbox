<?php

namespace App\Providers;

use App\Cache\CustomArrayStore;
use Illuminate\Support\Facades\Cache;
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
        Cache::extend('custom_array', function ($app) {
            return Cache::repository(new CustomArrayStore);
        });
    }
}
