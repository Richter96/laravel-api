<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd(Auth::user(), Auth::id());

        $projects = Auth::user()->projects()->orderByDesc('id')->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //cosi facendo ho la table type all'interno di create project
        $types = Type::orderByDesc('id')->get();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        // dd($request->all());
        $val_data =  $request->validated();

        // generate the title slug
        $slug = Project::generateSlug($val_data['title']);

        $val_data['slug'] = $slug;
        $val_data['user_id'] = Auth::id();

        // dd($val_data);

        //aggiungere il check technology


        if ($request->hasFile('image')) {
            $image_path = Storage::put('uploads', $request->image);
            // dd($image_path);
            //bisogna inserire all'interno di val_data che image ha un nuovo percorso
            $val_data['image'] = $image_path;
            // dd($val_data);
        }

        $project = Project::create($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->attach($request->technologies);
        }

        // redirect back
        return to_route('admin.projects.index')->with('message', 'Progetto creato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::orderByDesc('id')->get();
        $technologies = Technology::orderBy('id')->get();
        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data =  $request->validated();
        // dd($val_data);
        // generate the title slug
        $slug = Project::generateSlug($val_data['title']);
        $val_data['slug'] = $slug;

        if ($request->hasFile('image')) {


            if ($project->image) {
                Storage::delete($project->image);
            }

            $image_path = Storage::put('uploads', $request->image);
            // dd($image_path);
            //bisogna inserire all'interno di val_data che image ha un nuovo percorso
            $val_data['image'] = $image_path;
            // dd($val_data);
        }

        $project->update($val_data);

        //aggiungere il check technology
        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }
        // redirect back 
        return to_route('admin.projects.index')->with('message', 'progetto Aggiornato con Successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::delete($project->image);
        }
        $project->delete();
        return to_route('admin.projects.index')->with('message', 'Progetto eliminato');
    }
}
