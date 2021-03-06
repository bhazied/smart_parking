<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $guarded = ['id'];

    public function region()
    {
        return $this->belongsTo('App\Model\Region');
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
