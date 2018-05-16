<?php

namespace WebServiceApp\Http\Controllers;

use Illuminate\Http\Request;
use WebServiceApp\Models\Emproservis;
use Illuminate\Support\Facades\Auth;
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
            ])->orderBy('fecha_emision_documento', 'desc')->paginate(10);

        return view('documents.factura', compact('factura'));
    }

    public function debito()
    {
        $ruc_usuario = Auth::user()->ruc_o_ci;

        $debito = Emproservis::where([
                ['id_documento', '=', 'NOTA DE DEBITO'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'desc')->paginate(10);
        
        return view('documents.debito', compact('debito'));
    }

    public function credito()
    {
        $ruc_usuario = Auth::user()->ruc_o_ci;

        $credito = Emproservis::where([
                ['id_documento', '=', 'NOTA DE CREDITO'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'desc')->paginate(10);

        return view('documents.credito', compact('credito'));
    }    

    public function retencion()
    {
        $ruc_usuario = Auth::user()->ruc_o_ci;

        $retencion = Emproservis::where([
                ['id_documento', '=', 'RETENCION'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'desc')->paginate(10);

        return view('documents.retencion', compact('retencion'));
    }

    public function remision()
    {
        $ruc_usuario = Auth::user()->ruc_o_ci;

        $remision = Emproservis::where([
                ['id_documento', '=', 'GUIA DE REMISION'],
                ['ruc_cliente_proveedor', '=', $ruc_usuario],
            ])->orderBy('fecha_emision_documento', 'desc')->paginate(10);
        
        return view('documents.remision', compact('remision'));
    }

    public function xml($id)
    {
        $string = Emproservis::where('numero_autorizacion', $id)->firstOrFail();
        $xml = $string->xml_documento;

        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="'.$string->numero_documento.'.xml"');
        echo $xml;

        /*return response()->view('downloads.xml', compact('xml'))
            ->header('Content-Type', 'text/xml');*/
    }

    public function pdf($id)
    {
        $base64 = Emproservis::where('numero_autorizacion', $id)->firstOrFail();
        $pdf = $base64->reporte_pdf;        
        $my_bytea = stream_get_contents($pdf);

        $decoded = base64_decode($my_bytea);
        $file = "$base64->numero_documento.pdf";
        file_put_contents($file, $decoded);

        return response()->file($file)->deleteFileAfterSend(true);
    }
}