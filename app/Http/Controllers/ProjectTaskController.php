<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTaskRequest;
use App\Project;
use App\Repositories\Task\DbTaskRepository;
use App\Task;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    protected $taskRepo;

    public function __construct(DbTaskRepository $taskRepo)
    {
        $this->middleware('auth');

        $this->taskRepo = $taskRepo;
    }

    public function add(Project $project)
    {
        $task = new Task();

        return view('tasks.add', compact('task', 'project'));
    }


    public function store(UpdateTaskRequest $request, Project $project)
    {
        $attributes = $request->all();

        $project->addTask($attributes);

        return redirect('/projects/'.$project->id);
    }


    public function edit(Project $project, Task $task)
    {
        return view('tasks.edit', compact('task', 'project'));
    }

    public function update(UpdateTaskRequest $request, Project $project, Task $task)
    {
        $attributes = $request->all();

        $this->taskRepo->update($task, $attributes);

        return redirect('/projects/'.$project->id);
    }


    public function destroy(Project $project, Task $task)
    {
        $this->taskRepo->delete($task);

        return redirect('/projects/'.$project->id);
    }
}
