<?php

namespace App;

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
        $this->update(['completed' => true]);
    }
    public function incomplete()
    {
        $this->update(['completed' => false]);
    }
}
