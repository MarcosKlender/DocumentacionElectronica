<?php

namespace WebServiceApp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use WebServiceApp\Models\Emproservis;
use Illuminate\Support\Facades\Auth;

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

    //BÚSQUEDA POR RUC SOLAMENTE PARA EL SUPERUSUARIO
    public function ruc()
    {
        $w = Input::get('w');
        if($w != '')
        {
            $emproservis = Emproservis::where('ruc_cliente_proveedor', '=', $w)
            ->orderBy('fecha_emision_documento', 'asc')->get();
            if(count($emproservis) > 0)
            {
                return view('search.ruc')->withDetails($emproservis)->withQuery($w);
            }
            elseif(count($emproservis) === 0)
            {
                return view('search.ruc')->withMessage('No se ha encontrado ningún documento.');
            }
        }
        return view('search.ruc');
    }

    public function numero()
    {
        $q = Input::get('q');
        if($q != '')
        {
            $ruc_usuario = Auth::user()->ruc_o_ci;

            $emproservis = Emproservis::where([
                ['numero_documento', 'LIKE', $q.'%'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'asc')->get();
            
            if(count($emproservis) > 0)
            {
                return view('search.numero')->withDetails($emproservis)->withQuery($q);
            }
            elseif(count($emproservis) === 0)
            {
                return view('search.numero')->withMessage('No se ha encontrado ningún documento.');
            }
        }
        return view('search.numero');
    }

    public function valor()
    {
        $x = Input::get('x');
        if($x != '')
        {
            $ruc_usuario = Auth::user()->ruc_o_ci;

            $emproservis = Emproservis::where([
                ['valor_total', 'LIKE', $x.'%'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('valor_total', 'asc')->get();
            
            if(count($emproservis) > 0)
            {
                return view('search.valor')->withDetails($emproservis)->withQuery($x);
            }
            elseif(count($emproservis) === 0)
            {
                return view('search.valor')->withMessage('No se ha encontrado ningún documento.');
            }
        }
        return view('search.valor');
    }

    public function fecha()
    {
        $e1 = Input::get('e1');
        $e2 = Input::get('e2');
        $ruc_usuario = Auth::user()->ruc_o_ci;

        if($e1 != '' and $e2 != '')
        {
            $emproservis = Emproservis::whereBetween('fecha_emision_documento', [$e1, $e2])
            ->where('ruc_cliente_proveedor', '=', $ruc_usuario)->orderBy('fecha_emision_documento', 'asc')->get();
            if(count($emproservis) > 0)
            {
                $fechas = ['desde' => $e1, 'hasta' => $e2];
                return view('search.fecha')->withDetails($emproservis)->with($fechas);
            }
            elseif(count($emproservis) === 0)
            {
                return view('search.fecha')->withMessage('No se ha encontrado ningún documento.');
            }
        }
        return view('search.fecha');
    }
}
