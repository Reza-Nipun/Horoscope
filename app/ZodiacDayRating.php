<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZodiacDayRating extends Model
{
    protected $fillable = [
        'zodiac_sign_id', 'zodiac_date', 'day_score',
    ];

    public function zodiac_sign()
    {
        return $this->belongsTo(ZodiacSign::class, 'zodiac_sign_id');
    }

    public function zodiac_score()
    {
        return $this->belongsTo(ZodiacScore::class, 'day_score');
    }
}
