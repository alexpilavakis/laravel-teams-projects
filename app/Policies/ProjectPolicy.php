<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function all(User $user)
    {
        return $user->hasRole('coordinator') or $this->userHasNoProject($user);

    }

    public function index(User $user)
    {
        return !$this->userHasNoProject($user);

    }

    public function view(User $user, Project $project)
    {
        return ($user->team_id == $project->team_id) || ($user->hasRole('coordinator'));
    }

    public function create(User $user)
    {
       return $user->can('create-project');
    }

    public function update(User $user, Project $project)
    {
        return $user->can('edit-project');
    }

    public function delete(User $user, Project $project)
    {
        return $user->can('delete-project');
    }


    protected function userHasNoProject(User $user)
    {
        return ($user->team === null or $user->team->projects === null);
    }

}
