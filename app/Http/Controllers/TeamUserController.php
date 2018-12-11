<?php

namespace App\Http\Controllers;

use App\Project;
use App\Role;
use App\Team;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamUserController extends Controller
{
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
}
