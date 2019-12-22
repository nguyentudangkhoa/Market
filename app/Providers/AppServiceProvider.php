<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;
use Illuminate\Support\Facades\Session;

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
        //
        view()->composer('hf.header',function($view){
            $option = ProductType::all();
            $view->with('option',$option);
        });
        view()->composer('master',function($view){

        });
    }
}
