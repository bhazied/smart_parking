<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $guarded = [];

    public function states()
    {
        return $this->hasMany('App\Model\State');
    }

    public function country()
    {
        return $this->belongsTo('App\Model\Country');
    }

    public function user()
    {
        return $this->belongsTo(\App\Model\User::class, 'creator_user_id');
    }
}
