@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio de Sesión</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <!-- @if($errors->has('ruc_o_ci'))
                        <div class="alert alert-warning">
                            {{ $errors->first('ruc_o_ci') }}
                        </div>
                        @endif -->

                        <div class="form-group{{ $errors->has('ruc_o_ci') ? ' has-error' : '' }}">
                            <label for="ruc_o_ci" class="col-md-4 control-label">RUC o CI</label>

                            <div class="col-md-6">
                                <input id="ruc_o_ci" type="text" class="form-control" name="ruc_o_ci" value="{{ old('ruc_o_ci') }}" required autofocus>

                                @if ($errors->has('ruc_o_ci'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ruc_o_ci') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar mis datos
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Iniciar Sesión
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    ¿Olvidó su contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
