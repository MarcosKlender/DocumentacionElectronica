@extends('master')

@section('titulo')
<title>Edición de Perfil</title>
@endsection

@section('usuario')
<div class="container text-center mt-4">
  <h2>Perfil de Usuario</h2>
</div>



@guest
    <li><a href="{{ route('login') }}">Inicio de Sesión</a></li>
    <li><a href="{{ route('register') }}">Registro</a></li>
    @else
    <div class="container mt-5">
        <div class="card">
          <h4 class="card-header">Actualización de Información</h4>
          <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <h6>Por favor, corrija los siguientes errores:</h6>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('editar.usuario') }}">
                
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label for="ruc_o_ci">RUC o CI</label>
                    <input type="text" class="form-control" name="ruc_o_ci" id="ruc_o_ci" value="{{ Auth::user()->ruc_o_ci }}">
                    <input type="hidden" class="form-control" name="password" id="password">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Actualizar información</button>
                    <a class="btn btn-primary" href="{{ route('ruta.usuario') }}" role="button">Cancelar</a>
                </div>
          </form>
          
          </div>
        </div>
    </div>

@endguest

@endsection