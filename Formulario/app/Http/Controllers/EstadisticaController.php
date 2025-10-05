<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respuesta;

class EstadisticaController extends Controller
{
    public function estadisticas()
    {
        // Datos generales
        $respuestas = Respuesta::all();

        // Carreras
        $carreras = [
            'Ing. En Computación',
            'Ing. En Diseño',
            'Ing. Química',
            'Ing. Industrial',
            'Ing. En Energía Renovables',
            'Lic. En Matemáticas Aplicadas'
        ];

        // Estadísticas generales
        $sexoStats = $this->obtenerEstadistica('sexo');
        $trabajoStats = $this->obtenerEstadistica('trabaja');
        $discapacidadStats = $this->obtenerEstadistica('discapacidad');
        $carreraStats = $this->obtenerEstadistica('carrera');

        // Estadísticas por carrera
        $estadisticasPorCarrera = $this->obtenerEstadisticasPorCarrera($carreras);
        //dd($estadisticasPorCarrera);
        return view('estadisticas', compact(
            'respuestas',
            'sexoStats',
            'trabajoStats',
            'discapacidadStats',
            'carreraStats',
            'estadisticasPorCarrera'
        ));
    }

    private function obtenerEstadistica($campo)
    {
        return Respuesta::selectRaw("$campo, COUNT(*) as total")
            ->groupBy($campo)
            ->pluck('total', $campo);
    }

    private function obtenerEstadisticasPorCarrera($carreras)
    {
        $datos = [];

        foreach ($carreras as $carrera) {
            $datos[$carrera] = [
                'total' => Respuesta::where('carrera', $carrera)->count(),
                'sexo' => Respuesta::where('carrera', $carrera)
                    ->selectRaw('sexo, COUNT(*) as total')
                    ->groupBy('sexo')
                    ->pluck('total', 'sexo'),
                'trabaja' => Respuesta::where('carrera', $carrera)
                    ->selectRaw('trabaja, COUNT(*) as total')
                    ->groupBy('trabaja')
                    ->pluck('total', 'trabaja'),
                'discapacidad' => Respuesta::where('carrera', $carrera)
                    ->selectRaw('discapacidad, COUNT(*) as total')
                    ->groupBy('discapacidad')
                    ->pluck('total', 'discapacidad'),
            ];
        }

        return $datos;
    }
}
