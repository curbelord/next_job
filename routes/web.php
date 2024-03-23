<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestionOfertaController;
use App\Http\Controllers\GestionPlantillaController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EmpresaBuscadaController;
use App\Models\Inscripcion;
use App\Models\Oferta;
use Illuminate\Support\Facades\Route;




// VISTAS DE PRUEBA

Route::get('/desplegable', function (){
    return view('desplegable');
});

Route::get('/vue/gestionar/procesos', function (){
    return view('vue.gestionar_ofertas');
});




// VISTAS GLOBALES

Route::get('/', [HomeController::class, 'index'])->name('principal');

Route::get('/registro', [RegistroController::class, 'index'])->name('auth.registro');
Route::get('/inicio-de-sesion', [LoginController::class, 'index'])->name('auth.incio_de_sesion');
Route::get('/recuperar-contrasena', [LoginController::class, 'recuperar_contrasena'])->name('auth.recuperar_contrasena');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/perfil/ver', function (){
    return view('perfil.ver_demandante');
});

Route::get('/perfil/editar', function (){
    return view('perfil.editar_demandante');
});

Route::get('/perfil/editar/experiencia-laboral', function (){
    return view('perfil.editar.experiencia_laboral');
});

Route::get('/perfil/editar/formacion', function (){
    return view('perfil.editar.formacion');
});




// VISTAS DEL DEMANDANTE

Route::get('/inscripciones', function () {  //  ESTA VISTA ES NECESARIA, PERO NO ESTÁ IMPLEMENTADA
    return view('inscripciones');           //  VISTA PARA MOSTRAR LAS INSCRIPCIONES DEL DEMANDANTE, SERÍA UNA TABLA CON LAS OFERTAS A LAS QUE SE HA INSCRITO
});                                         //  ES LA PÁGINA PREVIA A INFO-PROCESO YA QUE AL HACER CLICK EN UNA INSCRIPCIÓN SE REDIRIGE A INFO-PROCESO

Route::get('/info-proceso', function (){
    return view('process_info');
});

Route::get('/ofertas', [OfertasController::class, 'mostrar'])->name('gestionar.ofertas.ofertas');
Route::get('/descripcion/{parametro}', [OfertasController::class, 'mostrarOferta'])->name('gestionar.ofertas.descripcion');

Route::get('/empresas', [EmpresasController::class, 'mostrar'])->name('empresas');
Route::get('/empresa', [EmpresasController::class, 'mostrarEmpresa'])->name('empresa_buscada');

Route::get('/rellenar-cv', [RegistroController::class, 'rellenar_cv'])->name('auth.rellenar_cv');




// VISTAS DEL SELECCIONADOR

Route::get('/registrar-empresa', [RegistroController::class, 'registrar_empresa'])->name('auth.registrar_empresa');
Route::get('/vincular-empresa', [RegistroController::class, 'vincula_empresa'])->name('auth.vincular_empresa');

Route::prefix('gestionar')->group(function () {

    Route::get('/', [GestionOfertaController::class, 'index'])->name('gestionar.principal_empresa');

    Route::prefix('ofertas')->group(function () {

        Route::get('/', [GestionOfertaController::class, 'manageOffers'])->name('gestionar.gestionar_ofertas');
        Route::get('/crear', [GestionOfertaController::class, 'create'])->name('gestionar.ofertas.crear_oferta');
        Route::get('/editar/{id}', [GestionOfertaController::class, 'edit'])->name('gestionar.ofertas.editar_oferta');
        Route::put('/update/{id}', [GestionOfertaController::class, 'update'])->name('gestionar.ofertas.actualizar_oferta');
        Route::post('/store', [GestionOfertaController::class, 'store'])->name('gestionar.ofertas.ofertas.almacenar');
        Route::get('/ver/{id}', [GestionOfertaController::class, 'show'])->name('gestionar.ofertas.ver_oferta');
        Route::delete('/delete/{id}', [GestionOfertaController::class, 'destroy'])->name('gestionar.ofertas.eliminar_oferta');

    });

    Route::prefix('plantillas')->group(function () {

        Route::get('/crear', [GestionPlantillaController::class, 'create'])->name('gestionar.plantillas.crear_plantilla');
        Route::get('/editar/{id}', [GestionPlantillaController::class, 'edit'])->name('gestionar.plantillas.editar_plantilla');

    });

});

require __DIR__.'/auth.php';