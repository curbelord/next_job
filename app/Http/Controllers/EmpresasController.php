<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\Seleccionador;
use App\Models\Oferta;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function mostrar()
    {
        return view('empresas');
    }

    public function mostrarEmpresa(Request $request)
    {

        $nombre_empresa = $request->input('buscador');

        if ($nombre_empresa == null) {
            return view('empresas');
        } else {
            
            // $empresa = Empresa::where('nombre', 'like', '%' . $nombre_empresa . '%')->first();
            $empresa = Empresa::where('nombre', $nombre_empresa)->first();

            if ($empresa == null) {
                return view('empresas');
            } else {
                return view('empresa_buscada', compact('empresa'));
            }

            // $ofertas = Oferta::all();

            //$ofertas = $ofertas->load('seleccionador.empresa');
            
        }
    }
}
