<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use App\Models\Categoria;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class TorneoController extends Controller
{
    // Listar todos los torneos
    public function index()
    {
        // Obtener todos los torneos cifrados
        $torneos = Torneo::where('user_id', auth()->id())->get();
    
        // Array para almacenar los torneos descifrados
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
                'user_id' => $torneo->user_id, // Agregar el user_id
            ];
        }
    
        // Obtener todas las categorías cifradas
        $categorias = Categoria::all();
    
        // Array para almacenar las categorías descifradas
        $categoriasDescifradas = [];
    
        // Iterar sobre cada categoría para descifrar el nombre
        foreach ($categorias as $categoria) {
            // Descifrar el nombre de la categoría
            $nombreDescifrado = Crypt::decryptString($categoria->nombre);
    
            // Agregar el nombre descifrado al array de categorías descifradas
            $categoriasDescifradas[] = [
                'id' => $categoria->id,
                'nombre' => $nombreDescifrado,
            ];
        }
    
        // Pasar torneos y categorías descifradas a la vista
        return view('torneos.index', [
            'torneos' => $torneosDescifrados,
            'categorias' => $categoriasDescifradas
        ]);
    }
    
    public function create()
    {
        $torneos = Torneo::all()->map(function ($torneo) {
            return [
                'id' => $torneo->id,
                'nombre' => Crypt::decryptString($torneo->nombre), // Desencriptar el nombre
            ];
        });
    
        $categorias = Categoria::all();
        return view('torneos.create')->with(compact('categorias', 'torneos'));
    }

    public function store(Request $request)
{
    try {
        // Cifrar datos
        $nombreCifrado = Crypt::encryptString($request->nombre);
        $descripcionCifrado = Crypt::encryptString($request->descripcion ?? '');
        $fecha1Cifrado = Crypt::encryptString($request->fecha_inicio);
        $fecha2Cifrado = Crypt::encryptString($request->fecha_fin);
        $ubicacionCifrado = Crypt::encryptString($request->ubicacion);

        $torneo = new Torneo();
        $torneo->nombre = $nombreCifrado;
        $torneo->descripcion = $descripcionCifrado;
        $torneo->user_id = $request->user_id; // Asignar user_id

        if ($request->hasFile('logo')) {
            try {
                $logoPath = $request->file('logo')->store('torneos-avatar', 'public');
                $torneo->logo = str_replace('torneos-avatar/', '', $logoPath);
            } catch (\Exception $e) {
                Log::error('Error al guardar el logo: ' . $e->getMessage());
                return redirect()->back()->withInput()->withErrors(['logo' => 'Hubo un error al guardar el logo.']);
            }
        }

        $torneo->fecha_inicio = $fecha1Cifrado;
        $torneo->fecha_fin = $fecha2Cifrado;
        $torneo->ubicacion = $ubicacionCifrado;
        $torneo->categoria_id = $request->categoria_id;
        $torneo->privado = false;
        $torneo->save();

        session()->flash('flash.banner', 'El torneo se ha creado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('torneos.index');
    } catch (QueryException $e) {
        Log::error('Error al crear el torneo: ' . $e->getMessage());
        session()->flash('flash.banner', 'Hubo un error al crear el torneo. Por favor, inténtalo de nuevo más tarde.');
        session()->flash('flash.bannerStyle', 'danger');

        return redirect()->back()->withInput();
    }
}


public function update($id, Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:512|unique:torneos,nombre,'.$id,
        'descripcion' => 'nullable|string',
        'logo' => 'nullable|image|max:2048',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date',
        'ubicacion' => 'required|string',
        'categoria_id' => 'required|integer',
        'privado' => 'required|boolean',
    ]);

    $torneo = Torneo::find($id);
    if ($torneo) {
        $nombreCifrado = Crypt::encryptString($request->nombre);
        $descripcionCifrado = Crypt::encryptString($request->descripcion ?? '');
        $fecha1Cifrado = Crypt::encryptString($request->fecha_inicio);
        $fecha2Cifrado = Crypt::encryptString($request->fecha_fin);
        $ubicacionCifrado = Crypt::encryptString($request->ubicacion);

        $torneo->nombre = $nombreCifrado;
        $torneo->descripcion = $descripcionCifrado;
        if ($request->hasFile('logo')) {
            if ($torneo->logo) {
                Storage::delete($torneo->logo);
            }
            // Guardar el logo en la carpeta public/storage/tournaments-avatar y obtener la ruta relativa
            $logoPath = $request->file('logo')->store('public/storage/tournaments-avatar');
            $torneo->logo = str_replace('public/', '', $logoPath);
        }
        $torneo->fecha_inicio = $fecha1Cifrado;
        $torneo->fecha_fin = $fecha2Cifrado;
        $torneo->ubicacion = $ubicacionCifrado;
        $torneo->categoria_id = $request->categoria_id;
        $torneo->privado = $request->privado;
        $torneo->save();
        
        session()->flash('flash.banner', 'El torneo se ha actualizado correctamente');
        session()->flash('flash.bannerStyle', 'success');
    } else {
        session()->flash('flash.banner', 'Hubo un error al actualizar el torneo');
        session()->flash('flash.bannerStyle', 'danger');
    }

    return redirect()->route('torneos.index');
}

    // Eliminar un torneo
    public function delete($id)
    {
        $torneo = Torneo::find($id);
        if ($torneo) {
            if ($torneo->logo) {
                Storage::delete($torneo->logo);
            }
            $torneo->delete();
            session()->flash('flash.banner', 'El torneo se ha eliminado correctamente');
            session()->flash('flash.bannerStyle', 'success');
        } else {
            session()->flash('flash.banner', 'Hubo un error al eliminar el torneo');
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('torneos.index');
    }
    
}
