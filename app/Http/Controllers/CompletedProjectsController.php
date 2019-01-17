<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class CompletedProjectsController extends Controller
{
    public function store(Project $project)
    {
        $project->complete();
        return back();
    }

    public function destroy(Project $project)
    {
        $project->incomplete();
        return back();
    }
}