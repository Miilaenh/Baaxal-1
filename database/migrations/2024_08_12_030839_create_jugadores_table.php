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
    Schema::create('jugadores', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('apellido_paterno');
        $table->string('apellido_materno');
        $table->unsignedBigInteger('equipo_id');
        $table->foreign('equipo_id')
              ->references('id')
              ->on('equipos')
              ->onDelete('cascade')
              ->onUpdate('cascade');
        $table->string('logo')->nullable(); // Campo para almacenar el logo
        $table->integer('numero_camiseta'); // Campo para el número de camiseta
        $table->string('posicion_juego'); // Campo para la posición de juego
        $table->timestamps();
    });
}
};