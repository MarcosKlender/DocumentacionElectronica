@extends('master')

@section('usuario')
<div class="container text-center mt-4">
  <h2>Perfil de Usuario</h2>
</div>

@guest
    <li><a href="{{ route('login') }}">Inicio de Sesión</a></li>
    <li><a href="{{ route('register') }}">Registro</a></li>
    @else
    <div class="container mt-4">
    	<div class="card">
		  <div class="card-header">
		    Información Personal
		  </div>
		  <div class="card-body">
		    <h5 class="card-title">Nombre</h5>
		    <p class="card-text">{{ Auth::user()->name }}</p><br>
		    <h5 class="card-title">Correo Electrónico</h5>
		    <p class="card-text">{{ Auth::user()->email }}</p><br>
		    <h5 class="card-title">RUC o CI</h5>
		    <p class="card-text">{{ Auth::user()->ruc_o_ci }}</p><br>
		  </div>
		</div>
    </div>
@endguest

@endsection