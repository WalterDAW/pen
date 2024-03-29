@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('perfiles') }}">Perfiles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Crear</li>
              </ol>
            </nav>
            <div class="card">
                <div class="card-header">Crear perfil</div>
                <div class="card-body">
                    <!-- Obtengo la sesión actual del usuario -->
                    @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <!-- Muestro el mensaje de validación -->
                    @include('alerts.request')
                    <form method="POST" action="{{ route('perfiles/guardar') }}">
                        <input type="hidden" method="_method" value="PUT">
                        <input type="hidden" method="_token" value="{{ csrf_token() }}">
                        @include('perfiles.index')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
