<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14/12/2018
 * Time: 11:26 ΠΜ
 */

namespace App\Repositories;


abstract class DbRepository
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes)
    {
        $this->model::create($attributes);
    }

    public function update($model, $attributes)
    {
        $model->update($attributes);
    }

    public function delete($model)
    {
        $model->delete();
    }

}