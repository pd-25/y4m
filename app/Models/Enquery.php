<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enquery extends Model
{
    protected $fillable = [
        "first_name",
        "last_name",
        "email",
        "phone",
        "subject",
        "message",
        "type",
    ];
}
