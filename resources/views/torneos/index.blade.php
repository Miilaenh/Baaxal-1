<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight">
            {{ __('Torneos') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-8 mb-4">
                <!-- Botón para abrir el modal de agregar torneo -->
                <button class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-200" data-toggle="modal" data-target="#addTournamentModal">
                    <svg class="h-5 w-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Agregar Torneo
                </button>
            </div>

            <div class="bg-white shadow-lg rounded-lg p-8">
                @if ($torneos)
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                        @foreach ($torneos as $torneo)
                            <div class="bg-white p-6 rounded-lg shadow-md card-torneo">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-xl font-semibold text-gray-800">{{ $torneo['nombre'] }}</h3>
                                    @if ($torneo['logo'])
                                    <img src="{{ asset('storage/torneos-avatar/'.$torneo['logo']) }}" alt="{{ $torneo['nombre'] }}" class="h-12 w-12 object-contain rounded-full border border-gray-300">
                                    @else
                                        <div class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center">
                                            <span class="text-gray-400">N/A</span>
                                        </div>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <p class="text-gray-600 flex items-center mb-2">
                                        <svg class="h-5 w-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-5 8h5m2 0h.01M21 21H3V5a2 2 0 012-2h14a2 2 0 012 2z"></path>
                                        </svg>
                                        {{ $torneo['fecha_inicio'] }} - {{ $torneo['fecha_fin'] }}
                                    </p>
                                    <p class="text-gray-600 flex items-center">
                                        <svg class="h-5 w-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16.88 3.549L7.12 3.55C5.92 3.55 5 4.47 5 5.67V18.33c0 1.2.92 2.12 2.12 2.12h9.76c1.2 0 2.12-.92 2.12-2.12V5.67c0-1.2-.92-2.12-2.12-2.12zM9 12l2 2 4-4"></path>
                                        </svg>
                                        {{ $torneo['ubicacion'] }}
                                    </p>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <a href="{{ route('torneos.update', $torneo['id']) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition duration-200">
                                        <svg class="h-5 w-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5a2 2 0 100 4h4l-4 5h5a2 2 0 100-4h-4l4-5H11z"></path>
                                        </svg>
                                        Editar
                                    </a>
                                    <form method="POST" action="{{ route('torneos.delete', $torneo['id']) }}" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este torneo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-200">
                                            <svg class="h-5 w-5 inline-block" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-6 text-center text-gray-500">
                        <p>No hay torneos disponibles.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal para agregar torneo -->
    <!-- Modal para agregar torneo -->
<div class="modal fade" id="addTournamentModal" tabindex="-1" role="dialog" aria-labelledby="addTournamentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTournamentModalLabel">Agregar Torneo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('torneos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="logo">Logo</label>
                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de Inicio</label>
                        <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de Fin</label>
                        <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" required>
                    </div>
                    <div class="form-group">
                        <label for="ubicacion">Ubicación</label>
                        <input type="text" class="form-control" id="ubicacion" name="ubicacion" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select class="form-control" id="categoria_id" name="categoria_id" required>
                            <option value="">Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria['id'] }}">{{ $categoria['nombre'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar Torneo</button>
                </div>
            </form>
        </div>
    </div>
</div> 

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</x-app-layout>