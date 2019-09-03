<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project; //Don't need to require type \app\Project::all(); MUST USE CAPS

class TestController extends Controller
{
    //
    public function index()
    {

        //$projects = \app\Project::all(); 
        $projects = Project::all();

        //$projects = auth()=>useR()->projects; future

        //return view('projects.index', ['projects' => $projects]); either or
        return view('projects.index', compact('projects'));
    }
    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $project = new Project();
        //return request()->all(); can use to test

        $project->title = request('title');
        $project->description = request('description');
        $project->save();

        return redirect('/projects');
    }
}
