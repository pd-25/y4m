<?php

namespace App\enum;

class ProductTypes
{
    const POWDER = 'Powder';
    const LIQUID = 'Liquid';

    public static function values(): array
    {
        return [
            self::POWDER,
            self::LIQUID,
        ];
    }
}
