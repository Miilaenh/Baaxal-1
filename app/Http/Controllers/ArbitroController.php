<?php

namespace App\Http\Controllers;

use App\Models\Arbitro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ArbitroController extends Controller
{
    public function index()
    {
        $arbitros = Arbitro::all();
        return view('arbitros.index', compact('arbitros'));
    }

    public function create()
    {
        return view('arbitros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombreCompleto' => 'required|string|max:255',
            'email' => 'required|email|unique:arbitros,email',
            'contraseña' => 'required|string|min:6',
        ]);

        $arbitro = new Arbitro($request->all());
        $arbitro->contraseña = bcrypt($request->contraseña);
        $arbitro->save();

        return redirect()->route('arbitros.index')->with('success', 'Árbitro creado exitosamente.');
    }

    public function edit(Arbitro $arbitro)
    {
        return view('arbitros.edit', compact('arbitro'));
    }

    public function update(Request $request, Arbitro $arbitro)
    {
        $request->validate([
            'nombreCompleto' => 'required|string|max:255',
            'email' => 'required|email|unique:arbitros,email,' . $arbitro->id,
            'contraseña' => 'nullable|string|min:6',
        ]);

        $arbitro->nombreCompleto = $request->nombreCompleto;
        $arbitro->email = $request->email;

        if ($request->contraseña) {
            $arbitro->contraseña = bcrypt($request->contraseña);
        }

        $arbitro->save();

        return redirect()->route('arbitros.index')->with('success', 'Árbitro actualizado exitosamente.');
    }

    public function destroy(Arbitro $arbitro)
    {
        $arbitro->delete();
        return redirect()->route('arbitros.index')->with('success', 'Árbitro eliminado exitosamente.');
    }

    public function login(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'email' => 'required|email',
            'contraseña' => 'required|string',
        ]);

        // Buscar al árbitro por el email
        $arbitro = Arbitro::where('email', $request->email)->first();

        if ($arbitro && Hash::check($request->contraseña, $arbitro->contraseña)) {
            // Si las credenciales son correctas, devolver los detalles del árbitro
            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'data' => $arbitro
            ], 200);
        } else {
            // Si las credenciales son incorrectas, devolver un mensaje de error
            return response()->json([
                'success' => false,
                'message' => 'Credenciales incorrectas'
            ], 401);
        }
    }
}
