<?php

namespace WebServiceApp\Http\Controllers\Auth;

use WebServiceApp\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador se encarga de manejar las peticiones de
    | reestablecimiento de contraseñas.
    |
    */

    use ResetsPasswords;

    // Dirección a la que se redirije luego de reestablecer la contraseña.

    protected function redirectTo()
    {
        return redirect()->guest('/home/factura');
    }

    // Crea una nueva instancia.

    public function __construct()
    {
        $this->middleware('guest');
    }
}
