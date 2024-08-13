<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\ResultadoController;
use App\Http\Controllers\TorneoController;
use App\Http\Controllers\JugadorController;
use App\Http\Controllers\ArbitroController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;


// Rutas públicas para inicio de sesión y registro
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::get('/admin', [AdminController::class, 'index'])->name('roles.index');
Route::put('/admin/{id}/update-role', [AdminController::class, 'updateRole'])->name('admin.updateRole');
Route::delete('/admin/users/{id}', [AdminController::class, 'destroy'])->name('admin.users.destroy');

// Ruta para la página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Rutas para el público
Route::get('/public/torneos', [PublicController::class, 'showTorneos'])->name('public.torneos');
Route::get('/public/equipos', [PublicController::class, 'showEquipos'])->name('public.equipos');
Route::get('/public/partidos', [PublicController::class, 'showPartidos'])->name('public.partidos');
Route::get('/public/resultados', [PublicController::class, 'showResultados'])->name('public.resultados');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para Administrador para tener acceso y control de las categorias
    Route::group(['middleware' => ['can:control_deportes/categorias,api']], function () {
        Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
        Route::get('/categorias/create', [CategoriaController::class, 'showCreateForm'])->name('categorias.showCreateForm');
        Route::post('/categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
        Route::get('/categorias/update/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
        Route::delete('/categorias/delete/{id}', [CategoriaController::class, 'delete'])->name('categorias.delete');
    });

    // Rutas para Administrador y Organizador para tener acceso y control de los torneos y partidos
    Route::group(['middleware' => ['can:control_torneos-partidos, api']], function () {
        Route::get('/torneos', [TorneoController::class, 'index'])->name('torneos.index');
        Route::post('/torneos', [TorneoController::class, 'store'])->name('torneos.store');
        Route::get('/torneos/{id}/edit', [TorneoController::class, 'showEditForm'])->name('torneos.edit');
        Route::put('/torneos/{id}', [TorneoController::class, 'update'])->name('torneos.update');
        Route::delete('/torneos/{id}', [TorneoController::class, 'delete'])->name('torneos.delete');
    });

    // Rutas para partidos
    Route::group(['middleware' => ['can:control_torneos-partidos, api']], function () {
        Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
        Route::get('/partidos/equipos/{torneo_id}', [PartidoController::class, 'getEquiposByTorneo']);
        Route::get('/partidos/torneo/{torneo_id}', [PartidoController::class, 'showByTorneo'])->name('partidos.showByTorneo');
        Route::post('/partidos', [PartidoController::class, 'create'])->name('partidos.create');
        Route::put('/partidos/{id}', [PartidoController::class, 'update'])->name('partidos.update');
        Route::delete('/partidos/{id}', [PartidoController::class, 'delete'])->name('partidos.delete');
    });

 // Rutas para los equipos
Route::group(['middleware' => ['can:control_equipos, api']], function () {
    Route::get('/equipos', [EquipoController::class, 'index'])->name('equipos.index');
    Route::get('/equipos/create', [EquipoController::class, 'create'])->name('equipos.create');
    Route::post('/equipos', [EquipoController::class, 'store'])->name('equipos.store');
    Route::get('/equipos/{id}/edit', [EquipoController::class, 'edit'])->name('equipos.edit');
    Route::put('/equipos/{id}', [EquipoController::class, 'update'])->name('equipos.update');
    Route::delete('/equipos/{id}', [EquipoController::class, 'destroy'])->name('equipos.destroy');
    Route::get('/equipos/{id}/jugadores', [JugadorController::class, 'jugadoresPorEquipo'])->name('equipos.jugadores');
});

// Rutas para los jugadores (debes definirlas también)
Route::group([], function () {
    Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
    Route::get('/jugadores/create', [JugadorController::class, 'create'])->name('jugadores.create');
    Route::post('/jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
    Route::get('/jugadores/{id}/edit', [JugadorController::class, 'edit'])->name('jugadores.edit');
    Route::put('/jugadores/{id}', [JugadorController::class, 'update'])->name('jugadores.update');
    Route::delete('/jugadores/{id}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');
});
    // Rutas para Organizador para tener control y acceso a resultados de un torneo y partido
    Route::group(['middleware' => ['can:contabilidad/resultados_torneos, api']], function () {
        Route::get('/resultados/show', [ResultadoController::class, 'showAll']);
        Route::get('/resultados/show/{partido_id}', [ResultadoController::class, 'showByPartido']);
        Route::post('/resultados/create', [ResultadoController::class, 'create']);
        Route::put('/resultados/update/{id}', [ResultadoController::class, 'update']);
        Route::delete('/resultados/delete/{id}', [ResultadoController::class, 'delete']);
        Route::get('/resultados', [ResultadoController::class, 'index'])->name('resultados.index'); // Asegúrate de que esta línea esté presente
    });


// Rutas para Administrador para tener acceso y control de los árbitros
Route::group([], function () {
    Route::get('/arbitros', [ArbitroController::class, 'index'])->name('arbitros.index');
    Route::get('/arbitros/create', [ArbitroController::class, 'create'])->name('arbitros.create');
    Route::post('/arbitros', [ArbitroController::class, 'store'])->name('arbitros.store');
    Route::get('/arbitros/{id}/edit', [ArbitroController::class, 'edit'])->name('arbitros.edit');
    Route::put('/arbitros/{id}', [ArbitroController::class, 'update'])->name('arbitros.update');
    Route::delete('/arbitros/{id}', [ArbitroController::class, 'destroy'])->name('arbitros.destroy');
});

// Rutas para Organizador para tener acceso y control de los jugadores
Route::group([], function () {
    Route::get('/jugadores', [JugadorController::class, 'index'])->name('jugadores.index');
    Route::get('/jugadores/create', [JugadorController::class, 'create'])->name('jugadores.create');
    Route::post('/jugadores', [JugadorController::class, 'store'])->name('jugadores.store');
    Route::get('/jugadores/{id}/edit', [JugadorController::class, 'edit'])->name('jugadores.edit');
    Route::put('/jugadores/{id}', [JugadorController::class, 'update'])->name('jugadores.update');
    Route::delete('/jugadores/{id}', [JugadorController::class, 'destroy'])->name('jugadores.destroy');
});

// Rutas para Organizador para tener acceso y control de los árbitros
Route::group([], function () {
    Route::get('/arbitros', [ArbitroController::class, 'index'])->name('arbitros.index');
    Route::get('/arbitros/create', [ArbitroController::class, 'create'])->name('arbitros.create');
    Route::post('/arbitros', [ArbitroController::class, 'store'])->name('arbitros.store');
    Route::get('/arbitros/{id}/edit', [ArbitroController::class, 'edit'])->name('arbitros.edit');
    Route::put('/arbitros/{id}', [ArbitroController::class, 'update'])->name('arbitros.update');
    Route::delete('/arbitros/{id}', [ArbitroController::class, 'destroy'])->name('arbitros.destroy');
});
   
});


