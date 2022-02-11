<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProjectRequest;
use App\Project;
use Illuminate\Http\Request;

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
        Project::create( $request->validated());

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
        $project->update($request->validated());

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
