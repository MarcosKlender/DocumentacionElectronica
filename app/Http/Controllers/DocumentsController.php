<?php

namespace WebServiceApp\Http\Controllers;

use Illuminate\Http\Request;
use WebServiceApp\Models\Emproservis;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use DB;

class DocumentsController extends Controller
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
        //
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

    public function factura()
    {
        $ruc_usuario = Auth::user()->ruc_o_ci;

        $factura = Emproservis::where([
                ['id_documento', '=', 'FACTURA'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'asc')->get();
        $debito = Emproservis::where([
                ['id_documento', '=', 'NOTA DE DEBITO'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'asc')->get();
        $credito = Emproservis::where([
                ['id_documento', '=', 'NOTA DE CREDITO'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'asc')->get();

        return view('documents.factura', compact('factura', 'debito', 'credito'));
    }

    public function retencion()
    {
        $ruc_usuario = Auth::user()->ruc_o_ci;

        $retencion = Emproservis::where([
                ['id_documento', '=', 'RETENCION'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'asc')->get();

        return view('documents.retencion', compact('retencion'));
    }

    public function remision()
    {
        $ruc_usuario = Auth::user()->ruc_o_ci;

        $remision = Emproservis::where([
                ['id_documento', '=', 'GUIA DE REMISION'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'asc')->get();
        
        return view('documents.remision', compact('remision'));
    }

    public function xml()
    {
        $ruc_usuario = Auth::user()->ruc_o_ci;

        $xml = Emproservis::where([
                ['id_documento', '=', 'FACTURA'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'asc')->get();
        return view('documento', compact('xml'));
    }

    public function pdf()
    {
        $data = ['name' => 'Marcos Klender'];
        $pdf = PDF::loadView('documents.pdf', compact('data'));
        return $pdf->stream('factura.pdf');
    }
}