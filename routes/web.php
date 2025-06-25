<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cliente
Route::get('cliente/buscarTalleres', function () {
    return view('cliente/buscarTalleres');
});
Route::get('cliente/misReservas', function () {
    return view('cliente/misReservas');
});
Route ::get('cliente/perfilTaller', function () {
    return view('cliente/perfilTaller');
});
Route ::get('cliente/reservar', function () {
    return view('cliente/reservar');
});
// Taller
Route::get('taller/configurarHorarios', function () {
    return view('taller/configurarHorarios');
});
Route::get('taller/dashboardTaller', function () {
    return view('taller/dashboardTaller');
});
Route::get('taller/reservas', function () {
    return view('taller/reservas');
});
Route::get('taller/servicio', function () {
    return view('taller/servicio');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
