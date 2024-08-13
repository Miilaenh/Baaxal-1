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
        Schema::create('torneos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 512); // Aumento de la longitud a 512 caracteres
            $table->text('descripcion')->nullable(); // Cambiado a tipo text para mayores longitudes
            $table->string('logo')->nullable();
            $table->string('fecha_inicio', 512); // Aumento de la longitud a 512 caracteres
            $table->string('fecha_fin', 512); // Aumento de la longitud a 512 caracteres
            $table->string('ubicacion', 512); // Aumento de la longitud a 512 caracteres
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('user_id'); // Agregar campo para el ID del usuario
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade'); // Definir la relación
            $table->boolean('privado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('torneos');
    }
};
