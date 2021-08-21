<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class ValidatorServiceProvider extends ServiceProvider
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
        Validator::extend('c_exists', function($attr, $value, $data){
//            data[0] = Table
//            data[1] = column, if not then the attribute
            $table = $data[0];
            $column = $data[1] ?? $attr;
            return is_numeric($value) and DB::table($table)->where($column, )->exists();
        });

        Validator::extend('gf', function($attr, $value, $data){
            return $value!="";
        });
    }
}
