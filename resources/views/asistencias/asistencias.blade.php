@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-20 justify-content-center m-3">
        <div class="row justify-content-center m-3">
            <div class="col-md-3">
                <input id="buscar" type="text" class="form-control" name="buscar" autocomplete="buscar" placeholder="Buscar" autofocus>
            </div>
            <div class="col-md-3">
                <select id="ordenar" class="form-control" name="ordenar" required>
                    <option value="Ascendente">Ascendente</option>
                    <option value="Descendente">Descendente</option>
                </select>
            </div>
            <form action="{{ url('buscarAsistencia') }}" method="POST">
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-25">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                 <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                 <li class="breadcrumb-item active" aria-current="page">Asistencias</li>
             </ol>
            </nav>
            <div class="card">
                <div class="card-header">Asistencias</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Numero horas</th>
                            <th>Alumno</th>
                            <th>Asignatura</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($asistencias as $asistencia)
                            <tr>
                                <td class="v-align-middle">{{ $asistencia->numero_horas }}</td>
                                <td class="v-align-middle">{{ $asistencia->alumno }}</td>
                                <td class="v-align-middle">{{ $asistencia->asignatura }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('asistencias/eliminar', $asistencia->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <a href="{{ route('asistencias/actualizar', $asistencia->id) }}" class="btn btn-primary">Modificar</a>
                                      <button type="submit" class="btn btn-danger">Eliminar</button>
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <form action="{{ route('asistencias/crear') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-success">
                                    Crear Asistencia
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <a href="{{ url('home') }}" class="enlaceback">Volver a menu</a>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
