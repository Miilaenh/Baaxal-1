<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CategoriaController extends Controller
{
    // Listar todas las categorías
    public function index()
    {
        // Obtener todas las categorías
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

        // Retornar la vista de categorías descifradas como respuesta
        return view('categorias.index', [
            'categorias' => $categoriasDescifradas,
        ]);
    }

    // Mostrar el formulario de creación de una nueva categoría
    public function showCreateForm()
    {
        return view('categorias.create');
    }

    // Creacion de una nueva categoria
    public function create(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255', 
        ]);

        // Cifrar los datos antes de guardarlos en la base de datos
        $nombreCifrado = Crypt::encryptString($request->nombre);

        $categoria = new Categoria();
        $categoria->nombre = $nombreCifrado;
        $categoria->save();

        // Retornar una respuesta de éxito
        session()->flash('flash.banner', 'La categoria se ha creado correctamente');
        session()->flash('flash.bannerStyle', 'success');
    
        return redirect()->route('categorias.index');
    }

    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string|max:255', 
        ]);
    
        // Buscar la categoría por su id
        $categoria = Categoria::find($id);
        if ($categoria) {
            // Cifrar el nuevo nombre antes de actualizarlo
            $nombreCifrado = Crypt::encryptString($request->nombre);
    
            // Actualizar el nombre de la categoría
            $categoria->nombre = $nombreCifrado;
            $categoria->save();
            // Retornar una respuesta de exito
            session()->flash('flash.banner', 'La categoria se ha actualizado correctamente');
            session()->flash('flash.bannerStyle', 'success');
        } else {
            // Retornar una respuesta de error
            session()->flash('flash.banner', 'Hubo un error al actualizar la categoria');
            session()->flash('flash.bannerStyle', 'danger');
        }
    
        return redirect()->route('categorias.index');
    }

    // Eliminar una categoría
    public function delete($id)
    {
        // Buscar la categoría por su id
        $categoria = Categoria::find($id);
        if ($categoria) {
            // Eliminar la categoría
            $categoria->delete();
            // Retornar una respuesta de éxito
            session()->flash('flash.banner', 'La categoria se ha eliminado correctamente');
            session()->flash('flash.bannerStyle', 'success');
        } else {
            // Retornar una respuesta de error
            session()->flash('flash.banner', 'Hubo un error al eliminar la categoria');
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('categorias.index');
    }
}
