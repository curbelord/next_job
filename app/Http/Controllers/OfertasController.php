<?php

namespace App\Http\Controllers;
use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function mostrar()
    {

        $ofertas = Oferta::all();

        if ($ubicacion = request('provincia')) {
            $ofertas = Oferta::where('ubicacion', $ubicacion)->get();
        }

        return view('ofertas', compact('ofertas'));
    }
}
