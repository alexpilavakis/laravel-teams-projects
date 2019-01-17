<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\PermissionsServiceProvider;
use App\Enums\RoleEnum;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $project;
    protected $attributes;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->seedData();

        $this->user = factory(\App\User::class)->create();

        //set < user->can() > after database was seeded
        $test = new PermissionsServiceProvider($this->app);
        $test->testing();

        $this->project = factory(\App\Project::class)->create(['title'=>'project']);

        $this->user->giveRoleTo(RoleEnum::COORDINATOR);

        $this->attributes = [ 'description' => 'this is a new task'];
    }

    /** @test  */
    public function coordinator_can_see_all_projects()
    {
        $this->actingAs($this->user);

        $this->get('projects/all')
            ->assertSee('project')
            ->assertSee('Assigned to:');
    }

    /** @test  */
    public function guests_member_team_leaders_cannot_see_all_projects()
    {

        $this->user = factory(\App\User::class)->create();

        //direct call
        $this->get('projects/all')->assertRedirect('login');

        $this->actingAs($this->user);

        $this->user->giveRoleTo(RoleEnum::MEMBER);

        //membeer tries to call
        $this->get('projects/all')->assertStatus(403);

        $this->user->giveRoleTo(RoleEnum::TEAM_LEADER);

        //team leader tries to call
        $this->get('projects/all')->assertStatus(403);

    }

    /** @test  */
    public function coordinator_can_create_projects()
    {
        $this->actingAs($this->user);

        $this->assertTrue($this->user->can('create-project'));

        $this->get('projects/all')
            ->assertSee('New Project');


    }


}
