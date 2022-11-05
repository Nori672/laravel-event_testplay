<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->singleton('myservice','App\Services\PowerMyService');
        app()->singleton('App\Interfaces\MyServiceInterface','App\Services\PowerMyService');
        echo 'MyServiceProvider/register<br>';
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        echo 'MyServiceProvider/boot<br>';
    }
}
