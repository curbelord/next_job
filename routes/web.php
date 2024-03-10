<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EmpresaBuscadaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

Route::get('/ofertas', [OfertasController::class, 'mostrar'])->name('ofertas');

Route::get('/descripcion/{parametro}', [OfertasController::class, 'mostrarOferta'])->name('descripcion');

Route::get('/empresas', [EmpresasController::class, 'mostrar'])->name('empresas');

Route::get('/registrar-empresa', function () {
    return view('registrar_empresa');
});

Route::get('/vincular-empresa', function () {
    return view('vincular_empresa');
});

Route::get('/rellenar-cv', function () {
    return view('rellenar_cv');
});

Route::get('/registro', function (){
    return view('registro');
});

Route::get('/inicio-de-sesion', function (){
    return view('inicio_de_sesion');
});

Route::prefix('gestionar')->group(function () {
    
    Route::get('/', function () {
        return view('gestionar');
    });

    /*
    Route::get('/crear-empresa', function (){
        return view('crear_empresa');
    });

    Route::get('/editar-empresa', function (){
        return view('editar_empresa');
    });
    */

    Route::prefix('ofertas')->group(function () {

        Route::get('/', function () {
            return view('gestionar_ofertas');
        });
    
        Route::get('/crear', function (){
            return view('crear_oferta');
        })->name('ofertas.crear');
    
        Route::get('/editar', function () {
            return view('editar_oferta');
        })->name('ofertas.editar');
    
        Route::get('/ver', function () {
            return view('ver_ofertas');
        })->name('ofertas.ver');

    });

    Route::prefix('plantillas')->group(function () {

        Route::get('/', function () {
            return view('gestionar_plantillas');
        });
    
        Route::get('/crear', function (){
            return view('crear_plantilla');
        })->name('plantillas.crear');
    
        Route::get('/editar', function (){
            return view('editar_plantilla');
        })->name('plantillas.editar');

        Route::get('/ver', function () {
            return view('ver_plantillas');
        })->name('plantillas.ver');
    
    });
    
});

Route::get('/info-proceso', function (){
    return view('process_info');

});

Route::get('/empresa-buscada', [EmpresaBuscadaController::class, 'mostrar'])->name('empresa-buscada');

Route::get('/desplegable', function (){
    return view('desplegable');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
