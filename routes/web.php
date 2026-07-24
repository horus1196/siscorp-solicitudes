<?php

use App\Http\Controllers\AutorizacionController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\UnidadAdministrativaController;
use App\Http\Controllers\SolicitudController;
use App\Models\Control;
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


Route::controller(SolicitudController::class)->group(function () {

    Route::get('/solicitud', 'index')->name('solicitud.index');

    Route::post('/solicitud/procesar', 'generarSolicitud')->name('solicitud.procesar');

    Route::get("/solicitud/descargar/{solicitudId}","descargarSolicitud")->name("solicitud.descargar");
});

Route::prefix('api')->group(function () {

    Route::controller(UnidadAdministrativaController::class)->group(function () {
        Route::get('/unidades-administrativas/activas', 'activeRecords')->name('api.unidades.administrativas.activas');
    });

    Route::controller(CargoController::class)->group(function () {
        Route::get('/cargos/activos', 'activeRecords')->name('api.cargos.activos');
    });

    Route::controller(ControlController::class)->group(function () {
        Route::get('/control-transporte/activos', 'activeRecords')->name('api.control.transporte.activos');
    });

    Route::controller(AutorizacionController::class)->group(function () {
        Route::post('/autorizacion-unidad-administrativa', 'autorizacionesPorUnidadAdministrativa')->name('api.autorizacion.unidad.administrativa');
    });
});
