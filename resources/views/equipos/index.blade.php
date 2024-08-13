<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
        }
        .team-card {
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
        .players p {
            margin: 0;
            color: #333;
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
            margin-top: 10px; /* Espaciado superior para separar de los botones */
        }
        .search-box input {
            border-radius: 25px;
            border: 1px solid #ddd;
            padding: 10px 20px;
            width: 250px;
            margin-right: 10px; /* Espaciado a la derecha del campo de búsqueda */
        }
        .search-box i {
            position: absolute;
            right: 10px;
            color: #888;
        }
        .info-section, .contact-section {
            margin: 30px 0;
        }
        .info-section h4, .contact-section h4 {
            color: #329D9C;
            font-weight: 700;
        }
        .info-section p, .contact-section p {
            color: #555;
        }
        .contact-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .contact-form input, .contact-form textarea {
            border-radius: 25px;
            border: 1px solid #ddd;
            margin-bottom: 10px;
            padding: 10px;
            width: 100%;
        }
        .contact-form button {
            background-color: #329D9C;
            color: white;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            transition: background-color 0.3s;
            cursor: pointer;
        }
        .contact-form button:hover {
            background-color: #56C596;
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
    <x-slot name="header"></x-slot>
    
    <div class="header-container">
        <h2 class="header__text--h2">
            {{ __('Equipos') }}
        </h2>
    </div>
    
    <div class="d-flex justify-content-between align-items-center mt-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTeamModal">
            Crear Equipo
        </button>
        <!-- Search bar -->
        <div class="search-box">
            <input type="text" placeholder="Buscar jugadores..." id="search">
            <i class="fas fa-search"></i>
        </div>
    </div>
    
    <div class="section-header">
        <h4>Bienvenido a la Página de Equipos</h4>
        <div class="divider"></div>
        <p>Descubre los equipos y entrenadores más destacados del fútbol.</p>
    </div>

    <div class="card-container">
        @foreach($equipos as $equipo)
        <div class="team-card">
            <img src="{{ asset('storage/equipos-avatar/'.$equipo['logo']) }}" class="photo" alt="{{ $equipo['nombre'] }}">
            
            <div class="card-body">
                <h5>{{ $equipo['nombre'] }}</h5>
                <p class="info">Torneo: {{ $equipo['torneo'] ?? 'Sin torneo' }}</p>
                <div class="players">
                <a href="#" class="btn btn-info" data-id="{{ $equipo['id'] }}" data-toggle="modal" data-target="#jugadoresModal">Ver Jugadores</a>
                </div>
                <a href="{{ route('equipos.edit', $equipo['id']) }}" class="btn btn-primary">Editar</a>
                <form action="{{ route('equipos.destroy', $equipo['id']) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="modal fade" id="jugadoresModal" tabindex="-1" role="dialog" aria-labelledby="jugadoresModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jugadoresModalLabel">Jugadores del Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="jugadoresModalBody">
                <!-- Los jugadores se cargarán aquí -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

    </div>
    <div class="modal fade" id="createTeamModal" tabindex="-1" role="dialog" aria-labelledby="createTeamModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTeamModalLabel">Crear Nuevo Equipo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ route('equipos.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre del Equipo</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="logo">Logo del Equipo</label>
        <input type="file" class="form-control-file" id="logo" name="logo">
    </div>
    <div class="form-group">
    <label for="torneo_id">Torneo</label>
    <select class="form-control" id="torneo_id" name="torneo_id" required>
        <option value="">Selecciona un torneo</option>
        @foreach ($torneos as $torneo)
            <option value="{{ $torneo['id'] }}">{{ $torneo['nombre'] }}</option>
        @endforeach
    </select>
</div>

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Crear Equipo</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>

</x-app-layout>
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        $('.btn-info').click(function() {
            var equipoId = $(this).data('id'); // Obtiene el ID del equipo
            $.get('/equipos/' + equipoId + '/jugadores', function(data) {
                var jugadoresHtml = '';
                if (data.jugadores.length > 0) {
                    jugadoresHtml += '<ul class="list-group">';
                    $.each(data.jugadores, function(index, jugador) {
                        jugadoresHtml += '<li class="list-group-item">' + jugador.nombre + ' ' + jugador.apellido_paterno + ' ' + jugador.apellido_materno + '</li>';
                    });
                    jugadoresHtml += '</ul>';
                } else {
                    jugadoresHtml = '<p>No hay jugadores en este equipo.</p>';
                }
                $('#jugadoresModalBody').html(jugadoresHtml);
            });
        });
    });
</script>

</body>
</html>
