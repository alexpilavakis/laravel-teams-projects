<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14/12/2018
 * Time: 11:27 ΠΜ
 */

namespace App\Repositories\Project;
use App\Project;
use App\Repositories\DbRepository;
use App\Task;


class DbProjectRepository extends DbRepository implements ProjectRepository
{

    protected $model;

    public function __construct(Project $model)
    {
        $this->model = $model;
    }

    public function myProjects()
    {
        return auth()->user()->team->projects;
    }

    public function addTask($attributes)
    {
        $this->model->tasks()->create($attributes);
    }

}