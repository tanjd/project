<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class ProjectTasksController extends Controller
{
    //
    // public function update(Task $task)
    public function update(Request $request, $id)

    {
        //Need to relearn this
        // dd($task);
        //dd(request()->all());
        /*
        $task->update(request([
            'completed' => request()->has('completed')
        ]));
        return back();*/

        $task = Task::findOrFail($id);
        $task->completed = $request->has('completed');

        $task->save();
        return back();

        //$page->update($input);
    }
}
