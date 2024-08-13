<?php
namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Equipo;
use App\Models\Partido;
use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class PublicController extends Controller
{
    public function showTorneos()
    {
        $torneos = Torneo::all();
        $torneosDescifrados = [];

        // Iterar sobre cada torneo para descifrar los datos
        foreach ($torneos as $torneo) {
            $torneosDescifrados[] = [
                'id' => $torneo->id,
                'nombre' => Crypt::decryptString($torneo->nombre),
                'descripcion' => Crypt::decryptString($torneo->descripcion),
                'logo' => $torneo->logo,
                'fecha_inicio' => Crypt::decryptString($torneo->fecha_inicio),
                'fecha_fin' => Crypt::decryptString($torneo->fecha_fin),
                'ubicacion' => Crypt::decryptString($torneo->ubicacion),
                'categoria_id' => $torneo->categoria_id,
                'privado' => $torneo->privado,
            ];
        }
        return view('public.torneos', ['torneos' => $torneosDescifrados]);
    }

    public function showEquipos()
    {
        $equipos = Equipo::all();
        return view('public.equipos', compact('equipos'));
    }

    public function showPartidos()
    {
        $partidos = Partido::all();
        return view('public.partidos', compact('partidos'));
    }

    public function showResultados()
    {
        $resultados = Resultado::all();
        return view('public.resultados', compact('resultados'));
    }
}

