@extends('master')

@section('tabla')

<div class="container text-center my-4">
  <h2>Búsqueda de Documentos</h2>
</div>

<div class="container">
  <div class="row justify-content-between">
    <div class="ml-sl-2">    
    Elija la opción de búsqueda:
    </div>
  <div class="mr-sm-2">
    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('ruta.busqueda.ruc') }}">Búsqueda por número de RUC/CI</a>
        <a class="dropdown-item" href="{{ route('ruta.busqueda.numero') }}">Búsqueda por número de documento</a>
        <a class="dropdown-item" href="{{ route('ruta.busqueda.fecha') }}">Búsqueda por fecha de emisión</a>
      </div>
    </div>
  </div>
</div>

@endsection