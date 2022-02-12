<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
        /*$portfolio = [
            ['title' => 'Proyecto #1'],
            ['title' => 'Proyecto #2'],
            ['title' => 'Proyecto #3'],
            ['title' => 'Proyecto #4'],
        ];*/
        return view('projects.index', [
            'projects' => Project::paginate(6),
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

        $image = Image::make(Storage::get($project->image))
            ->widen(600)
            ->limitColors(255)
            ->encode();

        Storage::put($project->image, (string)$image);

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

            // optimización
            $image = Image::make(Storage::get($project->image))
                ->widen(600)
                ->limitColors(255)
                ->encode();

            Storage::put($project->image, (string)$image);

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
        Storage::delete($project->image);
        $project->delete();
        return redirect()->route('projects.index')->with('status', 'El proyecto fue eliminado con éxito');
    }

    public function create()
    {
        return view('projects.create', [
            'project' => new Project,
        ]);
    }

    public function edit(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
        ]);
    }
}
