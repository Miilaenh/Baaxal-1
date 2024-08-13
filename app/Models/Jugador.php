<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores'; // Define la tabla asociada

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'equipo_id',
        'logo',            // Agrega el campo logo
        'numero_camiseta', // Agrega el campo número de camiseta
        'posicion_juego',  // Agrega el campo posición de juego
    ];

    public function equipo()
{
    return $this->belongsTo(Equipo::class);
}
}
