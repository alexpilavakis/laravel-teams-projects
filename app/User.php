<?php

namespace App;

use App\Repositories\User\DbUserRepository;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermission;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermission;

    protected $fillable = [
        'name', 'email', 'password', 'team_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function hasTeam()
    {
        return $this->team()->count();
    }

    public function hasProjects()
    {
        if($this->hasTeam()){
            return (bool)$this->team->projects->count();
        }
        return false;
    }

    public function role()
    {
        return $this->hasMany(Role::class);
    }

    public function assignTo(Team $team)
    {
        $userRepo = new DbUserRepository($this);

        $userRepo->update($this,['team_id' => $team->id]);
    }

    public function removeFromTeam()
    {
        $userRepo = new DbUserRepository($this);

        $userRepo->update($this,['team_id' => NULL]);
    }

}
