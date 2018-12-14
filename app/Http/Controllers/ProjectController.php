<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProjectRequest;
use App\Project;
use App\Repositories\Project\ProjectRepository;
use App\Repositories\Team\TeamRepository;


class ProjectController extends Controller
{

    protected $projectRepo;
    protected $teamRepo;

    public function __construct(ProjectRepository $projectRepo, TeamRepository $teamRepo)
    {
        $this->middleware('auth');
        $this->projectRepo = $projectRepo;
        $this->teamRepo = $teamRepo;
    }

    public function all()
    {
        $this->authorize('all', Project::class);

        $projects = $this->projectRepo->getAll();

        return view('projects.all', compact('projects'));
    }

    public function index()
    {
        $this->authorize('index', Project::class);

        $projects = $this->projectRepo->myProjects();

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

        $this->projectRepo->create($attributes);

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

        $teams = $this->teamRepo->getAll();

        return view('projects.edit', compact('teams', 'project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $attributes = $request->all();

        $this->projectRepo->update($project,$attributes);

        return redirect('/projects/'.$project->id);
    }


    public function destroy(Project $project)
    {

        $this->authorize('delete', $project);

        $this->projectRepo->delete($project);

        return redirect('/projects/all');
    }


}
