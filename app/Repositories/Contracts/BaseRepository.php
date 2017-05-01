<?php
/**
 * Created by PhpStorm.
 * User: dev03
 * Date: 30/04/17
 * Time: 16:15
 */

namespace App\Repositories\Contracts;



use app\Repositories\Exceptions\RepositoryExceprion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Container\Container as App;

abstract  class BaseRepository implements IRepository
{

    protected  $application;

    protected  $model;

    public function __construct(App $application)
    {
        $this->application = $application;

        $this->getModel();
    }

    abstract protected function model();

    public function with($relations)
    {
        if(is_array($relations)){
            $with = implode(',', $relations);
        }
        else {
            $with = $relations;
        }
        $this->model->with($with);
        return $this;
    }

    public function getModel(){

        $model = $this->application->make($this->model());

        if(!$model instanceof Model){
            throw new RepositoryExceprion('the class '. $this->model() . ' is not an instance off Illuminate\\Database\\Eloquent\\Model');
        }
        //return $this->model = $model->newQuery();
        return $this->model = $model->newQuery();
    }


    public function create()
    {
        $this->model->create();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function lists($columns = ['*'])
    {
       return $this->model->get($columns);
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function delete($id)
    {
        return $this->model->delete();
        //$this->model->destroy($id);
    }

    public function find($id, $columns = ['*'])
    {
       return  $this->model->find($id, $columns);
    }

    public function findBy($fields, $columns = ['*'])
    {
        // TODO: Implement findBy() method.
    }



}