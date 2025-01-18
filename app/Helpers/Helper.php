<?php

namespace App\Helpers;

class Helper
{
    public static function assets()
    {
        
        return env('ASSET_URL');
    }
}