<?php

use App\Http\Controllers\CandidaturasController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

use App\Http\Middleware\CheckSeleccionadorRole;
use App\Http\Middleware\CheckDemandanteRole;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GestionOfertaController;
use App\Http\Controllers\GestionPlantillaController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\EmpresaBuscadaController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\VueController;
use App\Models\Inscripcion;
use App\Models\Oferta;
use Illuminate\Support\Facades\Route;




// VISTAS DE EMPRESA

Route::middleware(['auth', CheckSeleccionadorRole::class])->group(function () {
    Route::get('/gestionar', [VueController::class, 'principal'])->name('vue.principal_procesos');
    Route::get('/gestionar/procesos', [VueController::class, 'gestionarOfertas'])->name('vue.gestionar_ofertas');
    Route::get('/gestionar/autocandidatura', [VueController::class, 'gestionarAutocandidatura'])->name('vue.gestionar_autocandidatura');
});


// VISTAS GLOBALES

Route::get('/', [HomeController::class, 'index'])->name('principal');

Route::get('/registro', [RegistroController::class, 'index'])->name('auth.registro');
Route::get('/inicio-de-sesion', [LoginController::class, 'index'])->name('auth.incio_de_sesion');

Route::get('/ofertas', [OfertasController::class, 'mostrar'])->name('ofertas.ofertas');

Route::get('/empresas', [EmpresasController::class, 'mostrar'])->name('empresas');
Route::get('/empresas-encontradas', [EmpresasController::class, 'mostrarEmpresasCoincidentes'])->name('empresas_coincidentes');
Route::get('/empresa/{id}', [EmpresasController::class, 'mostrarEmpresa'])->name('empresa_buscada');

Route::middleware('auth')->group(function () {
    
    Route::get('/perfil/ver', [PerfilController::class, 'mostrar'])->name('perfil.ver_demandante');
    Route::get('/perfil/editar/{id}', [PerfilController::class, 'ver'])->name('perfil.editar_demandante.ver');
    Route::post('/perfil/editar/{id}', [PerfilController::class, 'editar'])->name('perfil.editar_demandante');

});


// VISTAS DEL DEMANDANTE

Route::middleware(['auth', CheckDemandanteRole::class])->group(function () {

    // Proteger las rutas de demandante para que sólo puedan acceder los demandantes

    Route::get('/candidaturas', [CandidaturasController::class, 'mostrarCandidaturas'])->name('candidaturas');
    Route::get('/candidatura/{id}', [CandidaturasController::class, 'mostrarCandidatura'])->name('candidatura');
   
    Route::delete('/eliminar-experiencia/{id_cv}/{id}', [PerfilController::class, 'eliminarExperiencia'])->name('perfil.ver_demandante.eliminar_experiencia');
    Route::delete('/eliminar-estudios/{id_cv}/{id}', [PerfilController::class, 'eliminarEstudios'])->name('perfil.ver_demandante.eliminar_estudios');

    Route::get('/perfil/editar/experiencia-laboral/{id_cv}/{id}', [PerfilController::class, 'verExperiencia'])->name('perfil.editar.experiencia_laboral.ver');
    Route::get('/perfil/editar/formacion/{id_cv}/{id}', [PerfilController::class, 'verEstudios'])->name('perfil.editar.formacion.ver');

    Route::post('/perfil/editar/experiencia-laboral/{id_cv}/{id}', [PerfilController::class, 'editarExperiencia'])->name('perfil.editar.experiencia_laboral');
    Route::post('/perfil/editar/formacion/{id_cv}/{id}', [PerfilController::class, 'editarEstudios'])->name('perfil.editar.formacion');

    Route::get('/perfil/crear/experiencia-laboral/', [PerfilController::class, 'mostrarExperiencia'])->name('perfil.crear.experiencia_laboral.ver');
    Route::get('/perfil/crear/formacion/', [PerfilController::class, 'mostrarEstudios'])->name('perfil.crear.formacion.ver');

    Route::post('/perfil/crear/experiencia-laboral/', [PerfilController::class, 'crearExperiencia'])->name('perfil.crear.experiencia_laboral');
    Route::post('/perfil/crear/formacion/', [PerfilController::class, 'crearEstudios'])->name('perfil.crear.formacion');

    Route::put('/perfil/checkin', [PerfilController::class, 'checkin'])->name('perfil.checkin');

    Route::get('/oferta/{id}', [OfertasController::class, 'mostrarOferta'])->name('ofertas.descripcion');

    Route::post('/inscripcion/{oferta}', [OfertasController::class, 'realizarInscripcion'])->name('ofertas.inscripcion');

});


// VISTAS DEL SELECCIONADOR

    // Proteger las rutas de seleccionador para que sólo puedan acceder los seleccionadores

    Route::middleware(['auth', CheckSeleccionadorRole::class])->group(function () {

        Route::get('/registrar-empresa', [RegistroController::class, 'mostrar_registrar_empresa'])->name('auth.registrar_empresa');
        Route::post('/registrar-empresa/store', [RegistroController::class, 'registrar_empresa'])->name('auth.registrar_empresa.almacenar');
        Route::get('/vincular-empresa', [RegistroController::class, 'mostrar_vincular_empresa'])->name('auth.vincular_empresa');
        Route::post('/vincular-empresa/store', [RegistroController::class, 'vincular_empresa'])->name('auth.vincular_empresa.almacenar');
    });

require __DIR__.'/auth.php';
