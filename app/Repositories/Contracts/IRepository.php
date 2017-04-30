<?php
/**
 * Created by PhpStorm.
 * User: dev03
 * Date: 30/04/17
 * Time: 16:13
 */

namespace app\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;

interface IRepository
{

    public function create(Model $entity);

    public function update(Model $entity, $params = []);

    public  function getAll($params = []);

    public function get($params = []);

    public function delete(Model $entity);


}