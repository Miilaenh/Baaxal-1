<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f8;
            font-family: 'Arial', sans-serif;
        }
        .header-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
        .match-card {
            border: none;
            border-radius: 15px;
            background: #ffffff;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            margin-bottom: 30px;
        }
        .match-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .match-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 15px 15px 0 0;
            text-align: center;
            font-weight: bold;
            font-size: 1.25rem;
        }
        .match-body {
            padding: 20px;
            text-align: center;
        }
        .match-info {
            font-size: 1.2rem;
            color: #555;
            margin: 5px 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s;
            border-radius: 25px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .no-tournaments {
            text-align: center;
            font-size: 1.5rem;
            color: #6c757d;
            margin-top: 20px;
        }
        .section-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .section-header h4 {
            color: #28a745;
            margin-bottom: 10px;
        }
        .divider {
            height: 2px;
            background-color: #007bff;
            margin: 10px auto;
            width: 50%;
            border-radius: 5px;
        }
        .team-icon {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-900 leading-tight header-title">
            {{ __('Partidos') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="container">

            <!-- Botón para abrir el modal -->
            <div class="text-right mb-4">
                <button type="button" class="btn btn-success mb-3" data-toggle="modal" data-target="#agregarPartidoModal">
                    Agregar Partido
                </button>
            </div>

            <div class="row">
    @forelse ($partidos as $partido)
        <div class="col-md-6">
            <div class="card match-card">
                <div class="match-header">
                    <img src="{{ asset('storage/equipos-avatar/' . $partido['equipo_local_id'] . '.png') }}" alt="{{ $arbitros[$partido['equipo_local_id']]['nombreCompleto'] ?? 'Equipo Local' }}" class="team-icon">
                    {{ $arbitros[$partido['equipo_local_id']]['nombreCompleto'] ?? 'Equipo Local' }} vs
                    <img src="{{ asset('storage/equipos-avatar/' . $partido['equipo_visitante_id'] . '.png') }}" alt="{{ $arbitros[$partido['equipo_visitante_id']]['nombreCompleto'] ?? 'Equipo Visitante' }}" class="team-icon">
                    {{ $arbitros[$partido['equipo_visitante_id']]['nombreCompleto'] ?? 'Equipo Visitante' }}
                </div>
                <div class="match-body">
                    <p class="match-info">{{ $partido['fecha'] }}</p>
                    <p class="match-info">{{ $partido['inicio'] }} - {{ $partido['fin'] }}</p>
                   
                    <a href="{{ route('public.resultados', $partido['id']) }}" class="btn btn-primary btn-sm">
                        Ver más detalles
                    </a>
                </div>
            </div>
        </div>
    @empty
        <p>No hay partidos disponibles.</p>
    @endforelse
</div>

        </div>
    </div>
</x-app-layout>

<!-- Modal para agregar partidos -->
<div class="modal fade" id="agregarPartidoModal" tabindex="-1" aria-labelledby="agregarPartidoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('partidos.create') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="agregarPartidoLabel">Agregar Partido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
    <div class="form-group">
        <label for="torneo">Torneo</label>
        <select class="form-control" id="torneo" name="torneo_id" required>
            <option value="">Selecciona un torneo</option>
            @foreach($torneos as $torneo)
                <option value="{{ $torneo['id'] }}">{{ $torneo['nombre'] }}</option>
            @endforeach
        </select>
    </div>
</div>

                    <div class="form-group">
                        <label for="inicio">Hora de Inicio</label>
                        <input type="time" class="form-control" id="inicio" name="inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="fin">Hora de Fin</label>
                        <input type="time" class="form-control" id="fin" name="fin" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>

                    <div class="form-group">
                        <label for="equipo_local">Equipo Local</label>
                        <select class="form-control" id="equipo_local" name="equipo_local_id" required>
                            <option value="">Selecciona un equipo local</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="equipo_visitante">Equipo Visitante</label>
                        <select class="form-control" id="equipo_visitante" name="equipo_visitante_id" required>
                            <option value="">Selecciona un equipo visitante</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="arbitro">Árbitro</label>
                        <select class="form-control" id="arbitro" name="arbitro_id" required>
                            <option value="">Selecciona un árbitro</option>
                            @foreach($arbitros as $arbitro)
                                <option value="{{ $arbitro['id'] }}">{{ $arbitro['nombreCompleto'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <script>
                        document.getElementById('torneo').addEventListener('change', function () {
                            const torneoId = this.value;

                            if (torneoId) {
fetch(`/partidos/equipos/${torneoId}`)
                                    .then(response => response.json())
                                    .then(equipos => {
                                        const equipoLocalSelect = document.getElementById('equipo_local');
                                        const equipoVisitanteSelect = document.getElementById('equipo_visitante');

                                        equipoLocalSelect.innerHTML = '<option value="">Selecciona un equipo local</option>';
                                        equipoVisitanteSelect.innerHTML = '<option value="">Selecciona un equipo visitante</option>';

                                        equipos.forEach(equipo => {
                                            const option = document.createElement('option');
                                            option.value = equipo.id;
                                            option.textContent = equipo.nombre;
                                            equipoLocalSelect.appendChild(option);
                                            equipoVisitanteSelect.appendChild(option.cloneNode(true));
                                        });
                                    });
                            } else {
                                document.getElementById('equipo_local').innerHTML = '<option value="">Selecciona un equipo local</option>';
                                document.getElementById('equipo_visitante').innerHTML = '<option value="">Selecciona un equipo visitante</option>';
                            }
                        });
                    </script>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>