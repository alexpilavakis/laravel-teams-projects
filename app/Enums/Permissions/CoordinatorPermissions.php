<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/12/2018
 * Time: 6:23 ΜΜ
 */

namespace App\Enums\Permissions;


class CoordinatorPermissions
{
    const ADD_TASK = 'add-task';
    const EDIT_TASK = 'edit-task';
    const DELETE_TASK = 'delete-task';
    const COMPLETE_TASK = 'complete-task';

    const CREATE_PROJECT = 'create-project';
    const EDIT_PROJECT = 'edit-project';
    const DELETE_PROJECT = 'delete-project';
    const COMPLETE_PROJECT = 'complete-project';
    const ASSIGN_PROJECT = 'assign-project';
    const REMOVE_PROJECT = 'remove-project';

    const ASSIGN_LEADER = 'assign-leader';
    const REMOVE_LEADER = 'remove-leader';

    const ASSIGN_USER_TEAM = 'assign-user-team';
    const REMOVE_USER_TEAM = 'remove-user-team';

    const PROMOTE_USER = 'promote-user';
    const DEMOTE_USER = 'demote-user';

    const CREATE_TEAM = 'create-team';
    const EDIT_TEAM = 'edit-team';
    const DELETE_TEAM = 'delete-team';
}

