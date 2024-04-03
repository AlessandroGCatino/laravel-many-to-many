<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view("dashboard.index", compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view("dashboard.create", compact("types", "technologies"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $validatedData = $request->validated();

        if($request->hasFile("cover")){
            $path = Storage::disk("public")->put("projects_images", $request->cover);

            $validatedData["cover"] = $path;
            
        }
        
        

        $newProject = Project::create($validatedData);
        

        if($request->has("technologies")){
            $newProject->technologies()->attach($request->technologies);
        }
        
        return redirect()->route("projects.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('dashboard.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view("dashboard.edit", compact("project", "types", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validatedData = $request->validated();

        if($request->hasFile("cover")){
            if($project->cover){
                Storage::delete($project->cover);
            }
            $path = Storage::disk("public")->put("projects_images", $request->cover);
            $validatedData["cover"] = $path;
        }
        
        $project->update($validatedData);

        if($request->has("technologies")){
            $project->technologies()->sync($request->technologies);
        }
        return redirect()->route("projects.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if($project->cover){
            Storage::delete($project->cover);
        }

        $project->delete();

        return redirect()->route("projects.index");
    }
}
