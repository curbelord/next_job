<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Seleccionador;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;



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

            $request->session()->flash('mensajeVincularEmpresa', 'Se ha vinculado a su empresa correctamente.');

            // return redirect(RouteServiceProvider::HOME);
            return redirect()->route('vue.principal_procesos');

        } else {
            $request->session()->flash('mensajeEmpresaNoVinculada', 'No se ha podido vincular a su empresa.');
        }

    }

}
