<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respuesta;
class EstadisticaController extends Controller
{
    public function estadisticas()
    {
        $respuestas = Respuesta::all();
        //dd($respuestas);
        return view('estadisticas', compact('respuestas'));
    }
}
