<?php

namespace App\Http\Controllers;

use App\Models\Demandante;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function mostrar(): View
    {
        $demandante = Demandante::find(Auth::id());
        $checkin = $demandante->checkin;

        return view('perfil.ver_demandante', compact('checkin'));
    }

    public function editar(): View
    {
        return view('perfil.editar_demandante');
    }

    public function actualizar()
    {

    }

    public function checkin(): RedirectResponse
    {
        $user = Demandante::find(Auth::id());
        $user->checkin = true;
        $user->save();

        return redirect()->route('perfil.ver_demandante');
    }
}
