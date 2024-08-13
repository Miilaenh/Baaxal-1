<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
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
            --color-highlight-bg: #56C596;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--color-light-gray);
            margin: 0;
        }

        .header-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 40px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
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

        .highlight-bg {
            background: linear-gradient(to bottom, var(--color-light-gray), var(--color-highlight-bg));
        }

        .highlight-bg-bajo {
            background: linear-gradient(to bottom, var(--color-highlight-bg), var(--color-light-gray));
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

        .round-header {
            text-align: center;
            margin-top: 30px;
        }

        .round-header h4 {
            color: #28a745;
        }

        .match-container {
            border: 1px solid #dee2e6;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .match-container .row {
            align-items: center;
        }

        .match-container p {
            margin: 0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
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
                        <a class="nav-link" href="{{ url('/') }}">Inicio</a>
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



        <div class="container mt-5">
            <div class="round-header">
                <h4>Jornada 1</h4>
            </div>

            <div class="match-container">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <p>Arsenal</p>
                        <span class="mx-2">vs</span>
                        <p>Manchester United</p>
                    </div>
                    <div class="col-3 text-end">
                        <p>12 Aug, 2023</p>
                    </div>
                    <div class="col-3 text-end">
                        <p>15:00</p>
                    </div>
                    <div class="col-12 text-end">
                        <p>Emirates Stadium</p>
                    </div>
                </div>
            </div>

            <div class="match-container">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <p>Chelsea</p>
                        <span class="mx-2">vs</span>
                        <p>Tottenham Hotspur</p>
                    </div>
                    <div class="col-3 text-end">
                        <p>13 Aug, 2023</p>
                    </div>
                    <div class="col-3 text-end">
                        <p>17:30</p>
                    </div>
                    <div class="col-12 text-end">
                        <p>Stamford Bridge</p>
                    </div>
                </div>
            </div>

            <div class="round-header">
                <h4>Jornada 2</h4>
            </div>

            <div class="match-container">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <p>Manchester City</p>
                        <span class="mx-2">vs</span>
                        <p>Liverpool</p>
                    </div>
                    <div class="col-3 text-end">
                        <p>19 Aug, 2023</p>
                    </div>
                    <div class="col-3 text-end">
                        <p>20:00</p>
                    </div>
                    <div class="col-12 text-end">
                        <p>Etihad Stadium</p>
                    </div>
                </div>
            </div>
        </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
