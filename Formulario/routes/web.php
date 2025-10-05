<?php

use App\Http\Controllers\EstadisticaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RespuestaController;

//BUG DE INICIO
Route::get('/', function () {
    return redirect('/Formulario');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/Formulario', [RespuestaController::class,'create'])->name('formulario.create');
Route::post('/Formulario', [RespuestaController::class,'store'])->name('formulario.store');

Route::middleware(['auth'])->group(function () { //Ruta admin protegida
    Route::get('/Perfil', function () {
        return view('perfil');
    })->name('perfil');
    Route::get('/Estadisticas', [EstadisticaController::class, 'estadisticas'])->name('estadisticas');
});
