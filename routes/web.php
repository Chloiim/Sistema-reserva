<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Taller\TallerController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Cliente
Route:: middleware('auth')->prefix('cliente')->group(function () {
    Route::get('/buscarTalleres', [ClienteController:: class, 'buscarTalleres']);
    Route::get('/perfilTaller', [ClienteController:: class, 'perfilTaller']);
    Route::get('/reservar', [ClienteController:: class, 'reservar']);
    Route::get('/misReservas', [ClienteController:: class, 'misReservas']);
});
// Route::get('cliente/buscarTalleres', function () {
//     return view('cliente/buscarTalleres');
// });
// Route::get('cliente/misReservas', function () {
//     return view('cliente/misReservas');
// });
// Route ::get('cliente/perfilTaller', function () {
//     return view('cliente/perfilTaller');
// });
// Route ::get('cliente/reservar', function () {
//     return view('cliente/reservar');
// });
// Taller
Route::middleware('auth')->prefix('taller')->group(function () {
    Route::get('/dashboardTaller', [TallerController::class, 'dashboard']);
    Route::get('/configurarHorarios', [TallerController::class, 'configurarHorarios']);
    Route::get('/servicio', [TallerController::class, 'servicios']);
    Route::get('/reservas', [TallerController::class, 'reservas']);
});
// Route::get('taller/configurarHorarios', function () {
//     return view('taller/configurarHorarios');
// });
// Route::get('taller/dashboardTaller', function () {
//     return view('taller/dashboardTaller');
// });
// Route::get('taller/reservas', function () {
//     return view('taller/reservas');
// });
// Route::get('taller/servicio', function () {
//     return view('taller/servicio');
// });