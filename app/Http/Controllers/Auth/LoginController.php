<?php

namespace WebServiceApp\Http\Controllers\Auth;

use WebServiceApp\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja la autenticación de los usuarios y los
    | redirige a la página principal luego del inicio de sesión.
    |
    */

    use AuthenticatesUsers;

    // Dirección a la que se redirije luego del inicio de sesión.

    protected function redirectTo()
    {
        return redirect()->guest('/home/factura');
    }

    // Crea una nueva instancia.

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Reemplaza el requerimiento de entrada para el login.

    public function username()
    {
        return 'ruc_o_ci';
    }

    // Determina el número máximo de intentos y el tiempo de bloque del login.

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return $this->limiter()->tooManyAttempts(
            $this->throttleKey($request), 2, 1
        );
    }
}
