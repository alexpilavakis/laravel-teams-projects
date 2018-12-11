<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;
use App\Team;

class UsersTableSeeder extends Seeder
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

        $user = new User();
        $user->name = 'Victor';
        $user->email = 'victor@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_member);
        $user->roles()->attach($role_team_leader);


        $team = new Team();
        $team->name = 'Team A';
        $team->team_leader_id = $user->id;
        $team->save();
        $user->team()->associate($team);
        $user->save();

        factory(App\User::class, 2)->create()->each(function ($user) use ($team, $role_member) {
            //associate user for team A
            $user->team()->associate($team)->save();
            $user->roles()->attach($role_member);
        });

        factory(App\Project::class, 2)->create()->each(function ($project) use ($team) {
            //associate project for team A
            $project->team()->associate($team)->save();
            factory(App\Task::class, 2)->create(['project_id'=>$project->id]);
        });

        $user = new User();
        $user->name = 'Alex';
        $user->email = 'alex@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach(Role::where('slug','member')->first());
        $user->roles()->attach(Role::where('slug','team-leader')->first());


        $team = new Team();
        $team->name = 'Team B';
        $team->team_leader_id = $user->id;
        $team->save();
        $user->team()->associate($team);
        $user->save();

        factory(App\User::class, 2)->create()->each(function ($user) use ($team,$role_member) {
            //associate user for team B
            $user->team()->associate($team)->save();
            $user->roles()->attach($role_member);
        });

        factory(App\Project::class, 2)->create()->each(function ($project) use ($team) {
            //associate project for team B
            $project->team()->associate($team)->save();
            factory(App\Task::class, 2)->create(['project_id'=>$project->id]);
        });

        factory(App\User::class, 4)->create()->each(function ($user) use ($role_member) {
            //new members, don't belong in any team
            $user->roles()->attach($role_member);
        });

        $user = new User();
        $user->name = 'NICOS';
        $user->email = 'nicos@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_member);
        $user->roles()->attach($role_coordinator);

        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
