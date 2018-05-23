<?php

namespace WebServiceApp\Http\Controllers;

use Illuminate\Http\Request;
use WebServiceApp\Models\Emproservis;

class HomeController extends Controller
{
    // Crea una nueva instancia.

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Devuelve el dashboard por defecto. (Inactivo)
    
    public function index()
    {
        return view('home');
    }
}