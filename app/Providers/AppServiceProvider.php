<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\BladeX\Facades\BladeX;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        // BladeX::component('components.myAlert','my-alert');
        // BladeX::components('components');
        BladeX::component('components.*');
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
