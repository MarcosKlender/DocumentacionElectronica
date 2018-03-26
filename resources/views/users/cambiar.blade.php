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

            <form method="POST" action="{{ route('cambiar.usuario') }}">
                
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <!-- <div class="form-group">
                    <label for="OldPassword">Antigua Contraseña</label>
                    <input type="password" class="form-control" id="OldPassword" placeholder="Ingrese su contraseña actual">
                </div> -->
                <div class="form-group">
                    <input type="hidden" class="form-control" name="name" id="name">
                    <input type="hidden" class="form-control" name="email" id="email">
                    <input type="hidden" class="form-control" name="ruc_o_ci" id="ruc_o_ci">
                    <label for="password">Nueva Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Ingrese la contraseña nueva">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Ingrese nuevamente la contraseña nueva">
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