<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'correo',
        'nombre',
        'sexo',
        'edad',
        'carrera',
        'semestre',
        'estatura',
        'peso',
        'promedio',
        'traslado',
        'trabaja',
        'gasto',
        'discapacidad',
    ];
}
