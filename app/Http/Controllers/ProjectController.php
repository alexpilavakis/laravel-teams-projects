<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectRequest;
use App\Permissions\HasPermission;
use App\Project;
use App\Team;
use Illuminate\Http\Request;

class ProjectController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function all()
    {
        $this->authorize('all', Project::class);

        $projects = Project::all();

        return view('projects.all', compact('projects'));
    }

    public function index()
    {
        $this->authorize('index', Project::class);

        $projects = auth()->user()->team->projects;

        return view('projects.index', compact('projects'));
    }

    public function create()
    {

        $this->authorize('create', Project::class);

        $project = new Project;

        return view('projects.create', compact('project'));
    }

    public function store(UpdateProjectRequest $request)
    {
        $attributes = $request->all();

        Project::create($attributes);

        return back();
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        $teams = Team::all();

        return view('projects.edit', compact('teams', 'project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);


        $attributes = $request->all();


        $project->update($attributes);

        return redirect('/projects/'.$project->id);
    }


    public function destroy(Project $project)
    {
        //
    }


}
