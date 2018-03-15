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
          <h4 class="card-header">Cambio de Contraseña</h4>
          <div class="card-body">

            <form method="POST" action="{{ url('home/usuario') }}">
                
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="OldPassword">Antigua Contraseña</label>
                    <input type="password" class="form-control" id="OldPassword" placeholder="Ingrese su contraseña actual">
                </div>
                <div class="form-group">
                    <label for="NewPassword">Nueva Contraseña</label>
                    <input type="password" class="form-control" id="NewPassword" placeholder="Ingrese la contraseña nueva">
                </div>
                <div class="form-group">
                    <label for="NewPasswordConfirmation">Confirmar Contraseña</label>
                    <input type="password" class="form-control" id="NewPasswordConfirmation" placeholder="Ingrese nuevamente la contraseña nueva">
                </div>
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Cambiar contraseña</button>
                    <a class="btn btn-primary" href="{{ route('ruta.usuario') }}" role="button">Cancelar</a>
                </div>
          </form>
          
          </div>
        </div>
    </div>

@endguest

@endsection