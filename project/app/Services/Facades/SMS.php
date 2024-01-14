<?php

namespace App\Services\Facades;

// use App\Services\SmsService;
use Illuminate\Support\Facades\Facade;

class SMS extends Facade{

    protected static function getFacadeAccessor()
    {
        
        return 'smsProvider';
    }

}