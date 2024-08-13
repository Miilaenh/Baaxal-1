@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Jugador</h1>

    <form action="{{ route('jugadores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" required>
        </div>
        
        <div class="mb-3">
            <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellido_paterno" id="apellido_paterno" required>
        </div>
        
        <div class="mb-3">
            <label for="apellido_materno" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" name="apellido_materno" id="apellido_materno" required>
        </div>

        <div class="mb-3">
            <label for="equipo_id" class="form-label">Equipo</label>
            <select class="form-select" name="equipo_id" id="equipo_id" required>
                @foreach ($equipos as $equipo)
                    <option value="{{ $equipo['id'] }}">{{ $equipo['nombre'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="numero_camiseta" class="form-label">Número de Camiseta</label>
            <input type="number" class="form-control" name="numero_camiseta" id="numero_camiseta" required>
        </div>
        
        <div class="mb-3">
            <label for="posicion_juego" class="form-label">Posición de Juego</label>
            <input type="text" class="form-control" name="posicion_juego" id="posicion_juego" required>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo</label>
            <input type="file" class="form-control" name="logo" id="logo" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Agregar Jugador</button>
    </form>
</div>
@endsection
