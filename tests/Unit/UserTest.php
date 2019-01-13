<?php

namespace Tests\Unit;

use App\Repositories\User\DbUserRepository;
use Tests\TestCase;

class UserTest extends TestCase
{


    public function let(DbUserRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    /** @test */
    public function it_has_team()
    {
        $team = factory(\App\Team::class)->create(['name'=>'team']);

        $user = factory(\App\User::class)->create(['name'=>'user','team_id'=>$team->id]);

        $this->assertEquals(1, $user->hasTeam());

    }

    /** @test */
    public function it_has_projects()
    {
        //You need to be part of a team to have projects
        $team = factory(\App\Team::class)->create(['name'=>'team']);
        //We have a user
        $user = factory(\App\User::class)->create(['name'=>'user','team_id'=>$team->id]);

        $project = factory(\App\Project::class)->create(['team_id'=>$team->id]);

        $this->assertEquals(1, $user->hasProjects());

        $project = factory(\App\Project::class)->create(['team_id'=>$team->id]);

        $this->assertEquals(2, $user->hasProjects());
    }

    /** @test */
    public function it_has_no_team_so_no_projects()
    {
        $user = factory(\App\User::class)->create(['name'=>'user']);

        $project = factory(\App\Project::class)->create();

        $this->assertEquals(0, $user->hasProjects());

    }

    /** @test */
    public function it_assigns_user_to_specific_team()
    {
        $user = factory(\App\User::class)->create(['name'=>'user']);

        $team = factory(\App\Team::class)->create(['name'=>'team']);

        $user->assignTo($team);

        $this->assertEquals($team->id, $user->team_id);

        //$mock = \Mockery::mock('App\Repositories\DbRepository');

        //$mock->shouldReceive('update')->with($user, ['team_id' => $team->id])->once()->andReturn(true);

        //$repository->update($user, ['team_id' => $team->id])->shouldBeCalled();

    }
    /** @test */
    public function it_removes_user_from_team()
    {
        $user = factory(\App\User::class)->create(['name'=>'user']);

        $team = factory(\App\Team::class)->create(['name'=>'team']);

        $user->assignTo($team);

        $this->assertEquals($team->id, $user->team_id);

        $user->removeFromTeam();

        $this->assertEquals(null, $user->team_id);

    }
}
