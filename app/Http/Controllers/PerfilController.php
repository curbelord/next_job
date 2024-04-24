<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demandante;
use App\Models\Estudios;
use App\Models\Experiencia;
use App\Models\CV;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function mostrar(): View
    {
        $usuario = User::find(Auth::id());

        if (Auth::user()->hasRole('demandante')) {
            $demandante = Demandante::find(Auth::id());
            $checkin = $demandante->checkin;

            $cv = CV::where('id_demandante', Auth::id())->first();
            $estudios = Estudios::where('id_cv', $cv->id)->get();
            $experiencia = Experiencia::where('id_cv', $cv->id)->get();

            return view('perfil.ver_demandante', compact('checkin', 'usuario', 'cv', 'estudios', 'experiencia'));
        } else {
            return view('perfil.ver_demandante', compact('usuario'));
        }

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
