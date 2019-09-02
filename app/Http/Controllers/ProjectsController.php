<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project; //Don't need to require type \app\Project::all(); MUST USE CAPS

class ProjectsController extends Controller
{
    //
    public function index()
    {
        //$projects = \app\Project::all(); 
        $projects = Project::all(); 

        //return view('projects.index', ['projects' => $projects]); either or
        return view('projects.index', compact('projects'));
    }
}
