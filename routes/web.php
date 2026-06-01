<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Taller\TallerController;
use App\Http\Controllers\Taller\TallerCrudController;
use App\Http\Controllers\Taller\ServicioController;
use App\Http\Controllers\Cliente\ReservaController;
use App\Http\Controllers\Taller\TallerReservaController;
use App\Http\Controllers\BusquedaTallerController;
use App\Http\Controllers\Taller\PublicoController;
use App\Http\Middleware\VerificarTipoUsuario;
use App\Models\Servicio;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/buscar-talleres', [BusquedaTallerController::class, 'index'])->name('busqueda.resultados');
Route::get('/taller/{id}', [PublicoController::class, 'perfil'])
    ->whereNumber('id')
    ->name('taller.perfil');
// Route::get('/api/taller/{id}/servicios', function ($id) {
//     $servicios = \App\Models\Servicio::where('taller_id', $id)->get();
//     return response()->json($servicios);
// });

// Cliente
Route:: middleware(['auth', VerificarTipoUsuario::class . ':cliente'])->prefix('cliente')->group(function () {
    Route::get('/buscarTalleres', [ClienteController:: class, 'buscarTalleres'])->name('cliente.buscarTalleres');
    Route::get('/perfilTaller/{id}', [ClienteController:: class, 'perfilTaller'])->name('cliente.perfilTaller');
    Route::get('/reservar', [ClienteController:: class, 'reservar']);
    Route::get('/misReservas', [ClienteController:: class, 'misReservas']);
    
});
Route::middleware(['auth', VerificarTipoUsuario::class . ':cliente'])->prefix('cliente')->group(function () {
        Route::resource('/reservas', ReservaController::class);
});




// Taller
Route::middleware(['auth', VerificarTipoUsuario::class . ':taller'])->prefix('taller')->group(function () {
    Route::get('/dashboardTaller', [TallerController::class, 'dashboard'])->name('taller.dashboard');
    Route::get('/perfil', [TallerController::class, 'perfil'])->name('taller.mi-perfil');
    Route::get('/perfil/editar', [TallerController::class, 'editarPerfil'])->name('taller.mi-perfil.edit');
    Route::put('/perfil', [TallerController::class, 'actualizarPerfil'])->name('taller.mi-perfil.update');
    Route::get('/configurarHorarios', [TallerController::class, 'configurarHorarios']);
    Route::get('/servicio', [TallerController::class, 'servicios']);
    //Route::get('/reservas', [TallerController::class, 'reservas']);
    Route::get('/reservas', [TallerReservaController::class, 'index'])->name('taller.reservas.index');
    Route::put('/reservas/{reserva}/estado', [TallerReservaController::class, 'updateEstado'])->name('taller.reservas.estado');
});
Route::middleware(['auth', VerificarTipoUsuario::class . ':taller'])->prefix('taller')->group(function () {
        Route::resource('/crud-talleres', TallerCrudController::class);
        Route::resource('/servicios', ServicioController::class);
});
Route::middleware('auth')->get('/api/taller/{id}/servicios', function ($id) {
    $servicios = \App\Models\Servicio::where('taller_id', $id)->get();
    return response()->json($servicios);
});

