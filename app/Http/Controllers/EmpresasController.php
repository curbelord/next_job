<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function mostrar()
    {
        $titulo = 'Busca una empresa';
        $mostrarFiltros = false;
        $mostrarProvincias = false;
        $placeholder_buscador = 'Nombre';

        return view('empresas', compact('titulo', 'mostrarFiltros', 'mostrarProvincias', 'placeholder_buscador'));
    }
}
