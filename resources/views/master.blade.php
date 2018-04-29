<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Home</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/extras.min.css') }}" rel="stylesheet">
        <script src="{{ url('js/jquery-3.2.1.min.js') }}"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #303C91;">
          <a class="navbar-brand" href="{{ route('ruta.documentos.factura') }}">
            <img src="http://www.emproservis.com/30-tm_thickbox_default/firehawk-900.jpg" width="30" height="30" class="d-inline-block align-top" alt="#">Emproservis</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          @guest
          <li><a href="{{ route('login') }}">Inicio de Sesión</a></li>
          <li><a href="{{ route('register') }}">Registro</a></li>
          @else
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link active">Bienvenido/a, {{ Auth::user()->name }}</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('ruta.documentos.factura') }}">Mis Documentos</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="{{ route('ruta.busqueda') }}">Búsqueda</a>
              </li> -->
              <li class="nav-item">
                <a class="nav-link" href="{{ route('ruta.usuario') }}">Mi Perfil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
              </li>
            </ul>
          </div>
        </nav>
        @endguest

        @yield('tabla')

        @yield('usuario')

        {{-- <div class="navbar fixed-bottom" align="center" style="background-color: #303C91">
          <span class="align-middle text-light">@ 2018 - Emproservis. Todos los derechos reservados.</span>
        </div>--}}
        <!-- Scripts -->
        <script src="{{ url('js/popper.min.js') }}"></script>
        <script src="{{ url('js/bootstrap.min.js') }}"></script>
    </body>
</html>