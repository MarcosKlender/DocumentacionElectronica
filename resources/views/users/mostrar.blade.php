@extends('master')

@section('titulo')
<title>Perfil de Usuario</title>
@endsection

@section('usuario')
<div class="container text-center mt-4">
  <h2>Perfil de Usuario</h2>
</div>

@include('flash-message')

@guest
    <li><a href="{{ route('login') }}">Inicio de Sesión</a></li>
    <li><a href="{{ route('register') }}">Registro</a></li>
    @else
    <div class="container mt-5">
    	<div class="card">
		  <h4 class="card-header">Información Personal</h4>
		  <div class="card-body">
		    <h5 class="card-title">Nombre</h5>
		    <p class="card-text">{{ Auth::user()->name }}</p><br>
		    <h5 class="card-title">Correo Electrónico</h5>
		    <p class="card-text">{{ Auth::user()->email }}</p><br>
		    <h5 class="card-title">RUC o CI</h5>
		    <p class="card-text">{{ Auth::user()->ruc_o_ci }}</p>
		  </div>
		</div>
    </div>

	<div class="container mt-5">
	   	<div class="d-flex justify-content-around">
	   		<a class="btn btn-primary" href="{{ route('ruta.usuario.editar') }}" role="button">Editar información</a>
	   		<a class="btn btn-primary" href="{{ route('ruta.usuario.cambiar') }}" role="button">Cambiar contraseña</a>
	   	</div>
	</div>

@endguest

@endsection