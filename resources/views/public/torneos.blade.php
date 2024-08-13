<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Torneos Públicos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #329D9C;
            --color-secondary: #FFFFFF;
            --color-tertiary: #9B0000;
            --color-hover: #b11717;
            --color-light-gray: #f4f4f4;
            --color-dark-gray: #333;
            --color-dark: #000000;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--color-light-gray);
            margin: 0;
        }

        .navbar-custom {
            background-color: var(--color-primary);
            padding: 1rem;
        }

        .navbar-custom .navbar-nav .nav-link {
            color: var(--color-secondary);
            font-size: 1.1rem;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            font-size: 1.5rem;
            color: var(--color-secondary);
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .navbar-toggler {
            border: none;
        }

        .navbar-toggler-icon {
            background-color: var(--color-secondary);
        }

        .dropdown-menu-custom {
            background-color: var(--color-secondary);
        }

        .dropdown-item-custom {
            color: var(--color-primary);
        }

        .dropdown-item-custom:hover {
            background-color: var(--color-primary) !important;
            color: var(--color-secondary);
        }

        .btn-custom {
            background-color: var(--color-primary);
            color: var(--color-secondary);
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: var(--color-hover);
        }

        .card {
            border: none;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-body {
            background-color: var(--color-secondary);
            color: var(--color-dark-gray);
            border: 2px solid var(--color-primary);
            border-radius: 12px;
        }

        footer {
            background: var(--color-primary);
            color: var(--color-secondary);
            text-align: center;
            padding: 15px 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="../img/icono blanco.png" alt="Logo" height="40">
            Baxaal
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.torneos') }}">Torneos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.partidos') }}">Calendario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('public.resultados') }}">Resultados</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="btn btn-outline-warning me-2">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="btn btn-warning">Registrar</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container my-5">
    <div class="bg-white shadow-lg rounded-lg p-4">
        @if ($torneos)
            <div class="row">
                @foreach ($torneos as $torneo)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            @if ($torneo['logo'])
                                <img src="{{ Storage::url($torneo['logo']) }}" alt="{{ $torneo['nombre'] }}" class="card-img-top img-fluid p-3 mx-auto d-block" style="height: 75px; width: 75px;">
                            @else
                                <div class="card-img-top d-flex align-items-center justify-content-center p-3 bg-light mx-auto" style="height: 75px; width: 75px;">
                                    <span class="text-muted">N/A</span>
                                </div>
                            @endif
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $torneo['nombre'] }}</h5>
                                <p class="card-text text-muted text-center">
                                    <i class="far fa-calendar-alt"></i> {{ $torneo['fecha_inicio'] }} - {{ $torneo['fecha_fin'] }}
                                </p>
                                <p class="card-text text-muted text-center">
                                    <i class="fas fa-map-marker-alt"></i> {{ $torneo['ubicacion'] }}
                                </p>
                                <p class="card-text text-center">{{ $torneo['descripcion'] }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('public.resultados') }}" class="btn btn-custom btn-sm">
                                    Ver más detalles
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-muted">
                <p>No hay torneos disponibles.</p>
            </div>
        @endif
    </div>
</div>

<footer>
    <p>&copy; 2024 Baxaal. Todos los derechos reservados.</p>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
