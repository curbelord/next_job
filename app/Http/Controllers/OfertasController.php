<?php

namespace App\Http\Controllers;
use App\Models\Oferta;
use App\Models\Seleccionador;
use App\Models\Empresa;
use App\Models\Estado;
use App\Models\Inscripcion;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfertasController extends Controller
{
    public function mostrar(Request $request): View
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

        return view('gestionar.ofertas.ofertas', compact('ofertas'));
    }

    public function buscaOfertaEInscritos($ofertaId): array
    {
        $oferta = Oferta::find($ofertaId);
        $inscripciones = Inscripcion::where('id_oferta', $ofertaId)->count();

        return [$oferta, $inscripciones];
    }

    public function usuarioInscrito($ofertaId): bool
    {
        $inscrito = Inscripcion::where('id_oferta', $ofertaId)->where('id_demandante', 5)->exists();

        return $inscrito;
    }

    public function mostrarOferta($ofertaId): View
    {
        list($oferta, $inscripciones) = $this->buscaOfertaEInscritos($ofertaId);

        $oferta->load('seleccionador.empresa');

        return view('gestionar.ofertas.descripcion', compact('oferta', 'inscripciones'), ['inscrito' => $this->usuarioInscrito($ofertaId)]);
    }

    public function anhadirEstadoInscrito($idDemandante, $ofertaId): void
    {
        Estado::create([
            'nombre' => 'Inscrito',
            'descripcion' => '',
            'id_demandante' => $idDemandante,
            'id_oferta' => $ofertaId
        ]);
    }

    public function realizarInscripcion($ofertaId): RedirectResponse
    {
        list($oferta, $inscripciones) = $this->buscaOfertaEInscritos($ofertaId);

        $inscripcion = Inscripcion::create([
            'id_demandante' => 5,
            'id_oferta' => $ofertaId,
            'anotacion' => "",
        ]);

        $this->anhadirEstadoInscrito(5, $ofertaId);

        return redirect()->route('gestionar.ofertas.descripcion', $ofertaId)
                ->with(compact('oferta', 'inscripciones'))
                ->with(['inscrito' => true]);
    }
}
