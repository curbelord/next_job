<?php

namespace App\Http\Controllers;
use App\Models\Oferta;
use App\Models\Seleccionador;
use App\Models\Empresa;
use App\Models\Inscripcion;

use Illuminate\Http\Request;

class GestionPlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    { 
        return view('gestionar.plantillas.crear_plantilla');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $plantilla = Oferta::find($id);
        return view('gestionar.plantillas.crear_plantilla');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
