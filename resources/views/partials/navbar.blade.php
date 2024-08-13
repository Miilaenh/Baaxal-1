<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title></title>
</head>
<body>
<style>
        :root {
            --color-primary: #329D9C;
            --color-secondary: #FFFFFF;
            --color-tertiary: #9B0000;
            --color-hover: #b11717;
            --color-light-gray: #f4f4f4;
            --color-dark-gray: #333;
            --color-dark: #000000;
            --color-highlight-bg: #56C596;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--color-light-gray);
            margin: 0;
        }

        .jumbotron {
            background-image: url('img/fondoBalon.jpg');
            background-size: cover;
            height: 400px;
            background-position: center;
            color: var(--color-secondary);
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 20px;
            box-shadow: inset 0 0 50px rgba(0, 0, 0, 0.5);
        }

        .header__text--title {
            color: var(--color-secondary);
            font-size: 4em;
            margin: 0;
            font-family: 'Anton', sans-serif;
            animation: tituloAnimado 1s ease-out;
        }

        .header__text--h2 {
            color: var(--color-dark);
            font-size: 2em;
            margin: 0;
            font-family: 'Anton', sans-serif;
            animation: tituloAnimado 1s ease-out;
        }

        .header__text--subtitle {
            color: var(--color-tertiary);
            font-size: 1.5em;
            margin-top: 20px;
            animation: subtitleAnimado 2s ease-out;
        }

        @keyframes tituloAnimado {
            from {
                margin-left: -180%;
            }
            to {
                margin-left: 0;
            }
        }

        @keyframes subtitleAnimado {
            from {
                transform: translateY(500px);
            }
            to {
                transform: translateY(0);
            }
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

        .team-info {
            background-color: var(--color-secondary);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            border: 2px solid var(--color-primary);
        }

        .team-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .logo-equipo {
            max-width: 90px;
            height: auto;
        }

        .score {
            font-size: 3rem;
            font-weight: bold;
            color: var(--color-primary);
        }

        .vs {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--color-primary);
        }

        .team-names {
            font-size: 1.3rem;
            color: var(--color-primary);
            margin-top: 10px;
        }

        .match-details {
            font-size: 1.2rem;
            color: var(--color-primary);
        }

        .result-card {
            margin-bottom: 20px;
            border: 2px solid var(--color-primary);
            border-radius: 12px;
        }

        .result-card h3 {
            margin-bottom: 15px;
        }

        .result-card .card-body {
            background-color: var(--color-secondary);
            color: var(--color-primary);
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: var(--color-primary);
        }

        footer {
            background: var(--color-primary);
            color: var(--color-secondary);
            text-align: center;
            padding: 15px 0;
        }

        .container-live,
        .daily-results,
        .group-standings {
            padding: 40px 20px;
        }

        .group {
            background-color: var(--color-secondary);
            border: 2px solid var(--color-primary);
            border-radius: 12px;
        }

        .group ul {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .group li {
            padding: 10px 0;
            border-bottom: 1px solid var(--color-light-gray);
        }

        .group li:last-child {
            border-bottom: none;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            margin: 0;
            padding: 0;
            gap: 1rem;
        }

        .cards__item {
            flex: 1 1 calc(33.333% - 1rem);
            box-sizing: border-box;
        }

        .card {
            background-color: var(--color-secondary);
            border-radius: 0.25rem;
            box-shadow: 0 20px 40px -14px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            transition: transform 0.3s;
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card__image {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            height: 200px;
            width: 100%;
        }

        .card__content {
            padding: 1rem;
        }

        .card__title {
            color: var(--color-primary);
            font-size: 1.5rem;
            font-weight: 700;
        }

        .card__text {
            font-size: 1rem;
            line-height: 1.5;
            color: var(--color-dark-gray);
        }

        .navbar-arti {
            background-image: url(img/li.png);
            background-size: cover;
            background-position: center;
            color: #fff;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 23px 20px 20px 80px;
        }

        .navbar-left,
        .navbar-right {
            color: var(--color-secondary);
        }

        .navbar-menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar-item {
            margin-left: 20px;
        }

        .navbar-link {
            text-decoration: none;
            color: inherit;
            transition: color 0.8s;
            font-size: 1.3rem;
        }

        .navbar-link:hover {
            color: var(--color-tertiary);
        }

        .highlight-bg {
    background: linear-gradient(to bottom,var(--color-light-gray), var(--color-highlight-bg));
}

.highlight-bg-bajo {
    background: linear-gradient(to bottom, var(--color-highlight-bg),var(--color-light-gray));
}
section {
    padding: 80px 0;
}
.section-class {
    margin-bottom: 40px;
}

    </style></body>
<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="img/icono blanco.png" alt="Logo" height="40">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

</html>