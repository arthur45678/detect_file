<?php

namespace App\Providers;

use App\Services\NSFWDetect\Sightengine;
use Illuminate\Support\ServiceProvider;

class NSFWDetectServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */


    public function register()
    {

        $config = config('nsfwdetect');
        $this->app->bind('nsfwdetect',function($app) use($config){
            if ($config['default'] == 'sightengine'){
              //  return new Sightengine(config('nsfwdetect.sightengine.API'));
                return new Sightengine($config);
            }
         //   return new Sightengine(config('nsfwdetect.sightengine.API'));
            return new Sightengine($config);
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
