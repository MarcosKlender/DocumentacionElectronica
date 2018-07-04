<?php

namespace WebServiceApp\Http\Controllers;

use WebServiceApp\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WebServiceApp\Models\Emproservis;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Crea una nueva instancia.

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Devuelve la vista del perfil de usuario.

    public function index()
    {
        return view('users.mostrar');
    }

    /*
    Las siguientes funciones manejan los cambios en la información del usuario, desde su datos personales
    hasta el cambio de contraseña, añadiendo validaciones a cada uno de estos procesos.
    */

    public function editar(User $user)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),
            'ruc_o_ci' => '',
            'password' => ''
        ]);

        if ($data['ruc_o_ci'] != null)
        {
            unset($data['ruc_o_ci'], $data['password']);
        }
        else
        {
            unset($data['ruc_o_ci'], $data['password']);
        }

        Auth::user()->update($data);
        return redirect()->route('ruta.usuario')->with('success','¡Su información se ha editado exitosamente!');
    }

    public function cambiar()
    {
        $data = request()->validate([
            'name' => '',
            'email' => '',
            'ruc_o_ci' => '',
            'password' => 'required|string|min:6|confirmed'
        ]);

        if ($data['password'] != null)
        {
            $data['password'] = bcrypt($data['password']);
        }

        if ($data['name'] != null && $data['email'] != null && $data['ruc_o_ci'] != null)
        {
            unset($data['name'], $data['email'], $data['ruc_o_ci']);
        }
        else
        {
            unset($data['name'], $data['email'], $data['ruc_o_ci']);
        }

        Auth::user()->update($data);
        return redirect()->route('ruta.usuario')->with('success','¡Su contraseña se ha cambiado exitosamente!');
    }

    // Las siguientes funciones devuelven las vistas donde se puede editar la información del usuario.

    public function update_one()
    {
        return view('users.editar');
    }

    public function update_two()
    {
        return view('users.cambiar');
    }
}