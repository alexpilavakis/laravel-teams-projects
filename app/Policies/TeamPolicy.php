<?php

namespace App\Policies;

use App\User;
use App\Team;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;


    public function view(User $user, Team $team)
    {
        return ($user->team_id === $team->id) or ($user->hasRole('coordinator'));

    }

    public function create(User $user)
    {
        return ($user->can('create-team'));
    }


    public function update(User $user, Team $team)
    {
        //
    }


    public function delete(User $user, Team $team)
    {
        //
    }

}
