@extends('master')

@section('tabla')

<div class="container text-center my-4">
  <h2>Documentos Electrónicos</h2>
</div>

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

  <table class="table table-hover table-responsive" id="tabla_documentos">
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
        <!-- <td>{{ $value->xml_documento }}</td> -->
        <td><a href="{{ route('ruta.documentos.xml') }}" target="_blank"><i class="far fa-file-code"></i></td>
        <td><a href="{{ route('ruta.documentos.pdf') }}" target="_blank"><i class="far fa-file-pdf"></i></a></td>
      </tr>
      @endforeach

      <!-- <script type="text/javascript">
        var tbl = document.getElementById("tabla_documentos");
        if (tbl != null) {
            for (var i = 0; i < tbl.rows.length; i++) {
                for (var j = 0; j < tbl.rows[i].cells.length; j++)
                    tbl.rows[i].cells[j].onclick = function () { getval(this); };
            }
        }
 
        function getval(cel) {
            alert(cel.innerHTML);
        }
      </script> -->

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

  <div class="pagination justify-content-center">
    {{ $factura->links('vendor.pagination.bootstrap-4') }}
  </div>

  @endif
</div>
@endsection
<!-- FIN DE LA VISUALIZACIÓN DE DOCUMENTOS -->