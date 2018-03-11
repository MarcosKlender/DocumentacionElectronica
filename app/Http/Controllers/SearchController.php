<?php

namespace WebServiceApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use WebServiceApp\Models\Emproservis;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('search.opciones');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    public function ruc()
    {
        $w = Input::get('w');
        if($w != '')
        {
            $emproservis = Emproservis::take(5)->where('ruc_cliente_proveedor', 'LIKE', '%'.$w.'%')->get();
            if(count($emproservis) > 0)
                return view('search.ruc')->withDetails($emproservis)->withQuery($w);
        }
        return view('search.ruc')->withMessage('No se ha encontrado ningún documento.');
    }

    public function numero()
    {
        $q = Input::get('q');
        if($q != '')
        {
            $emproservis = Emproservis::take(5)->where('numero_documento', 'LIKE', '%'.$q.'%')->get();
            if(count($emproservis) > 0)
                return view('search.numero')->withDetails($emproservis)->withQuery($q);
        }
        return view('search.numero')->withMessage('No se ha encontrado ningún documento.');
    }

    public function fecha()
    {
        $e = Input::get('e');
        if($e != '')
        {
            $emproservis = Emproservis::take(5)->where('fecha_emision_documento', 'LIKE', '%'.$e.'%')->get();
            if(count($emproservis) > 0)
                return view('search.fecha')->withDetails($emproservis)->withQuery($e);
        }
        return view('search.fecha')->withMessage('No se ha encontrado ningún documento.');
    }
}
