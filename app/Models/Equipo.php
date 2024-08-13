<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'logo',
        'torneo_id',
        'user_id', // Incluye esto si es necesario
    ];

    // Definir la relación con el modelo Torneo
    public function torneo()
    {
        return $this->belongsTo(Torneo::class, 'torneo_id');
    }

    // Definir la relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class); // Asegúrate de que existe el campo user_id en la tabla
    }
}
