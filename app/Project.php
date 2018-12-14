<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'completed','team_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($task)
    {
        $this->tasks()->create($task);
    }

    public function complete()
    {
        $this->update(['completed' => true]);
    }


    public function incomplete()
    {
        $this->update(['completed' => false]);
    }
}
