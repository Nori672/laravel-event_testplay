<?php

namespace App\Providers;

use App\Services\MyService;
use App\Services\PowerMyService;
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
        //バインド時に常に処理が実行
        app()->resolving(function($obj,$app){
            if (is_object($obj)) {
                echo get_class($obj) . '<br>';
            }
            else {
                echo $obj . '<br>';
            }
        });

        //第一引数に指定されたクラスがバインドされた時のみ処理が実行
        app()->resolving(PowerMyService::class,function($obj,$app){
            $newdata = ['ハンバーグ','カレーライス','からあげ','ぎょうざ'];
            $obj->setData($newdata);
            $obj->setId(rand(0,count($newdata)));
        });

        app()->singleton('App\Interfaces\MyServiceInterface','App\Services\PowerMyService');
    }
}
