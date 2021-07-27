<?php

namespace App\Providers;

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
//        $this->app->bind('arslug',function ($string ,$separator = '-'){
//
//            if (is_null($string)) {
//                return "";
//            }
//
//            $string = trim($string);
//
//            $string = mb_strtolower($string, "UTF-8");;
//
//            $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);
//
//            $string = preg_replace("/[\s-]+/", " ", $string);
//
//            $string = preg_replace("/[\s_]/", $separator, $string);
//
//            return $string;
//
//        });
    }
}
