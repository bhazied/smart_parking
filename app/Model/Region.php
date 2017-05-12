<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $fillable = ['*'];

    public function states()
    {
        return $this->hasMany('App\Model\State');
    }

    public function country()
    {
        return $this->belongsTo('App\Model\Country');
    }
}
