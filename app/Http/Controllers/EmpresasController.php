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
            
            $empresa = Empresa::where('nombre', $nombre_empresa)->first();

            $ofertas = Oferta::all();
            $ofertas = $ofertas->load('seleccionador.empresa');

            $empresa_id = Empresa::where('nombre', $nombre_empresa)->first()->value('id');

            $seleccionadores = Seleccionador::where('id_empresa', $empresa_id)->get();

            $ofertas_empresa = Oferta::whereIn('id_seleccionador', $seleccionadores->pluck('id'))->limit(5)->orderBy('created_at', 'DESC')->get();

            $empresa->ofertas = $ofertas_empresa;

            if ($empresa == null) {
                return view('empresas');
            } else {
                return view('empresa_buscada', compact('empresa'));
            }
            
        }
    }
}
