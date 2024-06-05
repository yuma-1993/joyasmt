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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('login')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('genero');
            $table->string('telefono')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
            $table->string('municipio')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('rol')->default('usuario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
