<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baxaal - Deportes de Fútbol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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

    </style>
</head>

<body>
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
                    <a class="nav-link" href="{{ route('public.torneos') }}" >
                        Torneos
                    </a>
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


    <div class="jumbotron">
        <h1 class="header__text--title">¡Vive la emoción del fútbol con Baxaal!</h1>

    </div>

    <main>
        <section id="carouselExampleIndicators" class="carousel slide daily-results container" data-bs-ride="carousel">
            <h2 class="header__text--h2">Partidos del Día</h2>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="team-info mx-auto">
                        <div class="team-header"f>
                            <div>
                                <img src="img/equipo1.png" alt="Equipo 1" class="logo-equipo">
                                <p class="team-names">Equipo 1</p>
                            </div>
                            <div>
                                <span class="score">3</span>
                            </div>
                            <div class="vs">VS</div>
                            <div>
                                <span class="score">2</span>
                            </div>
                            <div>
                                <img src="img/equipo2.png" alt="Equipo 2" class="logo-equipo">
                                <p class="team-names">Equipo 2</p>
                            </div>
                        </div>
                        <p class="match-details text-center">Detalles del Partido</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="team-info mx-auto">
                        <div class="team-header">
                            <div>
                                <img src="img/equipo3.png" alt="Equipo 3" class="logo-equipo">
                                <p class="team-names">Equipo 3</p>
                            </div>
                            <div>
                                <span class="score">1</span>
                            </div>
                            <div class="vs">VS</div>
                            <div>
                                <span class="score">4</span>
                            </div>
                            <div>
                                <img src="img/equipo4.png" alt="Equipo 4" class="logo-equipo">
                                <p class="team-names">Equipo 4</p>
                            </div>
                        </div>
                        <p class="match-details text-center">Detalles del Partido</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </section>

        <section class="  highlight-bg">
            <div class="container">
                <div class="header__text--h2">
                    <h2>Artículos Destacados</h2>
                </div>
                <ul class="cards">
                    <li class="cards__item">
                        <div class="card">
                            <div class="card__image" style="background-image: url('img/articulo1.jfif');"></div>
                            <div class="card__content">
                                <div class="card__title">Kylian Mbappé se une al Real Madrid</div>
                                <p class="card__text">Después de meses de especulación, Kylian Mbappé ha dejado el Paris Saint-Germain y se ha unido al Real Madrid en una transferencia libre. Este movimiento ha sido uno de los más esperados del verano, dado el talento y la trayectoria de Mbappé como uno de los mejores jugadores del mundo</p>
                            </div>
                        </div>
                    </li>
                    <li class="cards__item">
                        <div class="card">
                            <div class="card__image" style="background-image: url('img/articulo2.jfif');"></div>
                            <div class="card__content">
                                <div class="card__title">Gareth Southgate deja la selección de Inglaterra</div>
                                <p class="card__text">Gareth Southgate ha decidido dejar su puesto como entrenador de la selección inglesa. Southgate llevó a Inglaterra a las semifinales del Mundial 2018 y a la final de la Eurocopa 2020, y su salida ha generado una ola de reacciones en el mundo del fútbol.................................​</p>
                            </div>
                        </div>
                    </li>
                    <li class="cards__item">
                        <div class="card">
                            <div class="card__image" style="background-image: url('img/articulo3.webp');"></div>
                            <div class="card__content">
                                <div class="card__title">Principales transferencias del verano 2024</div>
                                <p class="card__text">Algunas de las transferencias más destacadas de este verano incluyen a Amadou Onana, quien se ha trasladado del Everton al Aston Villa por 59.35 millones de euros, y Joshua Zirkzee, quien ha sido adquirido por el Manchester United desde el Bologna por 42.5 millones de euros........</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="daily-results highlight-bg-bajo">
         
            <div class="container"> 
              <div class ="header__text--h2">
            <h2 >Resultados del Día</h2></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="result-card card">
                            <div class="card-body">
                                <h3>Semifinales • FIN</h3>
                                <p>ARG 2 - 0 CAN</p>
                                <a href="#" class="btn btn-secondary">Detalles del partido</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="result-card card">
                            <div class="card-body">
                                <h3>Semifinales • FIN</h3>
                                <p>URU 0 - 1 COL</p>
                                <a href="#" class="btn btn-secondary">Detalles del partido</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="result-card card">
                            <div class="card-body">
                                <h3>3° Puesto • FIN</h3>
                                <p>CAN 2(3) - 2(4) URU</p>
                                <a href="#" class="btn btn-secondary">Detalles del partido</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="result-card card">
                            <div class="card-body">
                                <h3>Final • FIN</h3>
                                <p>ARG 1 - 0 COL</p>
                                <a href="#" class="btn btn-secondary">Detalles del partido</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Baxaal. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
</body>

</html>