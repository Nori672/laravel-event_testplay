<?php

namespace App\Providers;

use App\Jobs\Myjob;
use Illuminate\Support\ServiceProvider;

class MyjobProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bindMethod([Myjob::class,'handle'],function($job,$app){
            return $job->handle();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
