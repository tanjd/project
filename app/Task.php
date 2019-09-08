<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function project()
    {
        return $this->belongsTo((Project::class));
    }
    public function complete($completed= true)
    {
        /*$task->update(request([
            'completed' => request()->has('completed')
        ]));*/

        $this->update(compact('completed'));
    }

    public function incomplete()
    {
        //call the complete method but giving 
        $this->complete(false);
    }
}
