<?php
/**
 * Created by PhpStorm.
 * User: dev03
 * Date: 12/05/17
 * Time: 11:44
 */

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepository;

class CarBodyRepository extends BaseRepository
{
    public function model()
    {
        return 'App\Model\CarBody';
    }
}
