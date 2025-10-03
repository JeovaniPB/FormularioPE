<?php

use App\Http\Controllers\EstadisticaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RespuestaController;


Route::get('/Formulario', [RespuestaController::class,'create'])->name('formulario.create');
Route::post('/Formulario', [RespuestaController::class,'store'])->name('formulario.store');
Route::get('/Estadisticas', [EstadisticaController::class, 'estadisticas'])->name('estadisticas');
Route::get('/Login', function () {
    return view('Login');
});
