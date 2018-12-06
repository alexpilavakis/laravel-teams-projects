<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $member= Role::create([
            'slug' => 'member',
                'name' => 'member'
            ]
        );
        Role::create([
                'slug' => 'team-leader',
                'name' => 'Team Leader'
            ]
        );
        Role::create([
                'slug' => 'coordinator',
                'name' => 'Coordinator'
            ]
        );
        Role::create([
                'slug' => 'admin',
                'name' => 'admin'
            ]
        );

    }
}
