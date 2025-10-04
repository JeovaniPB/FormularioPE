<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('respuestas', function (Blueprint $table) {
        $table->id();
        $table->string('correo')->unique();
        $table->string('nombre');
        $table->string('sexo');
        $table->integer('edad');
        $table->string('carrera');
        $table->integer('semestre');
        $table->integer('estatura');
        $table->integer('peso');
        $table->float('promedio');
        $table->integer('traslado');
        $table->boolean('trabaja');
        $table->integer('gasto');
        $table->boolean('discapacidad');
        $table->float('altura');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuestas');
    }
};
