<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }


    public function all()
    {
        $teams = Team::all();

        return view('teams.all', compact('teams'));
    }

    public function index()
    {
        abort_if($this->userHasNoTeam(),403);

        $team = auth()->user()->team;

        return view('teams.index', compact('team'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

    }


    public function show(Team $team)
    {
        $this->authorize('view', $team);

        return view('teams.show', compact('team'));
    }


    public function edit(Team $team)
    {
        //
    }


    public function update(Request $request, Team $team)
    {
        //
    }

    public function destroy(Team $team)
    {
        //
    }

    protected function userHasNoTeam()
    {
        return auth()->user()->team === null;
    }
}
