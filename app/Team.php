<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
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
