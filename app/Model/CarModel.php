<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    public $fillable = ['*'];

    public $table = 'car_models';

    public function cars()
    {
        return $this->hasMany('App\Model\Car');
    }

    public function carBrand()
    {
        return $this->belongsTo('App\Mode\CarBrand', 'car_brand_id');
    }
}
