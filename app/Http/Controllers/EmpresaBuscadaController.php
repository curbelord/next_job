<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresaBuscadaController extends Controller
{
    public function mostrar()
    {
        return view('empresa_buscada');
    }
}
