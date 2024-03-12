<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function index()
    {
        return view('auth.registro');
    }

    public function registrar_empresa()
    {
        return view('auth.registrar_empresa');
    }

    public function vincula_empresa()
    {
        return view('auth.vincular_empresa');
    }

    public function rellenar_cv()
    {
        return view('auth.rellenar_cv');
    }
}
