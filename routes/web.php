<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OfertasController;
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


Route::get('/empresas', function () {
    return view('empresas');
});

Route::get('/registrar-empresa', function () {
    return view('registrar_empresa');
});

Route::get('/vincular-empresa', function () {
    return view('vincular_empresa');
});

Route::get('/rellenar-cv', function () {
    return view('rellenar_cv');
});

Route::get('/descripcion', function (){
    return view('offer_description');
});

Route::get('/registro', function (){
    return view('registro');
});

Route::get('/inicio-de-sesion', function (){
    return view('inicio_de_sesion');
});

Route::get('/info-proceso', function (){
    return view('process_info');

});

Route::get('/empresa-buscada', function (){
    return view('empresa_buscada');
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
