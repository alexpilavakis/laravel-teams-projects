<?php

namespace App;

use App\Repositories\Team\DbTeamRepository;
use App\Enums\RoleEnum;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'team_leader_id'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function leader()
    {
        return $this->belongsTo(User::class, 'team_leader_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function setLeader(User $user)
    {
        $teamRepo = new DbTeamRepository($this);

        $currentLeader = $this->leader;

        $currentLeader->removeRole(RoleEnum::TEAM_LEADER);

        $user->giveRoleTo(RoleEnum::TEAM_LEADER);

        $attributes = ['team_leader_id' => $user->id];

        $teamRepo->update($this, $attributes);
    }

}
