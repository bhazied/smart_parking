<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    public $fillable = ['*'];

    public $casts = [
        'day_of_work' => 'array'
    ];
}
