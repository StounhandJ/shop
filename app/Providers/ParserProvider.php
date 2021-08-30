<?php

namespace App\Providers;

use App\Services\SantehnikParser;
use Illuminate\Support\ServiceProvider;

class ParserProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->app->bind(SantehnikParser::class, function (){
//            return new SantehnikParser(config("parser.santehnik"));
//        });
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
