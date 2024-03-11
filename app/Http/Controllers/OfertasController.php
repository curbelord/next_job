<?php

namespace App\Http\Controllers;
use App\Models\Oferta;
use App\Models\Seleccionador;
use App\Models\Empresa;
use App\Models\Inscripcion;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function mostrar(Request $request)
    {

        $ofertas = Oferta::query();

        if ($ubicacion = request('provincia')) {
            $ofertas->where('ubicacion', $ubicacion);
        }

        if ($buscador = request('buscador')) {
            $ofertas->where(function ($query) use ($buscador) {
                $query->where('puesto_trabajo', 'like', '%' . $buscador . '%')
                    ->orWhere('descripcion', 'like', '%' . $buscador . '%')
                    ->orWhere('sector', 'like', '%' . $buscador . '%');
            });
        }

        $ofertas = $ofertas->get();

        $ofertas->load('seleccionador.empresa');

        return view('ofertas', compact('ofertas'));
    }

    public function mostrarOferta($parametro) {
        $oferta = Oferta::find($parametro);

        $inscripciones = Inscripcion::where('id_oferta', $parametro)->count();

        $oferta->load('seleccionador.empresa');

        return view('descripcion', compact('oferta'), compact('inscripciones'));
    }

    public function crear(Request $request){
        $oferta = new Oferta;
        $oferta->puesto_trabajo = $request->titulo_crear_oferta;
        $oferta->save();
        // Seguir almacenando el resto de campos
    }
}
