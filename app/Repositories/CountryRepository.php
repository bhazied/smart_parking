<?php
/**
 * Created by PhpStorm.
 * User: dev03
 * Date: 01/05/17
 * Time: 00:10
 */

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepository;

class CountryRepository extends BaseRepository
{
    protected function model()
    {
        return 'App\Model\Country';
    }
}
