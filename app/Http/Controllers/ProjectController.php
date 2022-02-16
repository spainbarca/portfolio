<?php

namespace App\Http\Controllers;

use App\Category;
use App\Events\ProjectSaved;
use App\Http\Requests\SaveProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //$this->middleware('auth')->only('create','edit');
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        //return Project::onlyTrashed()->with('category')->latest()->paginate();
        /*$portfolio = [
            ['title' => 'Proyecto #1'],
            ['title' => 'Proyecto #2'],
            ['title' => 'Proyecto #3'],
            ['title' => 'Proyecto #4'],
        ];*/
        return view('projects.index', [
            'newProject' => new Project,
            'projects' => Project::with('category')->latest()->paginate(6),
            'deletedProjects' => Project::onlyTrashed()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveProjectRequest $request)
    {
        $project=new Project($request->validated());
        $project->image = $request->file('image')->store('images');
        $project->save();

        ProjectSaved::dispatch($project);

        return redirect()->route('projects.index')->with('status', 'El proyecto fue creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //return $id;
        return view('projects.show', [
            'project' => $project,
        ]);

        return redirect()->route('projects.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, SaveProjectRequest $request)
    {
        if ($request->hasFile('image')){
            Storage::delete($project->image);
            $project->fill($request->validated());
            $project->image = $request->file('image')->store('images');
            $project->save();

            ProjectSaved::dispatch($project);

        } else {
             $project->update(array_filter($request->validated()));
        }
        return redirect()->route('projects.show', $project)->with('status', 'El proyecto fue actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
         $this->authorize('delete', $project);
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito');
    }

    public function forceDelete( $projectUrl)
    {
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();
         $this->authorize('forceDelete', $project);

         Storage::delete($project->image);

         $project->forceDelete();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado permanentemente');
    }

    public function restore( $projectUrl)
    {
        $project = Project::withTrashed()->whereUrl($projectUrl)->firstOrFail();
         $this->authorize('restore', $project);
        $project->restore();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue restaurado con éxito');
    }

    public function create()
    {
        //abort_unless(Gate::allows('create-projects'), 403);
        $this->authorize('create-projects');

        return view('projects.create', [
            'project' => new Project,
            'categories' => Category::pluck('name','id'),
        ]);

    }

    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.edit', [
            'project' => $project,
            'categories' => Category::pluck('name','id'),
        ]);
    }
}
