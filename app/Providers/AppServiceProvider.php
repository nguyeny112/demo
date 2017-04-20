<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Brand;
use App\Category;
use App\Payment;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::share('publicURL',getenv('PUBLIC_URL'));
        View::share('adminURL',getenv('ADMIN_URL'));
        View::share('catList',Category::all());
        View::share('brandList',Brand::all());
        View::share('paymentList',Payment::all());
        Validator::extend('numberfileupload', function ($attribute, $value, $parameters, $validator) {
            // dd($value);
            $uploadCount = count($value);
            // dd($parameters[0]);
            if($uploadCount > $parameters[0]) return false;
            return true;
        });

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
