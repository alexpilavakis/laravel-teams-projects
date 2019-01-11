<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 09/01/2019
 * Time: 7:19 ΜΜ
 */

namespace App\Repositories\User;


use App\Repositories\DbRepository;
use App\User;

class DbUserRepository extends DbRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }
}