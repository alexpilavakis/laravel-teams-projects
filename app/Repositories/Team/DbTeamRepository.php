<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14/12/2018
 * Time: 5:35 ΜΜ
 */

namespace App\Repositories\Team;


use App\Repositories\DbRepository;
use App\Team;

class DbTeamRepository extends DbRepository implements TeamRepository
{
    protected $model;

    public function __construct(Team $model)
    {
        $this->model = $model;
    }

    public function myTeam()
    {
        return auth()->user()->team;
    }

}