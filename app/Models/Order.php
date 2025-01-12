<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ["user_id","total_price","status","name","email","phone","contry","street_address","appertment_house_no","town_city","state","postcode","payment_mode","payment_ref_no","order_number"];

    public function orderItems(){
        return $this->hasMany(OrderItem::class, "order_id", "id");
    }

    public function getCreatedAtAttribute($value)
    {
        // return Carbon::parse($value)->setTimezone(config('app.timezone'))->toDateTimeString();
        return Carbon::parse($value)->timezone('Asia/Kolkata')->toDateTimeString();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
    public function products_varient()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
