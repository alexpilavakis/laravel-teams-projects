<?php

namespace Tests\Unit;

use App\Enums\RoleEnum;
use Tests\TestCase;

class TeamTest extends TestCase
{

    /** @test */
    public function it_sets_a_new_team_leader()
    {
        $this->seedData();
        //given a team has a leader
        $team = factory(\App\Team::class)->create(['name'=>'team']);

        $oldleader = factory(\App\User::class)->create(['name'=>'user','team_id'=>$team->id]);

        $oldleader->giveRoleTo(RoleEnum::TEAM_LEADER);

        $team->team_leader_id = $oldleader->id;

        $this->assertEquals($team->leader->id, $oldleader->id);

        $this->assertTrue($team->leader->hasRole(RoleEnum::TEAM_LEADER));

        //and we have a new member in team
        $user = factory(\App\User::class)->create(['name'=>'new_user','team_id'=>$team->id]);

        $user->giveRoleTo(RoleEnum::MEMBER);

        $this->assertFalse($user->hasRole(RoleEnum::TEAM_LEADER));

        //then we set the new leader

        $team->setLeader($user);

        $team = $team->fresh();
        $user = $user->fresh();
        
        $this->assertEquals($team->leader->id, $user->id);

        $this->assertTrue($user->hasRole(RoleEnum::TEAM_LEADER));

        $this->assertFalse($oldleader->hasRole(RoleEnum::TEAM_LEADER));

    }
}
