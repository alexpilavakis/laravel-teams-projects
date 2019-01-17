<?php

namespace App\Http\Controllers;

use App\Team;
use App\User;
use Illuminate\Http\Request;
use App\Repositories\Team\TeamRepository;

class TeamUserController extends Controller
{
    protected $teamRepo;

    public function __construct(TeamRepository $teamRepo)
    {
        $this->teamRepo = $teamRepo;
    }

    public function assign(Team $team)
    {
       // dd('xmm');
        $users = User::where('team_id', null)->get();

        return view('users.assign', compact('team', 'users'));
    }

    public function store(Request $request, Team $team)
    {
        $user = User::find($request->get('user_id'));

        $user->assignTo($team);

        return redirect('/teams/'.$team->id);
    }

    public function remove(Team $team, User $user)
    {
        $user->removeFromTeam();

        return redirect('/teams/'.$team->id);
    }

    public function leader(Team $team, User $user)
    {
        $team->setLeader($user);

        return redirect('/teams/'.$team->id);
    }
}
