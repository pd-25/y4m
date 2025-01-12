<?php

namespace App\enum;
class ProductVariant
{
    const WEIGHT = 'Weight';

    public static function values(): array
    {
        return [
            self::WEIGHT
        ];
    }
}
