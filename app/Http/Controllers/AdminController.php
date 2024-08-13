<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return $this->showUsers(); // Llama al nuevo método
    }

    public function showUsers()
    {
        $users = User::with('roles')->get(); // Obtiene todos los usuarios junto con sus roles
        return view('roles.index', compact('users')); // Pasa los usuarios a la vista
    }
    
    

    public function updateRole(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'role' => 'required|string', // Validar que se pase un rol
        ]);
    
        // Buscar el usuario por ID
        $user = User::findOrFail($id);
    
        // Eliminar todos los roles actuales del usuario
        $user->roles()->detach();
    
        // Asignar el nuevo rol al usuario
        $user->assignRole($request->input('role'));
    
        return redirect()->route('admin.index')->with('success', 'Rol actualizado correctamente.');
    }
    
    public function destroy($id)
{
    // Buscar el usuario por ID
    $user = User::findOrFail($id);
    
    // Eliminar el usuario
    $user->delete();

    return redirect()->route('admin.index')->with('success', 'Usuario eliminado correctamente.');
}

}

