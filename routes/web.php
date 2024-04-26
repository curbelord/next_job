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
use App\Http\Controllers\PerfilController;
use App\Models\Inscripcion;
use App\Models\Oferta;
use Illuminate\Support\Facades\Route;




// VISTAS DE PRUEBA

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

    Route::delete('/eliminar-experiencia/{id_cv}/{id}', [PerfilController::class, 'eliminarExperiencia'])->name('perfil.ver_demandante.eliminar_experiencia');
    Route::delete('/eliminar-estudios/{id_cv}/{id}', [PerfilController::class, 'eliminarEstudios'])->name('perfil.ver_demandante.eliminar_estudios');

    Route::get('/perfil/ver', [PerfilController::class, 'mostrar'])->name('perfil.ver_demandante');

    Route::put('/perfil/checkin', [PerfilController::class, 'checkin'])->name('perfil.checkin');

    Route::get('/perfil/editar', [PerfilController::class, 'editar'])->name('perfil.editar_demandante');

    Route::post('/perfil/actualizar', [PerfilController::class, 'actualizar'])->name('perfil.actualizar');

    Route::get('/perfil/editar/experiencia-laboral', function (){
        return view('perfil.editar.experiencia_laboral');
    });
    Route::get('/perfil/editar/formacion', function (){
        return view('perfil.editar.formacion');
    });

// });




// VISTAS DEL DEMANDANTE

Route::middleware('auth')->group(function () {

    Route::get('/candidaturas', [CandidaturasController::class, 'mostrarCandidaturas'])->name('candidaturas');
    Route::get('/candidatura/{id}', [CandidaturasController::class, 'mostrarCandidatura'])->name('candidatura');

});

Route::get('/ofertas', [OfertasController::class, 'mostrar'])->name('ofertas.ofertas');
Route::get('/oferta/{id}', [OfertasController::class, 'mostrarOferta'])->name('ofertas.descripcion');

// INSCRIPCIÓN EN LA OFERTA
Route::post('/inscripcion/{oferta}', [OfertasController::class, 'realizarInscripcion'])->name('ofertas.inscripcion');

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
    });

require __DIR__.'/auth.php';
