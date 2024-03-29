<?php

namespace App\Http\Controllers;
use App\Models\Oferta;
use App\Models\Seleccionador;
use App\Models\Empresa;
use App\Models\Inscripcion;

use Illuminate\Http\Request;

class GestionOfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ofertas = Oferta::query();

        $ofertas->where('id_seleccionador', auth()->user()->id)
                ->where('estado', 'Publicada')
                ->limit(5)->orderBy('created_at', 'desc');

        $ofertas = $ofertas->get();

        $inscripciones = Inscripcion::query();
        $inscripciones->whereIn('id_oferta', $ofertas->pluck('id'));
        $inscripciones = $inscripciones->get();

        return view('gestionar.principal_empresa', compact('ofertas'), compact('inscripciones'));}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gestionar.ofertas.crear_oferta');
    }

    public function store(Request $request){

        if (isset($_POST['publicada'])) {
            $estado = 'publicada';
        } elseif (isset($_POST['plantilla'])) {
            $estado = 'plantilla';
        } else {
            $estado = 'borrador';
        }

        $oferta = new Oferta;
        $oferta->puesto_trabajo = $request->puesto_trabajo;
        $oferta->ubicacion = $request->ubicacion;
        $oferta->tipo_trabajo = $request->tipo_trabajo;
        $oferta->sector = $request->sector;
        $oferta->descripcion = $request->descripcion;
        $oferta->estudios_minimos = $request->estudios_minimos;
        $oferta->experiencia_minima = $request->experiencia_minima;
        $oferta->jornada = $request->jornada;
        $oferta->turno = $request->turno;
        $oferta->numero_vacantes = $request->numero_vacantes;
        $oferta->salario = $request->salario;
        $oferta->fecha_cierre = $request->fecha_cierre;
        $oferta->estado = $estado;
        $oferta->id_seleccionador = auth()->user()->id;
        $oferta->save();

        return redirect()->route('gestionar.principal_empresa');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $oferta = Oferta::find($id);
        return view('gestionar.ofertas.ver_oferta', compact('oferta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $oferta = Oferta::find($id);
        return view('gestionar.ofertas.editar_oferta', compact('oferta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $oferta = Oferta::find($id);
        $oferta->update($request->all());
        return redirect()->route('gestionar.principal_empresa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $oferta = Oferta::find($id);
        $oferta->destroy($id);
        return redirect()->route('gestionar.principal_empresa');
    }

    public function manageOffers()
    {
        $ofertas = Oferta::all();
        $inscripciones = Inscripcion::all();

        return view('gestionar.gestionar_ofertas', compact('ofertas'), compact('inscripciones'));
    }
}
