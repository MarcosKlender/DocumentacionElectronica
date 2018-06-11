<?php

namespace WebServiceApp\Http\Controllers;

use Illuminate\Http\Request;
use WebServiceApp\Models\Emproservis;
use Illuminate\Support\Facades\Auth;
use DB;

class DocumentsController extends Controller
{
    // Crea una nueva instancia.

    public function __construct()
    {
        $this->middleware('auth');
    }

    // Las siguientes funciones se encargan de devolver las facturas del usuario.

    public function factura(Request $request)
    {
        $FiltroEmpresa = $request->get('SelectEmpresa');
        $ruc_usuario = Auth::user()->ruc_o_ci;
        
        // Muestra los documentos filtrados por la empresa seleccionada.
        if ($FiltroEmpresa != '')
        {
            $factura = Emproservis::where([
                    ['ruc_emisor', $FiltroEmpresa],
                    ['id_documento', 'FACTURA'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);
          
            return view('documents.factura', compact('factura'));
        }
        // Si no se selecciona nada, se muestran todos los documentos disponibles.
        else
        {
            $factura = Emproservis::where([
                    ['id_documento', 'FACTURA'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);
          
            return view('documents.factura', compact('factura'));
        }
    }

    public function debito(Request $request)
    {
        $FiltroEmpresa = $request->get('SelectEmpresa');
        $ruc_usuario = Auth::user()->ruc_o_ci;

        // Muestra los documentos filtrados por la empresa seleccionada.
        if ($FiltroEmpresa != '')
        {
            $debito = Emproservis::where([
                    ['ruc_emisor', $FiltroEmpresa],
                    ['id_documento', 'NOTA DE DEBITO'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);
            
            return view('documents.debito', compact('debito'));
        }
        // Si no se selecciona nada, se muestran todos los documentos disponibles.
        else
        {
            $debito = Emproservis::where([
                    ['id_documento', 'NOTA DE DEBITO'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);
            
            return view('documents.debito', compact('debito'));
        }
    }

    public function credito(Request $request)
    {
        $FiltroEmpresa = $request->get('SelectEmpresa');
        $ruc_usuario = Auth::user()->ruc_o_ci;

        // Muestra los documentos filtrados por la empresa seleccionada.
        if ($FiltroEmpresa != '')
        {
            $credito = Emproservis::where([
                    ['ruc_emisor', $FiltroEmpresa],
                    ['id_documento', 'NOTA DE CREDITO'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);

            return view('documents.credito', compact('credito'));
        }
        // Si no se selecciona nada, se muestran todos los documentos disponibles.
        else
        {
            $credito = Emproservis::where([
                    ['id_documento', 'NOTA DE CREDITO'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);

            return view('documents.credito', compact('credito'));
        }
    }    

    public function retencion(Request $request)
    {
        $FiltroEmpresa = $request->get('SelectEmpresa');
        $ruc_usuario = Auth::user()->ruc_o_ci;

        // Muestra los documentos filtrados por la empresa seleccionada.
        if ($FiltroEmpresa != '')
        {
            $retencion = Emproservis::where([
                    ['ruc_emisor', $FiltroEmpresa],
                    ['id_documento', 'RETENCION'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);

            return view('documents.retencion', compact('retencion'));
        }
        // Si no se selecciona nada, se muestran todos los documentos disponibles.
        else
        {
            $retencion = Emproservis::where([
                    ['id_documento', 'RETENCION'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);

            return view('documents.retencion', compact('retencion'));
        }
    }

    public function remision(Request $request)
    {
        $FiltroEmpresa = $request->get('SelectEmpresa');
        $ruc_usuario = Auth::user()->ruc_o_ci;

        // Muestra los documentos filtrados por la empresa seleccionada.
        if ($FiltroEmpresa != '')
        {
            $remision = Emproservis::where([
                    ['ruc_emisor', $FiltroEmpresa],
                    ['id_documento', 'GUIA DE REMISION'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);
            
            return view('documents.remision', compact('remision'));
        }
        // Si no se selecciona nada, se muestran todos los documentos disponibles.
        else
        {
            $remision = Emproservis::where([
                    ['id_documento', 'GUIA DE REMISION'],
                    ['ruc_cliente_proveedor', $ruc_usuario],
                    ['estado', 'AUTORIZADO']
                ])->whereNotNull('xml_documento')->whereNotNull('reporte_pdf')
                ->orderBy('fecha_emision_documento', 'desc')->paginate(10);
            
            return view('documents.remision', compact('remision'));
        }
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