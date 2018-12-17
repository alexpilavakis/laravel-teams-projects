<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
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
        $user->removeFrom($team);

        return redirect('/teams/'.$team->id);
    }

    public function leader(Team $team, User $user)
    {
        $currentLeader = $team->leader;

        $currentLeader->removeRole(RoleEnum::TEAM_LEADER);

        $user->giveRoleTo(RoleEnum::TEAM_LEADER);

        $attributes = ['team_leader_id' => $user->id];

        $this->teamRepo->update($team, $attributes);

        return redirect('/teams/'.$team->id);
    }
}
