<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShipmentsController;
use App\Http\Controllers\ShipsController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\PortsController;
use App\Http\Controllers\CrewController;
use App\Http\Controllers\ClientsController;

Route::get('/', function () {
    return view('shipments.index');
});


Route::resource('shipments',ShipmentsController::class);
Route::resource('Ships', ShipsController::class);
Route::resource('cargos', CargoController::class);
Route::resource('ports', PortsController::class);
Route::resource('crews', CrewController::class);
Route::resource('clients', ClientsController::class);