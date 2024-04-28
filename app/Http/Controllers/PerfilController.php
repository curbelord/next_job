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

    public function ver($id): View 
    {
        $usuario = User::find($id);

        return view('perfil.editar_demandante', compact('usuario'));
    }

    public function editar(Request $request): RedirectResponse
    {
        $usuario = User::find(Auth::id());

        $usuario->nombre = request('nombre');
        $usuario->email = request('email');
        $usuario->telefono = request('telefono');
        $usuario->direccion = request('direccion');
        $usuario->save();

        $request->session()->flash('mensajePerfilEditado', 'Se ha editado el perfil correctamente.');

        return redirect()->route('perfil.ver_demandante', compact('usuario'));
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

        $request->session()->flash('mensajeExperienciaEditada', 'Se ha editado la experiencia correctamente.');

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

        $request->session()->flash('mensajeFormacionEditada', 'Se ha editado la formación correctamente.');

        return redirect()->route('perfil.ver_demandante');
    }

    public function crearExperiencia(Request $request): RedirectResponse
    {
        $cv = CV::where('id_demandante', Auth::id())->first();

        if (!$cv) {
            $cv = new CV();
            $cv->id_demandante = Auth::id();
            $cv->save();
        }

        $experiencia = new Experiencia();
        $experiencia->id_cv = $cv->id;
        $experiencia->id_experiencia = Experiencia::where('id_cv', $cv->id)->count() + 1;
        $experiencia->centro_laboral = request('centro_laboral');
        $experiencia->nombre = request('nombre');
        $experiencia->descripcion = request('descripcion');
        $experiencia->fecha_inicio = request('fecha_inicio');
        $experiencia->fecha_fin = request('fecha_fin');
        $experiencia->save();

        $request->session()->flash('mensajeExperienciaCreada', 'Se ha creado la experiencia correctamente.');

        return redirect()->route('perfil.ver_demandante');
    }

    public function crearEstudios(Request $request): RedirectResponse
    {

        $cv = CV::where('id_demandante', Auth::id())->first();

        if (!$cv) {
            $cv = new CV();
            $cv->id_demandante = Auth::id();
            $cv->save();
        }

        $estudio = new Estudios();
        $estudio->id_cv = $cv->id;
        $estudio->id_estudio = Estudios::where('id_cv', $cv->id)->count() + 1;
        $estudio->nombre = request('nombre');
        $estudio->centro_estudios = request('centro_estudios');
        $estudio->fecha_inicio = request('fecha_inicio');
        $estudio->fecha_fin = request('fecha_fin');
        $estudio->save();

        $request->session()->flash('mensajeFormacionCreada', 'Se ha creado la formación correctamente.');

        return redirect()->route('perfil.ver_demandante');
    }

    public function mostrarExperiencia(): View
    {
        return view('perfil.crear.experiencia_laboral');
    }

    public function mostrarEstudios(): View
    {
        return view('perfil.crear.formacion');
    }
}
