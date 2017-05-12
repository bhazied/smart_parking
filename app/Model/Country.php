<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = array('id', 'name', 'code', 'long_code', 'prefix', 'picture');


    public function users()
    {
        return $this->hasMany('App\Model\User');
    }
    
    public function regions()
    {
        return $this->hasMany('App\Model\Region');
    }

    public function states()
    {
        return $this->hasMany('App\Model\State');
    }
}
