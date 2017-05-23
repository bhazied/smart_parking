<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CarBody extends Model
{
    public $fillable = ['*'];
    
    public $table = 'car_bodies';
    
    public function cars()
    {
        return $this->hasMany('App\Model\Car');
    }

    public function user()
    {
        return $this->belongsTo(\App\Model\User::class, 'creator_user_id');
    }
}
