<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ordernew extends Model
{
    protected $table = 'ordernew';
    protected $fillable = [
        "product_id",
        "product_size",
        "product_color",
        "product_price",
        "product_qty",
        "status",
        "paypal_success_log",
        "paypal_failure_log",
    ];
}
