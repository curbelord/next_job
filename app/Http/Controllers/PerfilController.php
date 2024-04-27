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
            $usuario = User::find(Auth::id());
            $checkin = $demandante->checkin;

            $cv = CV::where('id_demandante', Auth::id())->first(); 
            $estudios = Estudios::where('id_cv', $cv->id)->get();
            $experiencia = Experiencia::where('id_cv', $cv->id)->get();

            return view('perfil.ver_demandante', compact('checkin', 'usuario', 'cv', 'estudios', 'experiencia'));
        } else {

            $seleccionador = Seleccionador::find(Auth::id());
            $usuario = User::find(Auth::id());

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

    public function eliminarExperiencia(string $id_cv, string $id, Request $request): RedirectResponse
    {
        $experiencia = Experiencia::where('id_cv', $id_cv)
                                    ->where('id_experiencia', $id)
                                    ->first();

        if ($experiencia) {
            Experiencia::where('id_cv', $id_cv)
                         ->where('id_experiencia', $id)
                         ->delete();

            $request->session()->flash('mensajeExperienciaEliminada', 'Se ha eliminado la experiencia correctamente.');
        }

        return redirect()->route('perfil.ver_demandante');
    }

    public function eliminarEstudios(string $id_cv, string $id, Request $request): RedirectResponse
    {
        $estudio = Estudios::where('id_cv', $id_cv)
                            ->where('id_estudio', $id)
                            ->first();

        if ($estudio) {
            Estudios::where('id_cv', $id_cv)
                      ->where('id_estudio', $id)
                      ->delete();
            $request->session()->flash('mensajeFormacionEliminada', 'Se ha eliminado la formación correctamente.');
        }

        return redirect()->route('perfil.ver_demandante');
    }

    public function verExperiencia(string $id_cv, string $id): View
    {

        $cv = CV::where('id', $id_cv)->first();

        $exp = Experiencia::where('id_cv', $id_cv)
                                    ->where('id_experiencia', $id)
                                    ->first();

        return view('perfil.editar.experiencia_laboral', compact('exp', 'cv'));
    }

    public function verEstudios(string $id_cv, string $id): View
    {

        $cv = CV::where('id', $id_cv)->first();

        $est = Estudios::where('id_cv', $id_cv)
                            ->where('id_estudio', $id)
                            ->first();

        return view('perfil.editar.formacion', compact('est', 'cv'));
    }

    public function editarExperiencia(string $id_cv, string $id, Request $request): RedirectResponse
    {

        $experiencia = Experiencia::where('id_cv', $id_cv)
                                    ->where('id_experiencia', $id)
                                    ->first();

        if ($experiencia) {
            $experiencia->centro_laboral = $request->centro_laboral;
            $experiencia->nombre = $request->nombre;
            $experiencia->descripcion = $request->descripcion;
            $experiencia->fecha_inicio = $request->fecha_inicio;
            $experiencia->fecha_fin = $request->fecha_fin;
            $experiencia->save();
        }

        return redirect()->route('perfil.ver_demandante');
    }

    public function editarEstudios(string $id_cv, string $id, Request $request): RedirectResponse
    {

        $estudio = Estudios::where('id_cv', $id_cv)
                            ->where('id_estudio', $id)
                            ->first();
        
        if ($estudio) {
            $estudio->nombre = $request->nombre;
            $estudio->centro_estudios = $request->centro_estudios;
            $estudio->fecha_inicio = $request->fecha_inicio;
            $estudio->fecha_fin = $request->fecha_fin;
            $estudio->save();
        }

        return redirect()->route('perfil.ver_demandante');
    }
}
