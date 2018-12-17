<?php

namespace App;

use App\Repositories\Team\DbTeamRepository;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Team\TeamRepository;

class Team extends Model
{
    protected $fillable = ['name', 'team_leader_id'];

    protected $teamRepo = TeamRepository::class;


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

}
