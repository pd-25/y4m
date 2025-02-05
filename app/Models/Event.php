<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
  protected $fillable = [
    "title",    
    "slug",
    "description",
    "image",
    "venue",
    "status",
    "created_at"
  ];

  public function setTitleAttribute($value)
  {
      $this->attributes['title'] = $value;
      $this->attributes['slug'] = Str::slug($value);
  }
}
