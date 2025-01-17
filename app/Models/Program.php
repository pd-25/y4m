<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Program extends Model

{
    protected $fillable = ['title', 'description','slug', 'image'];

    // Automatically generate the slug when setting the title
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function faqs()
{
    return $this->hasMany(Faq::class);
}
}
