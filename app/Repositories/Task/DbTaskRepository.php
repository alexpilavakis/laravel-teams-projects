<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/01/2019
 * Time: 5:56 ΜΜ
 */

namespace App\Repositories\Task;


use App\Repositories\DbRepository;
use App\Task;

class DbTaskRepository extends DbRepository
{
    protected $model;

    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function myProject()
    {
        return $this->model->project;
    }


}