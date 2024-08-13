<?php
namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;
use App\Models\Torneo;
use App\Models\Equipo;
use App\Models\Arbitro;
use Illuminate\Support\Facades\Crypt;

class PartidoController extends Controller
{
    // Obtener equipos por torneo
    public function getEquiposByTorneo(Request $request)
    {
        $torneo_id = $request->torneo_id;
    
        // Obtener los equipos asociados al torneo seleccionado
        $equipos = Equipo::where('torneo_id', $torneo_id)->get();
    
        // Descifrar los nombres de los equipos
        foreach ($equipos as $equipo) {
            $equipo->nombre = Crypt::decryptString($equipo->nombre);
        }
    
        // Retornar los equipos como JSON
        return response()->json($equipos);
    }

    // Listar todos los partidos
    public function index()
{
    // Obtener todos los partidos
    $partidos = Partido::all();
    
    // Obtener el usuario logueado
    $usuario = auth()->user();

    // Obtener los torneos asociados al usuario
    $torneos = Torneo::where('user_id', $usuario->id)->get(); // Cambia 'user_id' si usas otro campo para la relación

    // Obtener todos los árbitros
    $arbitros = Arbitro::all();
    
    // Array para almacenar los partidos
    $partidosArray = [];
    
    // Iterar sobre cada partido para agregar los datos
    foreach ($partidos as $partido) {
        $partidosArray[] = [
            'id' => $partido->id,
            'torneo_id' => $partido->torneo_id,
            'inicio' => $partido->inicio,
            'fin' => $partido->fin,
            'fecha' => $partido->fecha,
            'equipo_local_id' => $partido->equipo_local_id,
            'equipo_visitante_id' => $partido->equipo_visitante_id,
        ];
    }
    
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
        ];
    }
    
    // Array para almacenar los árbitros
    $arbitrosArray = [];
    
    // Iterar sobre cada árbitro para agregar los datos
    foreach ($arbitros as $arbitro) {
        $arbitrosArray[] = [
            'id' => $arbitro->id,
            'nombreCompleto' => $arbitro->nombreCompleto,
            'email' => $arbitro->email,
            // Puedes agregar otros campos del árbitro aquí si es necesario
        ];
    }
    
    // Pasar los partidos, torneos y árbitros a la vista
    return view('partidos.index', [
        'partidos' => $partidosArray,
        'torneos' => $torneosDescifrados,
        'arbitros' => $arbitrosArray,
    ]);
}

    

    // Listar todos los partidos por torneo
    public function showByTorneo($torneo_id)
    {
        $partidos = Partido::where('torneo_id', $torneo_id)->get();

        // Array para almacenar los partidos descifrados
        $partidosDescifrados = [];

        // Iterar sobre cada partido para descifrar los datos
        foreach ($partidos as $partido) {
            $equiposLocal = Equipo::find($partido->equipo_local_id);
            $equiposVisitante = Equipo::find($partido->equipo_visitante_id);
            $arbitro = Arbitro::find($partido->arbitro_id);

            $partidosDescifrados[] = [
                'id' => $partido->id,
                'torneo_id' => $partido->torneo_id,
                'inicio' => $partido->inicio,
                'fin' => $partido->fin,
                'fecha' => $partido->fecha,
                'equipo_local_id' => $equiposLocal ? $equiposLocal->nombre : 'N/A',
                'equipo_visitante_id' => $equiposVisitante ? $equiposVisitante->nombre : 'N/A',
                'arbitro_id' => $arbitro ? $arbitro->nombreCompleto : 'N/A',
            ];
        }

        // Retornar la vista de partidos descifrados como respuesta
        return view('partidos.index', [
            'partidos_consulta' => $partidosDescifrados,
        ]);
    }

    // Crear un nuevo partido
    public function create(Request $request)
    {

        // Validar los datos recibidos
        $request->validate([
            'torneo_id' => 'required|exists:torneos,id',
            
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'arbitro_id' => 'required|exists:arbitros,id',
        ]);

        // Crear el nuevo partido
        $partido = new Partido();
        $partido->torneo_id = $request->torneo_id;
        $partido->inicio = $request->inicio; 
        $partido->fin = $request->fin;       
        $partido->fecha = $request->fecha;  
        $partido->equipo_local_id = $request->equipo_local_id;
        $partido->equipo_visitante_id = $request->equipo_visitante_id;
        $partido->arbitro_id = $request->arbitro_id;
        $partido->save();

        // Retornar una respuesta de éxito
        session()->flash('flash.banner', 'El partido se ha creado correctamente');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('partidos.index');
    }

    // Actualizar un partido
    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $request->validate([
            'torneo_id' => 'required|exists:torneos,id',
            'inicio' => 'required|date_format:H:i:s',
            'fin' => 'required|date_format:H:i:s',
            'fecha' => 'required|date',
            'equipo_local_id' => 'required|exists:equipos,id',
            'equipo_visitante_id' => 'required|exists:equipos,id',
            'arbitro_id' => 'required|exists:arbitros,id',
        ]);

        // Buscar el partido por su id
        $partido = Partido::find($id);
        if ($partido) {
            // Actualizar el partido
            $partido->update($request->all());

            // Retornar una respuesta de éxito
            session()->flash('flash.banner', 'El partido se ha actualizado correctamente');
            session()->flash('flash.bannerStyle', 'success');
        } else {
            // Retornar una respuesta de error
            session()->flash('flash.banner', 'Hubo un error al actualizar el partido');
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('partidos.index');
    }

    // Eliminar un partido
    public function delete($id)
    {
        // Buscar el partido por su id
        $partido = Partido::find($id);
        if ($partido) {
            $partido->delete();

            // Retornar una respuesta de éxito
            session()->flash('flash.banner', 'El partido se ha eliminado correctamente');
            session()->flash('flash.bannerStyle', 'success');
        } else {
            // Retornar una respuesta de error
            session()->flash('flash.banner', 'Hubo un error al eliminar el partido');
            session()->flash('flash.bannerStyle', 'danger');
        }

        return redirect()->route('partidos.index');
    }
}