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
            <form action="{{ url('buscarAsignatura') }}" method="POST">
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
                 <li class="breadcrumb-item active" aria-current="page">Asignaturas</li>
             </ol>
            </nav>
            <div class="card">
                <div class="card-header">Asignaturas</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Curso</th>
                            <th>Aula</th>
                            <th colspan="2">Acción</th>
                        </tr>
                        @foreach($asignaturas as $asignatura)
                            <tr>
                                <td class="v-align-middle">{{ $asignatura->nombre }}</td>
                                <td class="v-align-middle">{{ $asignatura->descripcion }}</td>
                                <td class="v-align-middle">{{ $asignatura->curso_id }}</td>
                                <td class="v-align-middle">{{ $asignatura->aula_id }}</td>
                                <td class="v-align-middle">
                                  <form action="{{ route('asignaturas/eliminar', $asignatura->id) }}" method="POST" class="form-horizontal" role="form" onsubmit="return confirmarEliminar()">
                                      <input type="hidden" name="_method" value="PUT">
                                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      @if(Auth::check())
                                          @if(Auth::user()->hasRole('admin'))
                                            <a href="{{ route('asignaturas/editar', $asignatura->id) }}" class="btn btn-primary">Modificar</a>
                                            <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Eliminar</button>
                                            @include('alerts.dialogos')
                                          @else
                                              @if(Auth::user()->hasRole('student'))
                                                <a href="{{ route('asignaturas/editar', $asignatura->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                              @else
                                                @if(Auth::user()->hasRole('teacher'))
                                                    <a href="{{ route('asignaturas/editar', $asignatura->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                    <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                                @else
                                                    if(Auth::user()->hasRole('user'))
                                                      <a href="{{ route('asignaturas/editar', $asignatura->id) }}" class="btn btn-primary" disabled>Modificar</a>
                                                      <button type="submit" class="btn btn-danger" disabled>Eliminar</button>
                                                    @endif
                                                @endif
                                              @endif
                                          @endif
                                  </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <form action="{{ route('asignaturas/crear') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <button type="submit" class="btn btn-success">
                                    Crear Asignatura
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
