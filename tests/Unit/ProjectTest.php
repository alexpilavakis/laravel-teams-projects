<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProjectTest extends TestCase
{
    use DatabaseTransactions;
    protected $project;
    protected $task;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->project = factory(\App\Project::class)->create();

        $this->task = factory(\App\Task::class)->create(['project_id'=>$this->project->id]);

    }

    /** @test*/
    public function it_adds_a_task_to_a_project()
    {
        $this->assertEquals($this->project->id, $this->task->project->id);

        $this->assertEquals(1, $this->project->tasks()->count());

        $this->project->addTask([
            'description' => 'this is a new task'
            ]);

        $this->assertEquals(2, $this->project->tasks()->count());
    }

    /** @test*/
    public function it_sets_a_project_to_complete()
    {
        $this->assertFalse($this->project->completed);

        $this->project->complete();

        $this->assertTrue($this->project->completed);
    }

    /** @test*/
    public function it_sets_a_project_to_uncomplete()
    {
        $this->assertFalse($this->project->completed);

        $this->project->complete();

        $this->assertTrue($this->project->completed);

        $this->project->incomplete();

        $this->assertFalse($this->project->completed);
    }
}
