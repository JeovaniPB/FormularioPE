<?php

namespace App\Http\Controllers;

use App\Models\Respuesta;
use Illuminate\Http\Request;

class RespuestaController extends Controller
{
    // Mostrar formulario
    public function create()
    {
        return view('formulario'); 
    }

    // Guardar los datos del formulario
    public function store(Request $request)
    {
        //dd($request->all());
        // Validación básica 
        $request->validate([
            'correo' => 'required|email|unique:respuestas,correo',
            'nombre' => 'required|string|max:255',
            'sexo' => 'required|string',
            'edad' => 'required|integer',
            'carrera' => 'required|string',
            'semestre' => 'required|integer',
            'estatura' => 'required|integer',
            'peso' => 'required|integer',
            'promedio' => 'required|numeric',
            'traslado' => 'required|integer',
            'trabaja' => 'required|boolean',
            'gasto' => 'required|integer',
            'discapacidad' => 'required|boolean',
        ]);

        // Guardar en la DB
        Respuesta::create($request->all());

        // Redirigir con mensaje de éxito
        return back()->with('success', 'Formulario enviado correctamente');
    }
}
