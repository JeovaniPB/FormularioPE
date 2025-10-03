<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RespuestaController;


Route::get('/Formulario', [RespuestaController::class,'create'])->name('formulario.create');
Route::post('/Formulario', [RespuestaController::class,'store'])->name('formulario.store');

Route::get('/Login', function () {
    return view('Login');
});
