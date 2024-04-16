<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Estado;
use App\Models\Oferta;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CandidaturasController extends Controller
{
    public function mostrarCandidaturas(): View
    {
        $ofertas = Oferta::join('inscripcion', 'oferta.referencia', '=', 'inscripcion.id_oferta')
                         ->where('inscripcion.id_demandante', '=', 1)
                         ->get();

        $estados = Estado::where('id_demandante', 1)
                         ->where(function ($query) {
                            $query->where('created_at', '=', Estado::where('id_demandante', 1)
                                  ->whereColumn('id_oferta', 'estado.id_oferta')
                                  ->selectRaw('MAX(created_at)')
                            );
                        })->get();

        return view('candidaturas', compact('ofertas', 'estados'));
    }

    public function mostrarCandidatura($idOferta): View
    {
        $copiaIdOferta = intval($idOferta);

        if (is_int($copiaIdOferta)){
            $oferta = Oferta::where('referencia', $copiaIdOferta)->first();

            if ($oferta == null){
                return view('candidaturas');
            }

            $ultimoEstado = Estado::where('id_demandante', 1)
                      ->where('created_at', '=', function($query) {
                          $query->selectRaw('MAX(created_at)')
                                ->from('estado')
                                ->where('id_demandante', 1);
                      })
                      ->where('id_oferta', 1)
                      ->first();

            $empresa = Empresa::join('seleccionador', 'empresa.id', '=', 'seleccionador.id_empresa')
                              ->join('oferta', 'seleccionador.id', '=', 'oferta.id_seleccionador')
                              ->select('empresa.nombre')
                              ->where('oferta.referencia', 1)
                              ->first();


            $estados = Estado::where('id_oferta', $copiaIdOferta)
                             ->where('id_demandante', 1)
                             ->orderBy('created_at', 'desc')
                             ->get();

            return view('candidatura', compact('oferta', 'estados', 'ultimoEstado', 'empresa'));
        }
    }

}
