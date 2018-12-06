<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_member = Role::where('slug', 'member')->first();
        $role_team_leader = Role::where('slug', 'team-leader')->first();
        $role_coordinator = Role::where('slug', 'coordinator')->first();
        $role_admin = Role::where('slug', 'admin')->first();


        $role_member->permissions()->attach(Permission::where('slug','complete-task')->first());
        $role_member->permissions()->attach(Permission::where('slug','edit-user')->first());

        $role_team_leader->permissions()->attach(Permission::where('slug','add-task')->first());
        $role_team_leader->permissions()->attach(Permission::where('slug','edit-task')->first());
        $role_team_leader->permissions()->attach(Permission::where('slug','delete-task')->first());
        $role_team_leader->permissions()->attach(Permission::where('slug','complete-task')->first());
        $role_team_leader->permissions()->attach(Permission::where('slug','complete-project')->first());
        $role_team_leader->permissions()->attach(Permission::where('slug','assign-user-team')->first());
        $role_team_leader->permissions()->attach(Permission::where('slug','remove-user-team')->first());


        $role_coordinator->permissions()->attach(Permission::where('slug','create-project')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','edit-project')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','delete-project')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','complete-project')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','assign-project')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','remove-project')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','assign-leader')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','remove-leader')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','promote-user')->first());
        $role_coordinator->permissions()->attach(Permission::where('slug','demote-user')->first());

        $role_admin->permissions()->attach(Permission::where('slug','add-user')->first());
        $role_admin->permissions()->attach(Permission::where('slug','edit-user')->first());
        $role_admin->permissions()->attach(Permission::where('slug','delete-user')->first());

    }
}
