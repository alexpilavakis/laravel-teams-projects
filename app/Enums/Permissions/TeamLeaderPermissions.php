<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 17/12/2018
 * Time: 6:18 ΜΜ
 */

namespace App\Enums\Permissions;


class TeamLeaderPermissions
{
    const ADD_TASK = 'add-task';
    const EDIT_TASK = 'edit-task';
    const DELETE_TASK = 'delete-task';
    const COMPLETE_TASK = 'complete-task';

    const COMPLETE_PROJECT = 'complete-project';

    const ASSIGN_USER_TEAM = 'assign-user-team';
    const REMOVE_USER_TEAM = 'remove-user-team';
}