<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestionOfertaController;
use App\Http\Controllers\GestionPlantillaController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EmpresaBuscadaController;
use App\Models\Inscripcion;
use App\Models\Oferta;
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

Route::get('/empresa', [EmpresasController::class, 'mostrarEmpresa'])->name('empresa-buscada');


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

    Route::get('/', [GestionOfertaController::class, 'index'])->name('gestionar');

    Route::prefix('ofertas')->group(function () {

        Route::get('/crear', [GestionOfertaController::class, 'create'])->name('crear_oferta');
        Route::get('/editar', [GestionOfertaController::class, 'edit'])->name('editar_oferta');
        Route::post('/store', [OfertasController::class, 'store'])->name('ofertas.almacenar');

    });

    Route::prefix('plantillas')->group(function () {

        Route::get('/crear', [GestionOfertaController::class, 'create'])->name('crear_plantilla');
        Route::get('/editar', [GestionOfertaController::class, 'edit'])->name('editar_plantilla');

    });

});

Route::get('/info-proceso', function (){
    return view('process_info');

});

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
