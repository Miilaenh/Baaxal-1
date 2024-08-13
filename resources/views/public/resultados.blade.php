<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos del Torneo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #329D9C;
            --color-secondary: #FFFFFF;
            --color-terciary: #9B0000;
            --color-hover: #b11717;
            --color-light-gray: #f4f4f4;
            --color-dark-gray: #333;
            --color-dark: #000000;
            --color-highlight-bg: #56C596;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to bottom, #A2D5AB 0%, #56C596 50%, #329D9C 100%);
            margin: 0;
           
        }
        .transparent-section {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 12px;
        }
        .match-card {
            background: #ffffff;
            color: #333;
            border: 2px solid var(--color-primary);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }
        .stat-table th, .stat-table td {
            border-bottom: 1px solid #4a5568;
            text-align: center;
        }
        .modal-bg {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .modal-content {
            background-color: #FFFFFF;
        }
        .modal-header, .modal-footer {
            background-color: #F7FAFC;
        }
        .result-card {
            margin-bottom: 20px;
            border-radius: 12px;
        }

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

<div class="container ">
    <div class="transparent-section mt-4">
        <h2 class="text-center mb-4">Resultados de Partidos</h2>
        <div class="row" id="matchesContainer"></div>
    </div>
</div>

<!-- Modales se generarán aquí -->
<div id="modalsContainer"></div>

<script>
    const matches = [
        {
            teams: 'Marruecos vs Argentina',
            date: '26/3/19',
            result: '0 - 1',
            team1_logo: 'morocco.png',
            team2_logo: 'argentina.png',
            stats: {
                'Remates': [10, 13],
                'Remates al arco': [2, 2],
                'Posesión': ['57%', '43%'],
                'Pases': [394, 289],
                'Precisión de los pases': ['74%', '68%'],
                'Faltas': [22, 27],
                'Tarjetas amarillas': [4, 1],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [0, 4],
                'Tiros de esquina': [1, 5]
            }
        },
        {
            teams: 'Brasil vs Francia',
            date: '29/6/19',
            result: '2 - 2',
            team1_logo: 'brazil.png',
            team2_logo: 'france.png',
            stats: {
                'Remates': [15, 11],
                'Remates al arco': [5, 6],
                'Posesión': ['54%', '46%'],
                'Pases': [500, 350],
                'Precisión de los pases': ['80%', '70%'],
                'Faltas': [10, 12],
                'Tarjetas amarillas': [1, 2],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [2, 3],
                'Tiros de esquina': [7, 3]
            }
        },
        {
            teams: 'España vs Italia',
            date: '15/7/19',
            result: '1 - 3',
            team1_logo: 'spain.png',
            team2_logo: 'italy.png',
            stats: {
                'Remates': [12, 14],
                'Remates al arco': [3, 5],
                'Posesión': ['60%', '40%'],
                'Pases': [450, 250],
                'Precisión de los pases': ['82%', '75%'],
                'Faltas': [8, 9],
                'Tarjetas amarillas': [2, 1],
                'Tarjetas rojas': [0, 1],
                'Posición adelantada': [1, 0],
                'Tiros de esquina': [4, 6]
            }
        },
        {
            teams: 'Alemania vs Portugal',
            date: '20/7/19',
            result: '4 - 0',
            team1_logo: 'germany.png',
            team2_logo: 'portugal.png',
            stats: {
                'Remates': [20, 8],
                'Remates al arco': [10, 2],
                'Posesión': ['62%', '38%'],
                'Pases': [600, 220],
                'Precisión de los pases': ['88%', '60%'],
                'Faltas': [5, 10],
                'Tarjetas amarillas': [1, 3],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [3, 1],
                'Tiros de esquina': [9, 2]
            }
        },
        {
            teams: 'Inglaterra vs Suecia',
            date: '22/7/19',
            result: '2 - 1',
            team1_logo: 'england.png',
            team2_logo: 'sweden.png',
            stats: {
                'Remates': [18, 10],
                'Remates al arco': [7, 3],
                'Posesión': ['55%', '45%'],
                'Pases': [480, 300],
                'Precisión de los pases': ['81%', '72%'],
                'Faltas': [6, 8],
                'Tarjetas amarillas': [2, 1],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [1, 0],
                'Tiros de esquina': [4, 1]
            }
        },
        {
            teams: 'Bélgica vs Dinamarca',
            date: '30/7/19',
            result: '3 - 0',
            team1_logo: 'belgium.png',
            team2_logo: 'denmark.png',
            stats: {
                'Remates': [22, 5],
                'Remates al arco': [10, 2],
                'Posesión': ['65%', '35%'],
                'Pases': [550, 150],
                'Precisión de los pases': ['85%', '65%'],
                'Faltas': [7, 12],
                'Tarjetas amarillas': [1, 4],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [2, 1],
                'Tiros de esquina': [8, 2]
            }
        },
        {
            teams: 'Argentina vs Brasil',
            date: '1/8/19',
            result: '1 - 2',
            team1_logo: 'argentina.png',
            team2_logo: 'brazil.png',
            stats: {
                'Remates': [14, 16],
                'Remates al arco': [4, 5],
                'Posesión': ['50%', '50%'],
                'Pases': [400, 430],
                'Precisión de los pases': ['76%', '82%'],
                'Faltas': [10, 11],
                'Tarjetas amarillas': [1, 2],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [1, 1],
                'Tiros de esquina': [3, 4]
            }
        },
        {
            teams: 'Francia vs Italia',
            date: '10/8/19',
            result: '2 - 0',
            team1_logo: 'france.png',
            team2_logo: 'italy.png',
            stats: {
                'Remates': [15, 7],
                'Remates al arco': [5, 1],
                'Posesión': ['58%', '42%'],
                'Pases': [500, 200],
                'Precisión de los pases': ['79%', '68%'],
                'Faltas': [8, 9],
                'Tarjetas amarillas': [2, 1],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [1, 0],
                'Tiros de esquina': [5, 1]
            }
        },
        {
            teams: 'España vs Alemania',
            date: '15/8/19',
            result: '3 - 3',
            team1_logo: 'spain.png',
            team2_logo: 'germany.png',
            stats: {
                'Remates': [18, 15],
                'Remates al arco': [6, 6],
                'Posesión': ['62%', '38%'],
                'Pases': [450, 250],
                'Precisión de los pases': ['82%', '75%'],
                'Faltas': [5, 6],
                'Tarjetas amarillas': [1, 2],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [3, 2],
                'Tiros de esquina': [4, 5]
            }
        },
        {
            teams: 'Portugal vs Inglaterra',
            date: '20/8/19',
            result: '1 - 1',
            team1_logo: 'portugal.png',
            team2_logo: 'england.png',
            stats: {
                'Remates': [12, 10],
                'Remates al arco': [4, 4],
                'Posesión': ['55%', '45%'],
                'Pases': [300, 250],
                'Precisión de los pases': ['75%', '70%'],
                'Faltas': [6, 5],
                'Tarjetas amarillas': [1, 1],
                'Tarjetas rojas': [0, 0],
                'Posición adelantada': [2, 1],
                'Tiros de esquina': [3, 2]
            }
        }
    ];

    const matchesContainer = document.getElementById('matchesContainer');
    const modalsContainer = document.getElementById('modalsContainer');

    matches.forEach((match, index) => {
        const matchCard = document.createElement('div');
        matchCard.className = 'col-12 col-sm-6 col-md-4 col-lg-3 mb-4';
        matchCard.innerHTML = `
            <div class="card match-card">
                <div class="card-body text-center">
                    <h5 class="card-title">${match.teams}</h5>
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <img src="${match.team1_logo}" alt="Logo ${match.teams.split(' vs ')[0]}" class="w-25 mr-2">
                        <span class="text-muted mx-2">vs</span>
                        <img src="${match.team2_logo}" alt="Logo ${match.teams.split(' vs ')[1]}" class="w-25 ml-2">
                    </div>
                    <button class="btn btn-link p-0" onclick="openModal(${index})">Ver detalles</button>
                    <p class="text-muted mb-1">Fecha: ${match.date}</p>
                    <p class="text-muted">Resultado: ${match.result}</p>
                </div>
            </div>
        `;
        matchesContainer.appendChild(matchCard);

        const statsModal = document.createElement('div');
        statsModal.id = `statsModal${index}`;
        statsModal.className = 'modal fade';
        statsModal.innerHTML = `
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">${match.teams}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex justify-content-center align-items-center mb-4">
                            <img src="${match.team1_logo}" alt="Logo ${match.teams.split(' vs ')[0]}" class="w-25 mr-4">
                            <img src="${match.team2_logo}" alt="Logo ${match.teams.split(' vs ')[1]}" class="w-25 ml-4">
                        </div>
                        <table class="table table-striped stat-table">
                            <thead>
                                <tr>
                                    <th>Estadísticas del equipo</th>
                                    <th>${match.teams.split(' vs ')[0]}</th>
                                    <th>${match.teams.split(' vs ')[1]}</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${Object.keys(match.stats).map(stat => `
                                    <tr>
                                        <td>${stat}</td>
                                        <td>${match.stats[stat][0]}</td>
                                        <td>${match.stats[stat][1]}</td>
                                    </tr>
                                `).join('')}
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        `;
        modalsContainer.appendChild(statsModal);
    });

    function openModal(index) {
        const modal = new bootstrap.Modal(document.getElementById(`statsModal${index}`));
        modal.show();
    }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
