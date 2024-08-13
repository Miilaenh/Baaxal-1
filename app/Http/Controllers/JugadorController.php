<?php

namespace App\Http\Controllers;

use App\Models\Jugador;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class JugadorController extends Controller
{
    // Muestra los jugadores de un equipo específico
    public function jugadoresPorEquipo($id)
    {
        $jugadores = Jugador::where('equipo_id', $id)->get();
        
        // Retorna los jugadores en formato JSON
        return response()->json([
            'jugadores' => $jugadores,
        ]);
    }

    // Muestra la lista de jugadores
    public function index()
    {
        // Obtener todos los jugadores con la relación del equipo
        $jugadores = Jugador::with('equipo')->get();
    
        // Obtener todos los equipos para el formulario
        $equipos = Equipo::all();
    
        // Desencriptar los nombres de los equipos
        $equiposArray = [];
        foreach ($equipos as $equipo) {
            $equiposArray[] = [
                'id' => $equipo->id,
                'nombre' => Crypt::decryptString($equipo->nombre),
            ];
        }
    
        // Desencriptar los datos de los jugadores
        $jugadoresArray = [];
        foreach ($jugadores as $jugador) {
            $jugadoresArray[] = [
                'id' => $jugador->id,
                'nombre' => $jugador->nombre,
                'apellido_paterno' => $jugador->apellido_paterno,
                'apellido_materno' => $jugador->apellido_materno,
                'equipo_id' => $jugador->equipo_id,
                'avatar'=> $jugador->logo,
                'numero_camiseta' => $jugador->numero_camiseta,
                'posicion_juego' => $jugador->posicion_juego,
                'equipo_nombre' => Crypt::decryptString($jugador->equipo->nombre), // Suponiendo que también quieras el nombre del equipo descifrado
            ];
        }
    
        // Pasar los jugadores descifrados y los equipos a la vista
        return view('jugadores.index', [
            'jugadores' => $jugadoresArray,
            'equipos' => $equiposArray,
        ]);
    }
    

    // Muestra el formulario para crear un nuevo jugador
    public function create()
    {
        $equipos = Equipo::all(); // Obtener todos los equipos para mostrarlos en el formulario

        return view('jugadores.create', [
            'equipos' => $equipos,
        ]);
    }

    // Almacena un nuevo jugador en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'equipo_id' => 'required|exists:equipos,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'numero_camiseta' => 'required|integer',
            'posicion_juego' => 'required|string',
        ]);

        $jugador = new Jugador();
        $jugador->nombre = $request->nombre;
        $jugador->apellido_paterno = $request->apellido_paterno;
        $jugador->apellido_materno = $request->apellido_materno;
        $jugador->equipo_id = $request->equipo_id;
        $jugador->numero_camiseta = $request->numero_camiseta;
        $jugador->posicion_juego = $request->posicion_juego;

        if ($request->hasFile('logo')) {
            try {
                $logoPath = $request->file('logo')->store('jugador-avatar', 'public');
                $jugador->logo = str_replace('jugador-avatar/', '', $logoPath);
            } catch (\Exception $e) {
                Log::error('Error al guardar el logo: ' . $e->getMessage());
                return redirect()->back()->withInput()->withErrors(['logo' => 'Hubo un error al guardar el logo.']);
            }
        }

        $jugador->save();

        session()->flash('flash.banner', 'El jugador se ha creado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('jugadores.index');
    }

    // Muestra los detalles de un jugador específico
    public function show($id)
    {
        $jugador = Jugador::findOrFail($id);
        return view('jugadores.show', [
            'jugador' => $jugador,
        ]);
    }

    // Muestra el formulario para editar un jugador existente
    public function edit($id)
    {
        $jugador = Jugador::findOrFail($id);
        $equipos = Equipo::all(); // Obtener todos los equipos para mostrarlos en el formulario

        return view('jugadores.edit', [
            'jugador' => $jugador,
            'equipos' => $equipos,
        ]);
    }

    // Actualiza un jugador existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'equipo_id' => 'required|exists:equipos,id',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'numero_camiseta' => 'required|integer',
            'posicion_juego' => 'required|string',
        ]);

        $jugador = Jugador::findOrFail($id);
        $jugador->nombre = Crypt::encryptString($request->nombre);
        $jugador->apellido_paterno = Crypt::encryptString($request->apellido_paterno);
        $jugador->apellido_materno = Crypt::encryptString($request->apellido_materno);
        $jugador->equipo_id = $request->equipo_id;
        $jugador->numero_camiseta = $request->numero_camiseta;
        $jugador->posicion_juego = $request->posicion_juego;

        if ($request->hasFile('logo')) {
            // Eliminar la imagen anterior si existe
            if ($jugador->logo) {
                Storage::disk('public')->delete('jugadores-avatar/' . $jugador->logo);
            }

            try {
                $logoPath = $request->file('logo')->store('jugadores-avatar', 'public');
                $jugador->logo = str_replace('jugadores-avatar/', '', $logoPath);
            } catch (\Exception $e) {
                Log::error('Error al guardar el nuevo logo: ' . $e->getMessage());
                return redirect()->back()->withInput()->withErrors(['logo' => 'Hubo un error al guardar el nuevo logo.']);
            }
        }

        $jugador->save();

        session()->flash('flash.banner', 'El jugador se ha actualizado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('jugadores.index');
    }

    // Elimina un jugador de la base de datos
    public function destroy($id)
    {
        $jugador = Jugador::findOrFail($id);

        if ($jugador->logo) {
            Storage::disk('public')->delete('jugadores-avatar/' . $jugador->logo);
        }

        $jugador->delete();
        session()->flash('flash.banner', 'El jugador se ha eliminado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('jugadores.index');
    }
}
