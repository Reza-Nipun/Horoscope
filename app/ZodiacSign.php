<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZodiacSign extends Model
{
    protected $fillable = [
        'name', 'code', 'description', 'image',
    ];
}
