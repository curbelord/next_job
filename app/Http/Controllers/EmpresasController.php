<?php

namespace App\Http\Controllers;
use App\Models\Empresa;
use App\Models\Seleccionador;
use App\Models\Oferta;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class EmpresasController extends Controller
{
    public function mostrar(): View
    {
        return view('empresas');
    }

    public function mostrarEmpresasCoincidentes(Request $request): View
    {
        $filtro = $request->buscador;
        $offset = 0;

        if ($request->pagina) {
            $offset = (intval($request->pagina) * 10) - 10;
        }

        $empresas = Empresa::where('nombre', 'LIKE', '%' . $filtro . '%')
                            ->limit(10)
                            ->offset($offset)
                            ->get();

        $cantidadTotalEmpresas = Empresa::where('nombre', 'LIKE', '%' . $filtro . '%')->count();

        return view('empresas_coincidentes', compact('empresas', 'cantidadTotalEmpresas', 'filtro'));
    }

    public function mostrarEmpresa($idEmpresa): View
    {
        $copiaIdEmpresa = intval($idEmpresa);
        $mensajeIdInvalida = "La ID enviada no es válida";
        $filtro = "";

        if (is_int($copiaIdEmpresa)){
            $empresa = Empresa::where('id', $copiaIdEmpresa)->first();

            if ($empresa == null){
                return view('empresas_coincidentes', compact('mensajeIdInvalida', 'filtro'));
            }else{
                $ofertas = Oferta::all();
                $ofertas = $ofertas->load('seleccionador.empresa');

                $seleccionadores = Seleccionador::where('id_empresa', $copiaIdEmpresa)->get();

                $ofertas_empresa = Oferta::whereIn('id_seleccionador', $seleccionadores->pluck('id'))->limit(5)->orderBy('created_at', 'DESC')->get();

                $empresa->ofertas = $ofertas_empresa;

                return view('empresa_buscada', compact('empresa'));
            }
        }else{
            return view('empresas_coincidentes', compact('mensajeIdInvalida', 'filtro'));
        }
    }
}
