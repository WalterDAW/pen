<?php

namespace pen\Http\Controllers;

use Illuminate\Http\Request;
use pen\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $redirectTo = '/cursos';

    public function index()
    {
        $cursos = Curso::paginate(5);
        return view("cursos.cursos", compact("cursos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("cursos.crear");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cursos = new Curso;
        $cursos->nombre = $request->nombre;
        $cursos->descripcion = $request->descripcion;
        $cursos->save();
        return redirect()->route('cursos')->with('success', 'Información almacenada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cursos = Curso::findOrFail($id);
        return view("cursos.cursos", compact('cursos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $cursos = Curso::find($id);
      return view("cursos.editar", ['cursos' => $cursos]);
    }

    // Actualizar un registro (Update)
	   public function actualizar($id) {
		    $cursos = Curso::find($id);
		    return view('cursos.editar', ['cursos' => $cursos]);
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
        $cursos = Curso::find($id);
        $cursos->update($request->all());
        $cursos->save();
        return redirect('cursos')->with('success', 'Información actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $cursos = Curso::find($id);
        $cursos->delete();
        return redirect('cursos')->with('success', 'Información eliminada con éxito');
    }

    public function search(Request $request)
    {
        $texto = $request->input('buscar');
        $cursos = Curso::where('nombre','like','%'.$texto.'%')
        ->orWhere('descripcion','like','%'.$texto.'%')->paginate(5);

        if (!empty($cursos)) {
            return view('cursos.cursos', compact('texto', 'cursos'));
        } else {
            return redirect('cursos')->with('message', 'Curso no encontrado');
        }
    }

    public function filter(Request $request) {
        if($request->filtro == 'Todos') {
            return view('cursos.cursos');
        } else if ($request->filtro == 'Ascendente') {
            $cursos = Curso::where('id')->orderBy('id', 'asc')->paginate(5);
            return view('cursos.cursos', compact('cursos'));
        } else if ($request->filtro == 'Descendente') {
            $cursos = Curso::where('id')->orderBy('id', 'desc')->paginate(5);
            return view('cursos.cursos', compact('cursos'));
        } else {
            return redirect('cursos')->with('message', 'No funciona');
        }
    }
}
