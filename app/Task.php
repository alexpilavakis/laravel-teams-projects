<?php

namespace App;

use App\Repositories\Task\DbTaskRepository;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = ['description', 'completed'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    public function complete()
    {
        $taskRepo = new DbTaskRepository($this);

        $taskRepo->update($this, ['completed' => true]);
    }
    public function incomplete()
    {
        $taskRepo = new DbTaskRepository($this);

        $taskRepo->update($this, ['completed' => false]);
    }
}
