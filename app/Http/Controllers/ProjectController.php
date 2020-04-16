<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    //midelware validacion pregunta primero antes de hacer una peticion

    public function __construct() 
    {
        $this->middleware('auth')->except('index','show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $project = \DB::table('projects')->get();
        $project = Project::get();

        return view('project', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create', [
           'project' => new Project
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProjectRequest $request)
    {
        // Project::create([
        //     'title' => $request->title,
        //     'url' => $request->url,
        //     'description' => $request->description
        // ]);

        //Otra forma de guardar los datos si tienen el mismo nombre
        //Project::create(request()->all())

        //si quitamos la asigacion masiva podemos guradar de la siguente manera y evitar inyecciones
        //Project::create(request()->only('title','url','descprition'));

        //Validaciones from-request y quitar asignacion masiva para protegernos
        Project::create($request->validated());
        
        return redirect()->route('projects.index')->with('status', "El Proyecto fue creado");;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Route model Binding -> Project $project
    public function show(Project $project)
    {
        return  view('projects.show', [
            // findOrFail() en la aplicación con un ID de un registro que no exista provocará un salto a la página 404 configurada en la aplicación
           'project' => $project
       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return  view('projects.edit', [
            // findOrFail() en la aplicación con un ID de un registro que no exista provocará un salto a la página 404 configurada en la aplicación
           'project' => $project
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, CreateProjectRequest $request)
    {
        $project->update($request->validated());
        
        return redirect()->route('projects.index')->with('status', "El Proyecto fue actualizado");
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
        
        return redirect()->route('projects.index')->with('status', "El Proyecto Eliminado");;
    }
}
