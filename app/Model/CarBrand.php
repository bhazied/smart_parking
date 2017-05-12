<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CarBrand extends Model
{
    public $fillable = ['*'];

    public function cars()
    {
        $this->hasMany('App\Model\Car');
    }
}
