<?php

namespace App\Providers;

use App\Isop\Isop;
use Illuminate\Support\ServiceProvider;

class IsopServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Isop::class,function(){
            return new Isop();
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
