<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ItSolution\ItDateClass;


class ItSolutionServiceProvider extends ServiceProvider
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
        $this->app->bind('itdateclass',function(){
            return new ItDateClass();
        });
    }
}
