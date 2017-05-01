<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';

    protected $fillable = array('id', 'name', 'code', 'long_code', 'prefix', 'picture');


    public function users(){
        return $this->hasMany('App\Model\User');
    }
}
