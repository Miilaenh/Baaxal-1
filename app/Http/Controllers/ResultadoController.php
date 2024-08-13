<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ResultadoController extends Controller
{
    // Listar todos los registros de resultados
    public function index()
    {
        $resultados = Resultado::all();

        // Array para almacenar los resultados descifrados
        $resultadosDescifrados = [];

        // Iterar sobre cada resultado para descifrar los puntos
        foreach ($resultados as $resultado) {
            // Descifrar los datos de los resultados
            $puntos1Descifrado = Crypt::decryptString($resultado->puntos_equipo_local);
            $puntos2Descifrado = Crypt::decryptString($resultado->puntos_equipo_visitante);

            // Agregar los puntos descifrados al array de resultados descifrados
            $resultadosDescifrados[] = [
                'id' => $resultado->id,
                'partido_id' => $resultado->partido_id,
                'puntos_equipo_local' => $puntos1Descifrado,
                'puntos_equipo_visitante' => $puntos2Descifrado,
            ];
        }

        // Retornar la vista de categorías descifradas como respuesta
        return view('resultados.index', [
            'resultados' => $resultadosDescifrados,
        ]);
    }
    public function adminIndex()
    {
        $resultados = Resultado::all();

        // Array para almacenar los resultados descifrados
        $resultadosDescifrados = [];

        // Iterar sobre cada resultado para descifrar los puntos
        foreach ($resultados as $resultado) {
            // Descifrar los datos de los resultados
            $puntos1Descifrado = Crypt::decryptString($resultado->puntos_equipo_local);
            $puntos2Descifrado = Crypt::decryptString($resultado->puntos_equipo_visitante);

            // Agregar los puntos descifrados al array de resultados descifrados
            $resultadosDescifrados[] = [
                'id' => $resultado->id,
                'partido_id' => $resultado->partido_id,
                'puntos_equipo_local' => $puntos1Descifrado,
                'puntos_equipo_visitante' => $puntos2Descifrado,
            ];
        }

        // Retornar la vista de resultados para administradores con los datos descifrados
        return view('resultados.admin', [
            'resultados' => $resultadosDescifrados,
        ]);
    }


    // Listar los registros de resultados por partido
    public function showByPartido($partido_id)
    {
        $resultados = Resultado::where('partido_id', $partido_id)->get();

        // Array para almacenar los resultados descifrados
        $resultadosDescifrados = [];

        // Iterar sobre cada resultado para descifrar los puntos
        foreach ($resultados as $resultado) {
            // Descifrar los datos de los resultados
            $puntos1Descifrado = Crypt::decryptString($resultado->puntos_equipo_local);
            $puntos2Descifrado = Crypt::decryptString($resultado->puntos_equipo_visitante);

            // Agregar los puntos descifrados al array de resultados descifrados
            $resultadosDescifrados[] = [
                'id' => $resultado->id,
                'partido_id' => $resultado->partido_id,
                'puntos_equipo_local' => $puntos1Descifrado,
                'puntos_equipo_visitante' => $puntos2Descifrado,
            ];
        }

        // Retornar la vista de categorías descifradas como respuesta
        return view('resultados.partido', [
            'resultados_partido' => $resultadosDescifrados,
        ]);
    }

    // Crear un nuevo registro de resultado
    public function create(Request $request)
    {
        $request->validate([
            'partido_id' => 'required',
            'puntos_equipo_local' => 'required|integer',
            'puntos_equipo_visitante' => 'required|integer',
        ]);

        // Cifrar los datos antes de guardarlos en la base de datos
        $puntos1Cifrado = Crypt::encryptString($request->puntos_equipo_local);
        $puntos2Cifrado = Crypt::encryptString($request->puntos_equipo_visitante);

        $resultado = new Resultado();
        $resultado->partido_id = $request->partido_id;
        $resultado->puntos_equipo_local = $puntos1Cifrado;
        $resultado->puntos_equipo_visitante = $puntos2Cifrado;
        $resultado->save();

        // Retornar una respuesta de éxito
        session()->flash('flash.banner', 'El resultado se ha registrado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('resultados.index');
    }

    // Actualiza un registro de resultado
    public function update($id, Request $request)
    {
        $request->validate([
            'partido_id' => 'required',
            'puntos_equipo_local' => 'required|integer',
            'puntos_equipo_visitante' => 'required|integer',
        ]);

        // Cifrar los datos antes de guardarlos en la base de datos
        $puntos1Cifrado = Crypt::encryptString($request->puntos_equipo_local);
        $puntos2Cifrado = Crypt::encryptString($request->puntos_equipo_visitante);

        $resultado = Resultado::find($id);
        $resultado->partido_id = $request->partido_id;
        $resultado->puntos_equipo_local = $puntos1Cifrado;
        $resultado->puntos_equipo_visitante = $puntos2Cifrado;
        $resultado->save();

        // Retornar una respuesta de éxito
        session()->flash('flash.banner', 'El resultado se ha actualizado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('resultados.by_torneo');
    }

    // Elimina un registro de resultado
    public function delete($id)
    {
        $resultado = Resultado::find($id);
        $resultado->delete();

        // Retornar una respuesta de éxito
        session()->flash('flash.banner', 'El resultado se ha eliminado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('resultados.index');
    }
}
