<?php

namespace App\Services\NSFWDetect\Facades;
use Illuminate\Support\Facades\Facade;

class NSFWDetect extends Facade
{
    protected static function getFacadeAccessor() {
        return 'nsfwdetect';
    }
}


