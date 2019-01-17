<?php

namespace App\Policies;

use App\User;
use App\Task;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return $user->can('add-task');
    }


    public function update(User $user, Task $task)
    {
        return $user->can('edit-task');
    }


    public function delete(User $user, Task $task)
    {
        return $user->can('delete-task');
    }

}
