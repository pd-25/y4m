<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
   protected $fillable = ["is_show","product_id","variant_name","measurement","measurement_param","price","quantity"];
}
