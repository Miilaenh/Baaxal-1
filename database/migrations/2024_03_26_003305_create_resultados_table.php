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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('partido_id');
            $table->foreign('partido_id')
                  ->references('id')
                  ->on('partidos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            // Campos para las estadísticas del equipo local
            $table->integer('remates_equipo_local');
            $table->integer('remates_arco_equipo_local');
            $table->float('posesion_equipo_local');
            $table->integer('pases_equipo_local');
            $table->float('precision_pases_equipo_local');
            $table->integer('faltas_equipo_local');
            $table->integer('tarjetas_amarillas_equipo_local');
            $table->integer('tarjetas_rojas_equipo_local');
            $table->integer('posicion_adelantada_equipo_local');
            $table->integer('tiros_esquina_equipo_local');

            // Campos para las estadísticas del equipo visitante
            $table->integer('remates_equipo_visitante');
            $table->integer('remates_arco_equipo_visitante');
            $table->float('posesion_equipo_visitante');
            $table->integer('pases_equipo_visitante');
            $table->float('precision_pases_equipo_visitante');
            $table->integer('faltas_equipo_visitante');
            $table->integer('tarjetas_amarillas_equipo_visitante');
            $table->integer('tarjetas_rojas_equipo_visitante');
            $table->integer('posicion_adelantada_equipo_visitante');
            $table->integer('tiros_esquina_equipo_visitante');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultados');
    }
};
