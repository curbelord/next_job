<?php

namespace App\Http\Controllers;
use App\Models\Oferta;
use Illuminate\Http\Request;

class OfertasController extends Controller
{
    public function mostrar()
    {

        $ofertas = Oferta::all();


        // compact('ofertas') es lo mismo que ['ofertas' => $ofertas]

        return view('ofertas', compact('ofertas'));
    }
}
