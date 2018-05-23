<?php

namespace WebServiceApp\Http\Controllers\Auth;

use WebServiceApp\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador es responsable de manejar los correos electrónicos
    | enviados a los usuarios en caso de necesitar una nueva contraseña.
    |
    */

    use SendsPasswordResetEmails;

    // Crea una nueva instancia.

    public function __construct()
    {
        $this->middleware('guest');
    }
}
