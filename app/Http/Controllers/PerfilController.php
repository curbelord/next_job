<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Demandante;
use App\Models\Seleccionador;
use App\Models\Empresa;
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

            if ($cv == null) {
                return view('perfil.ver_demandante', compact('usuario', 'checkin'));
            }

            $estudios = Estudios::where('id_cv', $cv->id)->get();

            if ($estudios->isEmpty()) {
                $estudios = null;
            }

            $experiencia = Experiencia::where('id_cv', $cv->id)->get();

            if ($experiencia->isEmpty()) {
                $experiencia = null;
            }

            return view('perfil.ver_demandante', compact('checkin', 'usuario', 'cv', 'estudios', 'experiencia'));
        } else {

            $seleccionador = Seleccionador::find(Auth::id());

            if ($seleccionador->id_empresa == null) {
                return view('perfil.ver_demandante', compact('usuario', 'seleccionador'));
            } else {
                $empresa = Empresa::where('id', $seleccionador->id_empresa)->first();
                return view('perfil.ver_demandante', compact('usuario', 'seleccionador', 'empresa'));
            }

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

    public function eliminarExperiencia(string $id_cv, string $id)
    {
        $experiencia = Experiencia::where('id_cv', $id_cv)
                                    ->where('id_experiencia', $id)
                                    ->first();

        if ($experiencia) {
            Experiencia::where('id_cv', $id_cv)
                         ->where('id_experiencia', $id)
                         ->delete();
        }

        return redirect()->route('perfil.ver_demandante');
    }

    public function eliminarEstudios(string $id_cv, string $id)
    {
        $estudio = Estudios::where('id_cv', $id_cv)
                            ->where('id_estudio', $id)
                            ->first();

        if ($estudio) {
            Estudios::where('id_cv', $id_cv)
                      ->where('id_estudio', $id)
                      ->delete();
        }

        return redirect()->route('perfil.ver_demandante');
    }
}
