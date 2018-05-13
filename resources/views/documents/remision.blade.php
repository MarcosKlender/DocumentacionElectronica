@extends('master')

@section('titulo')
<title>Remisiones</title>
@endsection

@section('tabla')

<div class="container text-center my-4">
  <h2>Documentos Electrónicos</h2>
</div>

<!-- OPCIONES DE BÚSQUEDA DE DOCUMENTOS -->
<div class="container text-center my-4">
    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Búsqueda de documentos</a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        @if(Auth::user()->admin == 1)
        <a class="dropdown-item" href="{{ route('ruta.busqueda.ruc') }}">Búsqueda por número de RUC/CI</a>
        @endif
        <a class="dropdown-item" href="{{ route('ruta.busqueda.numero') }}">Búsqueda por número de documento</a>
        <a class="dropdown-item" href="{{ route('ruta.busqueda.valor') }}">Búsqueda por valor</a>
        <a class="dropdown-item" href="{{ route('ruta.busqueda.fecha') }}">Búsqueda por fecha de emisión</a>
      </div>
</div>

<div class="container mt-4">

  <!-- PESTAÑAS -->
  <ul class="nav nav-tabs nav-justified">
    <li class="nav-item"><a class="nav-link" href="{{ route('ruta.documentos.factura') }}">Factura</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('ruta.documentos.debito') }}">Nota de Débito</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('ruta.documentos.credito') }}">Nota de Crédito</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('ruta.documentos.retencion') }}">Retención</a></li>
    <li class="nav-item"><a class="nav-link active" href="{{ route('ruta.documentos.remision') }}">Guías de Remisión</a></li>
  </ul>

  @if (count($remision) === 0)
  <div class="card">
    <div class="card-body">
      No se han encontrado documentos actualmente.
    </div>
  </div>
  @else

  <!-- VISUALIZACIÓN DE DOCUMENTOS (TABLA) -->
  <table class="table table-hover table-responsive">
    <thead>
      <tr>
        <th scope="col">Tipo</th>
        <th scope="col">Cliente</th>
        <!-- <th scope="col">RUC/CI</th> -->
        <th scope="col">Estado</th>
        <th scope="col">Número</th>
        <!-- <th scope="col">Valor</th> -->
        <th scope="col">Fecha Emisión</th>
        <th scope="col">Fecha Autorización</th>
        <th scope="col">XML</th>
        <th scope="col">PDF</th>

      </tr>
    </thead>
    <tbody>
      @foreach($remision as $value)
      <tr>
        <td>{{ $value->id_documento }}</td>
        <td>{{ $value->persona_nombre }}</td>
        <!-- <td>{{ $value->ruc_cliente_proveedor }}</td> -->
        <td>{{ $value->mensaje_sri }}</td>
        <td>{{ $value->numero_documento }}</td>
        <!-- <td>{{ $value->valor_total }}</td> -->
        <td>{{ $value->fecha_emision_documento }}</td>
        <td>{{ $value->fecha_autorizacion }}</td>
        <td><a href="{{ route('ruta.documentos.xml', $value->numero_autorizacion) }}" target="_blank"><i class="far fa-file-code fa-lg"></i></td>
        <td><a href="{{ route('ruta.documentos.pdf', $value->numero_autorizacion) }}" target="_blank"><i class="far fa-file-pdf fa-lg"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- PAGINACIÓN -->
  <div class="pagination justify-content-center">
    {{ $retencion->links('vendor.pagination.bootstrap-4') }}
  </div>

  @endif
</div>
@endsection