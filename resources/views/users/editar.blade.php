@extends('master')

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

            <form method="POST" action="{{ url('home/usuario') }}">
                
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" id="name" placeholder="{{ Auth::user()->name }}">
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label for="ruc_o_ci">RUC o CI</label>
                    <input type="text" class="form-control" id="ruc_o_ci" placeholder="{{ Auth::user()->ruc_o_ci }}">
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