<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
use App\Models\Torneo;
use App\Models\Jugador;
use Illuminate\Support\Facades\Log;

class EquipoController extends Controller
{
    // Muestra la lista de equipos
    public function index()
    {
        
        $equipos = Equipo::with('torneo')->get();
        $torneos = Torneo::where('user_id', auth()->id())->get()->map(function ($torneo) {
            return [
                'id' => $torneo->id,
                'nombre' => Crypt::decryptString($torneo->nombre), // Desencriptar el nombre
            ];
        });

        $equiposDescifrados = $equipos->map(function($equipo) {
            return [
                'id' => $equipo->id,
                'nombre' => Crypt::decryptString($equipo->nombre),
                'logo' => $equipo->logo,
                'torneo' => $equipo->torneo ? Crypt::decryptString($equipo->torneo->nombre) : 'Sin torneo',
            ];
        });

        return view('equipos.index', [
            'equipos' => $equiposDescifrados,
            'torneos' => $torneos,
        ]);
    }

    // Muestra el formulario para crear un nuevo equipo
    public function create()
    {
        $torneos = Torneo::where('user_id', auth()->id())->get()->map(function ($torneo) {
            return [
                'id' => $torneo->id,
                'nombre' => Crypt::decryptString($torneo->nombre),
            ];
        });

        return view('equipos.create', [
            'torneos' => $torneos,
        ]);
    }

    // Almacena un nuevo equipo en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'torneo_id' => 'required|integer|exists:torneos,id,user_id,' . auth()->id(),
        ]);
    
        $nombreCifrado = Crypt::encryptString($request->nombre);
        $equipo = new Equipo();
        $equipo->nombre = $nombreCifrado;
    
        if ($request->hasFile('logo')) {
            try {
                $logoPath = $request->file('logo')->store('equipos-avatar', 'public');
                $equipo->logo = str_replace('equipos-avatar/', '', $logoPath);
            } catch (\Exception $e) {
                Log::error('Error al guardar el logo: ' . $e->getMessage());
                return redirect()->back()->withInput()->withErrors(['logo' => 'Hubo un error al guardar el logo.']);
            }
        }
    
        $equipo->torneo_id = $request->torneo_id;
        $equipo->save();
    
        session()->flash('flash.banner', 'El equipo se ha creado correctamente');
        session()->flash('flash.bannerStyle', 'success');
    
        return redirect()->route('equipos.index');
    }

    // Muestra los detalles de un equipo específico, incluyendo los jugadores
    public function show($id)
    {
        $equipo = Equipo::findOrFail($id);
        $nombreDescifrado = Crypt::decryptString($equipo->nombre);

        // Obtener los jugadores del equipo
        $jugadores = $equipo->jugadores; // Asegúrate de tener la relación definida en el modelo Equipo

        return view('equipos.show', [
            'equipo' => [
                'id' => $equipo->id,
                'nombre' => $nombreDescifrado,
                'logo' => $equipo->logo,
                'torneo_id' => $equipo->torneo_id,
            ],
            'jugadores' => $jugadores,
        ]);
    }

    // Muestra el formulario para editar un equipo existente
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        $nombreDescifrado = Crypt::decryptString($equipo->nombre);

        $torneos = Torneo::where('user_id', auth()->id())->get()->map(function ($torneo) {
            return [
                'id' => $torneo->id,
                'nombre' => Crypt::decryptString($torneo->nombre),
            ];
        });

        return view('equipos.edit', [
            'equipo' => [
                'id' => $equipo->id,
                'nombre' => $nombreDescifrado,
                'logo' => $equipo->logo,
                'torneo_id' => $equipo->torneo_id,
            ],
            'torneos' => $torneos,
        ]);
    }

    // Actualiza un equipo existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'torneo_id' => 'required|integer|exists:torneos,id,user_id,' . auth()->id(),
        ]);

        $nombreCifrado = Crypt::encryptString($request->nombre);
        $equipo = Equipo::findOrFail($id);
        $equipo->nombre = $nombreCifrado;

        if ($request->hasFile('logo')) {
            if ($equipo->logo) {
                Storage::disk('public')->delete('equipos-avatar/' . $equipo->logo);
            }

            try {
                $logoPath = $request->file('logo')->store('equipos-avatar', 'public');
                $equipo->logo = str_replace('equipos-avatar/', '', $logoPath);
            } catch (\Exception $e) {
                Log::error('Error al guardar el nuevo logo: ' . $e->getMessage());
                return redirect()->back()->withInput()->withErrors(['logo' => 'Hubo un error al guardar el nuevo logo.']);
            }
        }

        $equipo->torneo_id = $request->torneo_id;
        $equipo->save();

        session()->flash('flash.banner', 'El equipo se ha actualizado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('equipos.index');
    }

    // Elimina un equipo de la base de datos
    public function destroy($id)
    {
        $equipo = Equipo::findOrFail($id);

        if ($equipo->logo) {
            Storage::disk('public')->delete('equipos-avatar/' . $equipo->logo);
        }

        $equipo->delete();
        session()->flash('flash.banner', 'El equipo se ha eliminado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('equipos.index');
    }
}
