<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Estado;
use App\Models\Oferta;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidaturasController extends Controller
{
    public function mostrarCandidaturas(Request $request): View
    {
        $offset = 0;

        if ($request->pagina) {
            $offset = (intval($request->pagina) * 10) - 10;
        }

        $candidaturas = Oferta::join('inscripcion', 'oferta.referencia', '=', 'inscripcion.id_oferta')
                              ->leftJoin('seleccionador', 'oferta.id_seleccionador', '=', 'seleccionador.id')
                              ->leftJoin('empresa', 'seleccionador.id_empresa', '=', 'empresa.id')
                              ->leftJoin('estado', function($join) {
                                $join->on('oferta.referencia', '=', 'estado.id_oferta')
                                    ->whereRaw('estado.created_at = (SELECT MAX(created_at) FROM estado WHERE estado.id_oferta = oferta.referencia)');
                            })
                              ->where('inscripcion.id_demandante', '=', Auth::id())
                              ->select('oferta.referencia', 'oferta.puesto_trabajo', 'empresa.nombre as nombre_empresa', 'estado.nombre as nombre_estado', 'estado.visto as visto')
                              ->get();

        $cantidadTotalCandidaturas = $candidaturas->count();
        $candidaturas = $candidaturas->skip($offset)->take(10);

        return view('candidaturas', compact('candidaturas', 'cantidadTotalCandidaturas'));
    }

    public function mostrarCandidatura($idOferta): View
    {
        $copiaIdOferta = intval($idOferta);

        if (is_int($copiaIdOferta)){
            $oferta = Oferta::where('referencia', $copiaIdOferta)->first();

            if ($oferta == null){
                return view('candidaturas');
            }

            $ultimoEstado = Estado::where('id_demandante', Auth::id())
                      ->where('id_oferta', $copiaIdOferta)
                      ->where('created_at', '=', function($query) use ($copiaIdOferta) {
                          $query->selectRaw('MAX(created_at)')
                                ->from('estado')
                                ->where('id_demandante', 1)
                                ->where('id_oferta', $copiaIdOferta);
                      })
                      ->first();

            $empresa = Empresa::join('seleccionador', 'empresa.id', '=', 'seleccionador.id_empresa')
                              ->join('oferta', 'seleccionador.id', '=', 'oferta.id_seleccionador')
                              ->select('empresa.nombre')
                              ->where('oferta.referencia', $copiaIdOferta)
                              ->first();

            $estados = Estado::where('id_oferta', $copiaIdOferta)
                             ->where('id_demandante', Auth::id())
                             ->orderBy('created_at', 'desc')
                             ->get();

            $this->cambiarCandidaturaAVista($estados);

            return view('candidatura', compact('oferta', 'estados', 'ultimoEstado', 'empresa'));
        }
    }

    public function cambiarCandidaturaAVista($estados): void
    {
        $copiaEstados = $estados;

        foreach ($copiaEstados as $estado) {
            $estado->visto = true;
            $estado->save();
        }
    }

}
