<?php

namespace App\enum;

class OrderStatus
{
    const PENDING = 'Pending';
    const CONFIRMED = 'Confirmed';
    const SHIPPED = 'Shipped';
    const DELIVERED = 'Delivered';


    public static function values(): array
    {
        return [
            self::PENDING,
            self::CONFIRMED,
            self::SHIPPED,
            self::DELIVERED

        ];
    }
}
