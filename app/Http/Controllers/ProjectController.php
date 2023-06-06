<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.index',[
            'projects' => SpladeTable::for(Project::class)
            ->column('id')
            ->column('name')
            ->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //    for($i=1;$i<=10;$i++)
    //    {
    //     Category::create([
    //         'name' => 'test'.$i
    //     ]);
    //    }
       $categories = Category::pluck('name','id');
       $users = User::pluck('name','id');
       
       return view('projects.create',compact('categories','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectRequest $request)
    {
         $project = Project::create($request->validated());
         $project->users()->attach($request->users);

         Toast::title('Project Saved');
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
