<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project; //Don't need to require type \app\Project::all(); MUST USE CAPS

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //to everything
        $this->middleware('auth');
        //only
        //$this->middleware('auth')->only(['']);
        //Except
        //$this->middleware('auth')->except(['']);
    }
    public function index()
    {

        //$projects = \app\Project::all(); 
        $projects = Project::all();
        $projects = Project::where('owner_id', auth()->id())->get(); //select * from where projects where owner_id - x

        /*auth()->id()// 4  
        auth()->user() //user
        auth()->check()// boolean
        //if (auth()->guest())*/


        //$projects = auth()=>useR()->projects; future

        //return view('projects.index', ['projects' => $projects]); either or
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*public function store(Request $request)
    {
        //
        $project = new Project();
        //return request()->all(); can use to test

        $project->title = request('title');
        $project->description = request('description');
        $project->save();

        return redirect('/projects');
    }*/

    public function store(Request $request)
    {

        //validation: Search validation laravel for more
        $attributes = request()->validate([
            'title' => ['required', 'min:3'],
            'description' => 'required'
        ]);

        $attributes['owner_id'] = auth()->id();

        //Create :use guarded in modal
        Project::create($attributes);

        /*Even shorter than above: Combine validation and create
        Project::create(
            request()->validate([
                'title' => ['required', 'min:3'],
                'description' => 'required'
            ])
        );
        */

        //use fillable 
        /*Project::create(request()->all()); */

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::findOrFail($id);

        $this->authorize('update', $project);
        /* 
        same as above

        abort_if($project->owner_id !== auth()->id(), 403);

        same as above

        if ($project->owner_id !== auth()->id()) {
            abort(403);
        }*/

        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        //
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }*/

    //alternative way 'CLEANER'
    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd(request()->all());
        //find id of the project
        $project = Project::findOrFail($id);

        //check if user have authorization to update
        $this->authorize('update', $project);

        //get title and description from the form and store into $project
        $project->title = request('title');
        $project->description = request('description');

        //update project
        $project->save();
        return redirect('/projects');
    }
    /*public function update(Project $project)
    {
        $project->update(request(['title', 'desciption']));
        
        return redirect('/projects');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //dd('hello');
        $this->authorize('update', $project);
        Project::delete();

        return redirect('/projects');
    }
}
