<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VueController extends Controller
{
    public function principal(): View
    {
        $id = Auth::id();
        return view('vue.principal_procesos', compact('id'));
    }

    public function gestionarOfertas(): View
    {
        $id = Auth::id();
        return view('vue.gestionar_ofertas', compact('id'));
    }

    public function gestionarAutocandidatura(): View
    {
        $id = Auth::id();
        return view('vue.gestionar_autocandidatura', compact('id'));
    }
}
