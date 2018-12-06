<?php

use Illuminate\Database\Seeder;
use App\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
                'slug' => 'add-task',
                'name' => 'Add Task'
            ]
        );

        Permission::create([
                'slug' => 'complete-task',
                'name' => 'Complete Task'
            ]
        );

        Permission::create([
                'slug' => 'edit-task',
                'name' => 'Edit Task'
            ]
        );
        Permission::create([
                'slug' => 'delete-task',
                'name' => 'Delete Task'
            ]
        );


        Permission::create([
                'slug' => 'create-project',
                'name' => 'Create Project'
            ]
        );

        Permission::create([
                'slug' => 'complete-project',
                'name' => 'Complete Project'
            ]
        );

        Permission::create([
                'slug' => 'edit-project',
                'name' => 'Edit Project'
            ]
        );
        Permission::create([
                'slug' => 'delete-project',
                'name' => 'Delete Project'
            ]
        );
        Permission::create([
                'slug' => 'assign-project',
                'name' => 'Assign Project to Team'
            ]
        );
        Permission::create([
                'slug' => 'remove-project',
                'name' => 'Remove Project from Team'
            ]
        );


        Permission::create([
                'slug' => 'add-user',
                'name' => 'Add User'
            ]
        );
        Permission::create([
                'slug' => 'edit-user',
                'name' => 'Edit User'
            ]
        );
        Permission::create([
                'slug' => 'delete-user',
                'name' => 'Delete User'
            ]
        );
        Permission::create([
                'slug' => 'assign-user-team',
                'name' => 'Assign User to Team'
            ]
        );
        Permission::create([
                'slug' => 'remove-user-team',
                'name' => 'Remove User from Team'
            ]
        );

        Permission::create([
                'slug' => 'assign-leader',
                'name' => 'Assign Leader to Team'
            ]
        );
        Permission::create([
                'slug' => 'remove-leader',
                'name' => 'Remove Leader from Team'
            ]
        );

        Permission::create([
                'slug' => 'promote-user',
                'name' => 'Promote User'
            ]
        );

        Permission::create([
                'slug' => 'demote-user',
                'name' => 'Demote User'
            ]
        );
    }
}
