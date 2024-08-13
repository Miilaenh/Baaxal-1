<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jugadores</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Roboto', sans-serif;
            position: relative;
        }
        .header-container {
            background-color: #329D9C;
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .header__text--h2 {
            font-size: 2.5em;
            margin: 0;
            font-family: 'Anton', sans-serif;
            animation: tituloAnimado 1s ease-out;
        }
        .section-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section-header h4 {
            color: #329D9C;
            margin-bottom: 10px;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .divider {
            height: 2px;
            background-color: #329D9C;
            margin: 10px auto;
            width: 50%;
            border-radius: 5px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .player-card {
            width: 100%;
            max-width: 300px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
        }
        .photo {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }
        .card-body {
            padding: 15px;
        }
        .info {
            margin-bottom: 10px;
            color: #555;
        }
        .btn-primary {
            background-color: #329D9C;
            border-color: #329D9C;
            border-radius: 25px;
        }
        .btn-primary:hover {
            background-color: #56C596;
            border-color: #56C596;
        }
        .search-box {
            display: flex;
            align-items: center;
            margin: 20px 0;
            justify-content: center;
        }
        .search-box input {
            border-radius: 25px;
            border: 1px solid #ddd;
            padding: 10px 20px;
            width: 250px;
            margin-right: 10px;
        }
        .search-box i {
            position: absolute;
            right: 10px;
            color: #888;
        }
        @keyframes tituloAnimado {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <div class="header-container">
            <h2 class="header__text--h2">Jugadores</h2>
        </div>
    </x-slot>

    <div class="container mt-4">
        <div class="section-header">
            <h4>Buscar Jugadores</h4>
            <div class="divider"></div>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Buscar jugador..." aria-label="Buscar">
            <i class="fas fa-search"></i>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createJugadorModal">Agregar Jugador</button>
        </div>

        <div class="card-container"> <!-- Corregido aquí -->
            @foreach ($jugadores as $jugador)
            <div class="player-card">
            <img src="{{ asset('storage/jugador-avatar/'.$jugador['avatar']) }}" alt="Avatar de {{ $jugador['nombre'] }}" class="photo">
            <div class="card-body">
                    <h5 class="card-title">{{ $jugador['nombre'] }} {{ $jugador['apellido_paterno'] }}</h5>
                    <p>Equipo: {{ $jugador['equipo_nombre'] }}</p>
            <p class="info">Número de Camiseta: {{ $jugador['numero_camiseta'] }}</p>
            <p class="info">Posición: {{ $jugador['posicion_juego'] }}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Modal para Agregar Jugador -->
        <div class="modal fade" id="createJugadorModal" tabindex="-1" aria-labelledby="createJugadorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createJugadorModalLabel">Agregar Jugador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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
                                        <option value="{{ $equipo['id'] }}">{{ $equipo['nombre']}}</option>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Agregar Jugador</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>