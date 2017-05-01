<?php
/**
 * Created by PhpStorm.
 * User: dev03
 * Date: 30/04/17
 * Time: 16:13
 */

namespace App\Repositories\Contracts;


use Illuminate\Database\Eloquent\Model;

interface IRepository
{

    public function create();

    public function update();

    public  function lists($columns=['*']);

    public function get();

    public function delete($id);

    public function find($id, $columns=['*']);

    public function findBy($fields, $columns = ['*']);

    //public function findWhere(array $where, $columns = ['*']);

    //public function deleteWhere(array $where);

    public function with($relations);


}