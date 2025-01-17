<?php

namespace App\enum;
class ProductVariant
{
    const Size = 'Size';
    const Color = 'Color';


    public static function values(): array
    {
        return [
            self::Size,
            self::Color
        ];
    }
}
