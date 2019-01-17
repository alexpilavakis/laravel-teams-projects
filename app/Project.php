<?php

namespace App;

use App\Repositories\Project\DbProjectRepository;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'description', 'completed','team_id'
    ];

    protected $projectRepo;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTask($attributes)
    {
        $this->projectRepo = new DbProjectRepository($this);

        $this->projectRepo->addTask($attributes);
    }

    public function complete()
    {
        $this->projectRepo = new DbProjectRepository($this);

        $this->projectRepo->update($this, ['completed' => true]);
    }


    public function incomplete()
    {
        $this->projectRepo = new DbProjectRepository($this);

        $this->projectRepo->update($this, ['completed' => false]);
    }
}
