<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public $fillable = ['*'];

    public function carBody()
    {
    }

    public function carBrand()
    {
        return $this->belongsTo('App\Model\CarBrand', 'car_brand_id');
    }

    public function carModel()
    {
        return $this->belongsTo('App\Model\CarModel', 'car_model_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Model\User', 'creator_user_id');
    }
}
