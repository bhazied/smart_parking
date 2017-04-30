<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = 'countries';

    protected $fillable = array('id', 'name', 'code', 'long_code', 'prefix', 'picture');
}
