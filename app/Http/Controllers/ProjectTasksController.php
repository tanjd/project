<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Project;
use PHPUnit\Framework\IncompleteTest;

class ProjectTasksController extends Controller
{
    //

    public function store(Project $project)

    {
        $attributes = request()->validate(['description' => 'required']);
        //calling a method from project.php
        $project->addTask($attributes);
        return back();

        /*Task::create([
            'project_id' => $project->id,
            'description' => request('description')
        ]);

        return back();*/
    }

    /*public function update(Request $request, $id)

    { 

        $task = Task::findOrFail($id);
        $task->completed = $request->has('completed');

        $task->save();
        return back();

        
    }*/

    public function update(Task $task)
    {
        //Need to relearn this
        // dd($task);
        //dd(request()->all());
        /*
        $task->update(request([
            'completed' => request()->has('completed')
        ]));
        return back();*/

        //$task->complete(request()->has('completed'));

        $method = request()->has('completed') ? 'complete' : 'incomplete';
        $task->$method();

        return back();
    }
}
