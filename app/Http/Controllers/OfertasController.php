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

        $fecha_publicacion = "";
        $tipo_trabajo = "";
        $sector = "";
        $jornada = "";
        $experiencia_minima = 0;

        $ofertas = Oferta::query();
        $offset = 0;

        if (request('pagina')){
            $offset = (intval(request('pagina')) * 10) - 10;
        }

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

        if (request('fecha_publicacion')){
            switch (request('fecha_publicacion')) {
                case "Cualquier fecha":
                    $fecha_publicacion = "Cualquier fecha";
                    break;
                case "Últimas 24 horas":
                    $fecha_publicacion = "Últimas 24 horas";
                    $ofertas->where('created_at', '>=', now()->subDay());
                    break;
                case "Últimos 3 días":
                    $fecha_publicacion = "Últimos 3 días";
                    $ofertas->where('created_at', '>=', now()->subDays(3));
                    break;
                case "Últimos 7 días":
                    $fecha_publicacion = "Últimos 7 días";
                    $ofertas->where('created_at', '>=', now()->subDays(7));
                    break;
            }
        }

        if (request('presencial')){
            $tipo_trabajo .= "Presencial";
            $ofertas->orWhere('tipo_trabajo', 'Presencial');
        }

        if (request('no_presencial')){
            $tipo_trabajo .= "No presencial";
            $ofertas->orWhere('tipo_trabajo', 'No presencial');
        }

        if (request('mixto')){
            $tipo_trabajo .= "Mixto";
            $ofertas->orWhere('tipo_trabajo', 'Mixto');
        }


        if (request('sector')){
            $sector = request('sector');
            $ofertas->where('sector', $sector);
        }


        if (request('completa')){
            $jornada .= "Completa";
            $ofertas->orWhere('jornada', 'Completa');
        }

        if (request('parcial')){
            $jornada .= "Parcial";
            $ofertas->orWhere('jornada', 'Parcial');
        }


        if (request('experiencia')){
            $experiencia_minima = intval(request('experiencia'));
            $ofertas->where('experiencia_minima', '<=', $experiencia_minima);
        } elseif (request('experiencia') === '0') {
            $ofertas->where('experiencia_minima', 0);
        }

        $ofertas->where('estado', 'Publicada');

        $cantidadTotalOfertas = $ofertas->count();
        $ofertas->limit(10)->offset($offset);
        $ofertas = $ofertas->get();

        $ofertas->load('seleccionador.empresa');

        return view('ofertas.ofertas', compact('ofertas', 'cantidadTotalOfertas', 'ubicacion', 'buscador', 'fecha_publicacion', 'tipo_trabajo', 'sector', 'jornada', 'experiencia_minima'));
    }

    public function buscaOfertaEInscritos($ofertaId): array
    {
        $oferta = Oferta::find($ofertaId);
        $inscripciones = Inscripcion::where('id_oferta', $ofertaId)->count();

        return [$oferta, $inscripciones];
    }

    public function usuarioInscrito($ofertaId): bool
    {
        $inscrito = Inscripcion::where('id_oferta', $ofertaId)->where('id_demandante', Auth::id())->exists();

        return $inscrito;
    }

    public function mostrarOferta(string $ofertaId): View
    {
        list($oferta, $inscripciones) = $this->buscaOfertaEInscritos($ofertaId);

        $oferta->load('seleccionador.empresa');

        return view('ofertas.descripcion', compact('oferta', 'inscripciones'), ['inscrito' => $this->usuarioInscrito($ofertaId)]);
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
        if (Auth::check()){
            list($oferta, $inscripciones) = $this->buscaOfertaEInscritos($ofertaId);

            $inscripcion = Inscripcion::create([
                'id_demandante' => Auth::id(),
                'id_oferta' => $ofertaId,
                'anotacion' => "",
            ]);

            $this->anhadirEstadoInscrito(Auth::id(), $ofertaId);

            return redirect()->route('ofertas.descripcion', $ofertaId)
                    ->with(compact('oferta', 'inscripciones'))
                    ->with(['inscrito' => true]);
        }else{
            return redirect('/login');
        }
    }
}
