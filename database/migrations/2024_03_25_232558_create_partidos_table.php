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
        Schema::create('partidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('torneo_id')->nullable();
            $table->foreign('torneo_id')->references('id')->on('torneos');
            $table->time('inicio');
            $table->time('fin');
            $table->timestamp('fecha');
            $table->unsignedBigInteger('equipo_local_id');
            $table->foreign('equipo_local_id')->references('id')->on('equipos');
            $table->unsignedBigInteger('equipo_visitante_id');
            $table->foreign('equipo_visitante_id')->references('id')->on('equipos');

            // Agregar campo arbitro_id
            $table->unsignedBigInteger('arbitro_id')->nullable();
            $table->foreign('arbitro_id')->references('id')->on('arbitros');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partidos');
    }
};
