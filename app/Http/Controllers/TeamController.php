<?php

namespace App\Http\Controllers;

use App\Repositories\Team\TeamRepository;
use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    protected $teamRepo;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->middleware('auth');
        $this->teamRepo = $teamRepo;
    }

    public function all()
    {
        $teams = $this->teamRepo->getAll();

        return view('teams.all', compact('teams'));
    }

    public function index()
    {
        abort_if($this->userHasNoTeam(),403);

        $team = $this->teamRepo->myTeam();

        return view('teams.index', compact('team'));
    }

    public function create()
    {
        $this->authorize('create', Team::class);

        $team = new Team();

        return view('teams.create', compact('team'));
    }

    public function store(Request $request)
    {
        $attributes = $request->all();

        $this->teamRepo->create($attributes);

        return back();

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
