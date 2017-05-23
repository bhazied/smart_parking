<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    public $fillable = ['*'];
    
    public $table = "car_brands";

    public function cars()
    {
        return $this->hasMany('App\Model\Car');
    }

    public function carModels()
    {
        return $this->hasMany('App\Model\CarModel');
    }

    public function user()
    {
        return $this->belongsTo(\App\Model\User::class, 'creator_user_id');
    }
}
