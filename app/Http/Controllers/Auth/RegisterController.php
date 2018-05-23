<?php

namespace WebServiceApp\Http\Controllers\Auth;

use WebServiceApp\User;
use WebServiceApp\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja el registro de nuevos usuarios, la validación
    | de los datos y la redirección luego de la creación del usuario.
    |
    */

    use RegistersUsers;

    // Dirección a la que se redirije luego del registro.

    protected function redirectTo()
    {
        $this->redirectTo = '/home/factura';
        return $this->redirectTo;
    }

    // Crea una nueva instancia.

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Agrega validaciones a los campos del registro.

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'ruc_o_ci' => 'required|digits_between:10,13|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    // Crea un nuevo usuario luego de registrarse correctamente.
    
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'ruc_o_ci' => $data['ruc_o_ci'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
