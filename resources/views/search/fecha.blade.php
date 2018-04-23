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

<br>

<div class="container">
  <form action="{{ route('ruta.busqueda.fecha') }}" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
      <input type="date" class="form-control" name="e" placeholder="Ingrese la fecha (año-mes-día)">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary">Búsqueda</button>
      </span>
    </div>
  </form>
</div>

@if(isset($details))

<div class="container mt-4">
  <p>Los resultados para los documentos de la fecha <b>{{ $query }}</b> son:</p>

  <table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th scope="col">Tipo</th>
        <th scope="col">Cliente</th>
        <th scope="col">RUC/CI</th>
        <th scope="col">Estado</th>
        <th scope="col">Número</th>
        <th scope="col">Valor</th>
        <th scope="col">Fecha Emisión</th>
        <th scope="col">Fecha Autorización</th>
        <th scope="col">XML</th>
        <th scope="col">PDF</th>
      </tr>
    </thead>
    <tbody>
      @foreach($details as $value)

      <tr>
        <td>{{ $value->id_documento }}</td>
        <td>{{ $value->persona_nombre }}</td>
        <td>{{ $value->ruc_cliente_proveedor }}</td>
        <td>{{ $value->mensaje_sri }}</td>
        <td>{{ $value->numero_documento }}</td>
        <td>{{ $value->valor_total }}</td>
        <td>{{ $value->fecha_emision_documento }}</td>
        <td>{{ $value->fecha_autorizacion }}</td>
        <td><a href="#" target="_blank"><i class="far fa-file-code"></i></td>
        <td><a href="{{ route('ruta.documentos.pdf') }}" target="_blank"><i class="far fa-file-pdf"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
  
  @elseif(isset($message))
  <p class="container mt-4">{{ $message }}</p>
@endif
</div>

@endsection