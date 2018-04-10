<?php

namespace WebServiceApp\Http\Controllers;

use WebServiceApp\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use WebServiceApp\Models\Emproservis;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.mostrar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editar(User $user)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'ruc_o_ci' => ['required', 'digits_between:10,13', Rule::unique('users')->ignore($user->id)],
            'password' => ''
        ]);

        if ($data['password'] != null)
        {
            unset($data['password']);
        }
        else
        {
            unset($data['password']);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_one()
    {
        return view('users.editar');
    }

    public function update_two()
    {
        return view('users.cambiar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
