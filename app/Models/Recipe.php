<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'preparation_time',
        'difficulty',
        'description',
    ];

    protected $casts = [
        'preparation_time' => 'integer',
    ];
}
