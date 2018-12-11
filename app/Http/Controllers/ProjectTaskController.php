<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTaskRequest;
use App\Project;
use App\Task;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{

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

        $task->update($attributes);

        return redirect('/projects/'.$project->id);
    }


    public function destroy(Project $project, Task $task)
    {
        $task->delete();
        return redirect('/projects/'.$project->id);
    }
}
