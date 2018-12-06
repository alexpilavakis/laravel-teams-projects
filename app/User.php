<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermission;

class User extends Authenticatable
{
    use Notifiable;
    use HasPermission;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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

}
