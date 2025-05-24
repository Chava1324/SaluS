<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ReservaController;

Route::post('/login', [UsuarioController::class, 'loginApi']);
Route::post('/logout', [UsuarioController::class, 'logoutApi'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/usuarios', [UsuarioController::class, 'indexApi']);
    Route::get('/usuarios/{id}', [UsuarioController::class, 'showApi']);
});


// routes/api.php
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/consultorios', [ConsultorioController::class, 'indexApi']);
    Route::get('/horarios/consultorios/{id}', [HorarioController::class, 'getByConsultorio']);
 });
Route::get('/reservas/{id}', [ReservaController::class, 'porPaciente']);
