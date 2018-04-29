@extends('master')

@section('tabla')

<div class="container text-center my-4">
  <h2>Documentos Electrónicos</h2>
</div>

<div class="container text-center my-4">
    <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Búsqueda de documentos</a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <!-- <a class="dropdown-item" href="{{ route('ruta.busqueda.ruc') }}">Búsqueda por número de RUC/CI</a> -->
        <a class="dropdown-item" href="{{ route('ruta.busqueda.numero') }}">Búsqueda por número de documento</a>
        <a class="dropdown-item" href="{{ route('ruta.busqueda.valor') }}">Búsqueda por valor</a>
        <a class="dropdown-item" href="{{ route('ruta.busqueda.fecha') }}">Búsqueda por fecha de emisión</a>
      </div>
</div>

<!-- INICIO DE LA VISUALIZACIÓN DE DOCUMENTOS -->
<div class="container mt-4">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('ruta.documentos.factura') }}">Factura - Nota de Débito - Nota de Crédito</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('ruta.documentos.retencion') }}">Retención</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('ruta.documentos.remision') }}">Guías de Remisión</a>
    </li>
  </ul>
      
  @if (count($factura) === 0)
  <div class="card">
    <div class="card-body">
      No se han encontrado documentos actualmente.
    </div>
  </div>
  @else

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

      @foreach($factura as $value)
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

      @foreach($debito as $value)
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

      @foreach($credito as $value)
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
  @endif
</div>
@endsection
<!-- FIN DE LA VISUALIZACIÓN DE DOCUMENTOS -->