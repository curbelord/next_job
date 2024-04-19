<?php

use App\Http\Controllers\CandidaturasController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Http\Middleware\CheckSeleccionadorRole;

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

Route::get('/vue/principal/procesos', function (){
    return view('vue.principal_procesos');
});

Route::get('/vue/gestionar/autocandidatura', function (){
    return view('vue.gestionar_autocandidatura');
});




// VISTAS GLOBALES

Route::get('/', [HomeController::class, 'index'])->name('principal');

Route::get('/registro', [RegistroController::class, 'index'])->name('auth.registro');
Route::get('/inicio-de-sesion', [LoginController::class, 'index'])->name('auth.incio_de_sesion');

// Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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

    Route::get('/recuperar-contrasena', [LoginController::class, 'recuperar_contrasena'])->name('auth.recuperar_contrasena');
    // AÚN NO ESTÁ IMPLEMENTADA, PERO SERÍA UNA VISTA PARA RECUPERAR LA CONTRASEÑA MEDIANTE EL CORREO ELECTRÓNICO

// });




// VISTAS DEL DEMANDANTE

Route::middleware('auth')->group(function () {

    Route::get('/candidaturas', [CandidaturasController::class, 'mostrarCandidaturas'])->name('candidaturas');
    Route::get('/candidatura/{id}', [CandidaturasController::class, 'mostrarCandidatura'])->name('candidatura');

    Route::get('/rellenar-cv', [RegistroController::class, 'rellenar_cv'])->name('auth.rellenar_cv');

});

Route::get('/ofertas', [OfertasController::class, 'mostrar'])->name('gestionar.ofertas.ofertas');
Route::get('/descripcion/{parametro}', [OfertasController::class, 'mostrarOferta'])->name('gestionar.ofertas.descripcion');

// INSCRIPCIÓN EN LA OFERTA
Route::post('/inscripcion/{oferta}', [OfertasController::class, 'realizarInscripcion'])->name('gestionar.ofertas.inscripcion');

Route::get('/empresas', [EmpresasController::class, 'mostrar'])->name('empresas');
Route::get('/empresas-encontradas', [EmpresasController::class, 'mostrarEmpresasCoincidentes'])->name('empresas_coincidentes');
Route::get('/empresa/{id}', [EmpresasController::class, 'mostrarEmpresa'])->name('empresa_buscada');




// VISTAS DEL SELECCIONADOR


    // Proteger las rutas de seleccionador para que sólo puedan acceder los seleccionadores

    Route::middleware(['auth', CheckSeleccionadorRole::class])->group(function () {

        Route::get('/registrar-empresa', [RegistroController::class, 'mostrar_registrar_empresa'])->name('auth.registrar_empresa');
        Route::post('/registrar-empresa/store', [RegistroController::class, 'registrar_empresa'])->name('auth.registrar_empresa.almacenar');
        Route::get('/vincular-empresa', [RegistroController::class, 'mostrar_vincular_empresa'])->name('auth.vincular_empresa');
        Route::post('/vincular-empresa/store', [RegistroController::class, 'vincular_empresa'])->name('auth.vincular_empresa.almacenar');

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
    });

require __DIR__.'/auth.php';
