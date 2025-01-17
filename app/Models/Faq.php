<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = ['program_id', 'question', 'answer'];

    // Optional: Define a relationship to the Program model
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
