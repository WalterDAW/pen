@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ url('asignaturas') }}">Asignaturas</a></li>
              <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
          </nav>
            <div class="card">
                <div class="card-header">Crear Asignatura</div>
                <div class="card-body">
                  <!-- Obtengo la sesión actual del usuario -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                    <form method="POST" action="{{ route('asignaturas/actualizar', $asignaturas->id) }}" role="form">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        @include('asignaturas.index')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
