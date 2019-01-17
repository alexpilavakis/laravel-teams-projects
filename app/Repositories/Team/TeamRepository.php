<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 14/12/2018
 * Time: 5:34 ΜΜ
 */

namespace App\Repositories\Team;


interface TeamRepository
{
    public function getAll();

    public function myTeam();

    public function getById($id);

    public function create($attributes);

    public function update($team, $attributes);

    public function delete($team);
}