<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Seleccionador;
use Illuminate\Support\Facades\Hash;



class RegistroController extends Controller
{
    public function index()
    {
        return view('auth.registro');
    }

    public function mostrar_registrar_empresa()
    {
        return view('auth.registrar_empresa');
    }

    public function registrar_empresa(Request $request)
    {
        /*
        $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'descripcion' => ['required', 'string', 'max:255'],
            'ubicacion' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        */

        $empresa = new Empresa;
        $empresa->nombre = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        $empresa->ubicacion = $request->ubicacion_sede;
        $empresa->logo = 'img'; // $request->subir_archivo;
        $empresa->password = Hash::make($request->clave_acceso);
        $empresa->save();


        $seleccionador = Seleccionador::find($request->user()->id);
        $seleccionador->id_empresa = $empresa->id;
        $seleccionador->save();

        // $request->user()->assignRole('seleccionador'); TÉCNICAMENTE NO ES NECESARIO, YA QUE EL USUARIO YA TIENE EL ROL DE SELECCIONADOR

        // return redirect(RouteServiceProvider::HOME);

        return view('auth.registrar_empresa');
    }

    public function mostrar_vincular_empresa()
    {
        return view('auth.vincular_empresa');
    }

    public function vincular_empresa(Request $request)
    {

        $empresa = Empresa::find($request->id_empresa);
        
        if (Hash::check($request->clave_acceso, $empresa->password)) {
            $seleccionador = Seleccionador::find($request->user()->id);
            $seleccionador->id_empresa = $empresa->id;
            $seleccionador->save();
        } else {
            return redirect('/'); // CONTRASEÑA INCORRECTA
        }

        /*
        if ($empresas->count() > 0) {
            return redirect(RouteServiceProvider::HOME); // MENSAJE --> NO SE HA ENCONTRADO NINGUNA EMPRESA PARA VINCULAR
        } else {
            return view('auth.vincular_empresa', compact('empresas')); // MENSAJE --> SE HA ENCONTRADO UNA EMPRESA PARA VINCULAR
        }
        */

        return view('auth.vincular_empresa');
    }

    public function rellenar_cv()
    {
        return view('auth.rellenar_cv');
    }
}
