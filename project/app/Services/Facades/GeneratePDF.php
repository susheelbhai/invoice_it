<?php

namespace App\Services\Facades;

use Illuminate\Support\Facades\Facade;

class GeneratePDF extends Facade{

    protected static function getFacadeAccessor()
    {
        
        return 'generatePDF';
    }

}