@extends('master')

@section('titulo')
<title>Facturas</title>
@endsection

@section('tabla')

<div class="container text-center my-4">
  <h2>Documentos Electrónicos</h2>
</div>

<!-- MODAL DE FILTRO POR EMPRESA -->
<div class="modal fade" id="FilterModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">¿Qué empresa desea buscar?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
              
        <form method="GET" action="{{ route('ruta.documentos.factura') }}">
          <div class="container text-center my-4">
            <select class="custom-select" name="SelectEmpresa" id="SelectEmpresa" required="required" autofocus>
              <option value="" disabled selected>Seleccione una empresa</option>
              <option value="1791860829001">Empromotor</option>
              <option value="1791410742001">Emproservis</option>
              <option value="1791167104001">Superdealer</option>
            </select>   
          </div>
      </div>
      <div class="modal-footer mx-auto">
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>
        </form>

    </div>
  </div>
</div>

@if(Auth::check())
<script type="text/javascript">
// MUESTRA EL MODAL SIEMPRE QUE SE RECARGA LA PÁGINA
/*$(function() {
    $('#FilterModal').modal('show');
});*/

// MUESTRA EL MODAL UNA SOLA VEZ POR SESIÓN
jQuery(document).ready(function($)
{
  if (sessionStorage.getItem('advertOnce') !== 'true')
  {
    $('#FilterModal').modal('show');
    sessionStorage.setItem('advertOnce','true');
  }

  $('#advert-once .advert-button').on('click',function()
  {
    $('#advert-once').hide();
  });

  $('#logout_session').on('click',function()
    {
      sessionStorage.setItem('advertOnce','');
    });
});
</script>
@endif

<!-- OPCIONES DE BÚSQUEDA DE DOCUMENTOS -->
<div class="container text-center">
  <div class="row">
    <div class="col-sm-5 my-1 mx-auto">
      <form method="GET" action="{{ route('ruta.documentos.factura') }}">
        <div class="input-group">
          <select class="custom-select" name="SelectEmpresa" id="SelectEmpresa" required="required" autofocus>
            <option value="" disabled selected>Seleccione una empresa</option>
            <option value="1791860829001">Empromotor</option>
            <option value="1791410742001">Emproservis</option>
            <option value="1791167104001">Superdealer</option>
          </select>
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
          </div>
        </div>
      </form>
    </div>
    
    <div class="col-sm-5 my-1"> 
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
  </div>
</div>

<div class="container mt-4">
  <!-- PESTAÑAS -->
  <ul class="nav nav-tabs nav-justified">
    <li class="nav-item"><a class="nav-link active" href="{{ route('ruta.documentos.factura') }}">Factura</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('ruta.documentos.debito') }}">Nota de Débito</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('ruta.documentos.credito') }}">Nota de Crédito</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('ruta.documentos.retencion') }}">Retención</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('ruta.documentos.remision') }}">Guías de Remisión</a></li>
  </ul>
      
  @if (count($factura) === 0)
  <div class="card">
    <div class="card-body">
      No se han encontrado documentos actualmente.
    </div>
  </div>
  @else

  <!-- VISUALIZACIÓN DE DOCUMENTOS (TABLA) -->
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
        <td>{{ $value->estado }}</td>
        <td>{{ $value->numero_documento }}</td>
        <td>{{ $value->valor_total }}</td>
        <td>{{ $value->fecha_emision_documento }}</td>
        <td>{{ $value->fecha_autorizacion }}</td>
        <td><a href="{{ route('ruta.documentos.xml', $value->numero_autorizacion) }}"><i class="far fa-file-code fa-lg"></i></td>
        <td><a href="{{ route('ruta.documentos.pdf', $value->numero_autorizacion) }}" target="_blank"><i class="far fa-file-pdf fa-lg"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <!-- PAGINACIÓN -->
  <div class="pagination justify-content-center">
    {{ $factura->appends(Request::except('page'))->links('vendor.pagination.bootstrap-4') }}
  </div>

  @endif
</div>
@endsection