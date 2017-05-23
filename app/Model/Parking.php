<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    public $fillable = ['*'];

    public $casts = [
        'day_of_work' => 'array'
    ];

    public function state()
    {
        return $this->belongsTo(\App\Model\State::class);
    }
    public function region()
    {
        return $this->belongsTo(\App\Model\Region::class);
    }
    public function user()
    {
        return $this->belongsTo(\App\Model\User::class, 'creator_user_id');
    }
}
