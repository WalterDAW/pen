<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Asistencia;
use pen\Alumno;
use pen\Curso;
use pen\Asignatura;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/asistencias';

    public function index()
    {
        $asistencias = Asistencia::paginate(5);
        return view("asistencias.asistencias", compact("asistencias"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = Alumno::orderBy('id')->pluck('nombre','id')->toArray();
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre','id')->toArray();
        return view('asistencias.crear', ['alumnos' => $alumnos], ['asignaturas' => $asignaturas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asistencias = new Asistencia;
        $asistencias->numero_horas = $request->numero_horas;
        $asistencias->alumno()->associate($request->alumno_id);
        $asistencias->asignatura()->associate($request->asignatura_id);
        $asistencias->save();
        return redirect('asistencias')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asistencias = Asistencia::find($id);
        return view("asistencias.asistencias", compact('asistencias'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asistencias = Asistencia::find($id);
        $alumnos = Alumno::orderBy('id')->pluck('nombre','id')->toArray();
        $asignaturas = Asignatura::orderBy('id')->pluck('nombre','id')->toArray();
        return view("asistencias.editar", compact("asistencias","alumnos","asignaturas"));
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
        $asistencias = Asistencia::find($id);
        $asistencias->update($request->all());
        $asistencias->save();
        return redirect("asistencias")->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $asistencias = Asistencia::find($id);
        $asistencias->delete();
        return redirect("asistencias")->with('success','Información eliminada con éxito');
    }

    public function search(Request $request) {
        $texto = $request->input('buscar');
        $asistencias = Asistencia::where('numero_horas','like','%'.$texto.'%')->paginate(5);
        if (!empty($asistencias)) {
            return view('asistencias.asistencias', compact('texto', 'asistencias'));
        } else {
            return redirect('asistencias')->with('message', 'Asistencia no encontrado');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('asistencias.asistencias');
        } else if ($request->filtro == 'Ascendente') {
            $asistencias = Asistencia::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('asistencias.asistencias', compact('asistencias'));
        } else if ($request->filtro == 'Descendente') {
            $asistencias = Asistencia::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('asistencias.asistencias', compact('asistencias'));
        } else {
            return redirect('asistencias')->with('message', 'No funciona');
        }
    }
}
