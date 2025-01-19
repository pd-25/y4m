<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = ["slug", "name", "description", "price", "category_id", "type", "status", "quantity_in_stock", "meta_title", "meta_description", "hederscript"];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = static::generateUniqueSlug($product->name);
        });
    }
    protected static function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
        $originalSlug = $slug;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . time();
        }

        return $slug;
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, "product_id", "id");
    }
    public function category(){
        return $this->belongsTo(Category::class, "category_id", "id");
    }

    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class, "product_id", "id");
    }

    public function productReviews()
    {
        return $this->hasMany(ProductReview::class, "product_id", "id");
    }


    public function productPrimaryImage()
    {
        return $this->hasOne(ProductImage::class, "product_id", "id")->where("is_primary", 1);
    }

    public function productVariantPrice()
    {
        return $this->hasOne(ProductVariant::class, "product_id", "id")->where("is_show", 1);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, "product_id", "id");
    }

    public function averageRating()
    {
        return $this->productReviews()->avg('star');
    }
}
