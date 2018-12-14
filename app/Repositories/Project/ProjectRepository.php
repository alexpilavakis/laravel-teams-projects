<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14/12/2018
 * Time: 12:05 ΜΜ
 */

namespace App\Repositories\Project;
use App\Project;


interface ProjectRepository
{
    public function getAll();

    public function getById($id);

    public function myProjects();

    public function create($attributes);

    public function update($project, $attributes);

    public function delete($project);

}