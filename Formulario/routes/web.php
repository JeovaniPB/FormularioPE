<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Formulario');
});

Route::get('/Login', function () {
    return view('Login');
});
