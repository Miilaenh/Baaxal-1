<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos y Entrenadores</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Roboto', sans-serif;
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
        .carousel-container {
            display: flex;
            justify-content: center;
            overflow: hidden;
            margin-bottom: 30px;
        }
        .carousel-item {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .team-card {
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .photo {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .info {
            margin-bottom: 10px;
            color: #555;
        }
        .players p {
            margin: 0;
            color: #333;
        }
        .carousel-controls {
            text-align: center;
            margin-top: 20px;
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
            margin-bottom: 30px;
            position: relative;
        }
        .search-box input {
            border-radius: 25px;
            border: 1px solid #ddd;
            padding: 10px 20px;
            width: 100%;
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
    
    <div class="section-header">
        <h4>Bienvenido a la Página de Equipos</h4>
        <div class="divider"></div>
        <p>Descubre los equipos y entrenadores más destacados del fútbol.</p>
    </div>

    <div class="container">
        <!-- Search bar -->
        <div class="search-box">
            <input type="text" placeholder="Buscar jugadores..." id="search">
            <i class="fas fa-search"></i>
        </div>

        <div class="carousel-container">
                <div class="carousel" id="carousel">
                    <!-- Team 1 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/4/47/FC_Barcelona_%28crest%29.svg" class="photo" alt="FC Barcelona">
                                <div class="body">
                                    <h5>FC Barcelona</h5>
                                    <p class="info">Entrenador: Xavi Hernández</p>
                                    <div class="players">
                                        <p>1. Marc-André ter Stegen</p>
                                        <p>2. Sergi Roberto</p>
                                        <p>3. Gerard Piqué</p>
                                        <p>4. Sergio Busquets</p>
                                        <p>5. Frenkie de Jong</p>
                                        <p>6. Ansu Fati</p>
                                        <p>7. Raphinha</p>
                                        <p>8. Ousmane Dembélé</p>
                                        <p>9. Robert Lewandowski</p>
                                        <p>10. Ferran Torres</p>
                                        <p>11. Memphis Depay</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 2 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/5/56/Real_Madrid_CF.svg" class="photo" alt="Real Madrid">
                                <div class="body">
                                    <h5>Real Madrid</h5>
                                    <p class="info">Entrenador: Carlo Ancelotti</p>
                                    <div class="players">
                                        <p>1. Thibaut Courtois</p>
                                        <p>2. Dani Carvajal</p>
                                        <p>3. David Alaba</p>
                                        <p>4. Luka Modrić</p>
                                        <p>5. Toni Kroos</p>
                                        <p>6. Karim Benzema</p>
                                        <p>7. Vinícius Júnior</p>
                                        <p>8. Eden Hazard</p>
                                        <p>9. Rodrygo</p>
                                        <p>10. Ferland Mendy</p>
                                        <p>11. Éder Militão</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 3 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/5/53/Bayern_Munich.svg" class="photo" alt="Bayern Munich">
                                <div class="body">
                                    <h5>Bayern Munich</h5>
                                    <p class="info">Entrenador: Julian Nagelsmann</p>
                                    <div class="players">
                                        <p>1. Manuel Neuer</p>
                                        <p>2. Joshua Kimmich</p>
                                        <p>3. Lucas Hernández</p>
                                        <p>4. Leon Goretzka</p>
                                        <p>5. Thomas Müller</p>
                                        <p>6. Leroy Sané</p>
                                        <p>7. Serge Gnabry</p>
                                        <p>8. Kingsley Coman</p>
                                        <p>9. Robert Lewandowski</p>
                                        <p>10. Joshua Zirkzee</p>
                                        <p>11. Benjamin Pavard</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 4 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/5/55/Juventus_FC_logo.svg" class="photo" alt="Juventus">
                                <div class="body">
                                    <h5>Juventus</h5>
                                    <p class="info">Entrenador: Massimiliano Allegri</p>
                                    <div class="players">
                                        <p>1. Gianluigi Buffon</p>
                                        <p>2. Leonardo Bonucci</p>
                                        <p>3. Matthijs de Ligt</p>
                                        <p>4. Paulo Dybala</p>
                                        <p>5. Federico Chiesa</p>
                                        <p>6. Adrien Rabiot</p>
                                        <p>7. Rodrigo Bentancur</p>
                                        <p>8. Weston McKennie</p>
                                        <p>9. Álvaro Morata</p>
                                        <p>10. Dejan Kulusevski</p>
                                        <p>11. Aaron Ramsey</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 5 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/c/cf/Manchester_United_FC_crest.svg" class="photo" alt="Manchester United">
                                <div class="body">
                                    <h5>Manchester United</h5>
                                    <p class="info">Entrenador: Erik ten Hag</p>
                                    <div class="players">
                                        <p>1. David de Gea</p>
                                        <p>2. Aaron Wan-Bissaka</p>
                                        <p>3. Harry Maguire</p>
                                        <p>4. Luke Shaw</p>
                                        <p>5. Bruno Fernandes</p>
                                        <p>6. Paul Pogba</p>
                                        <p>7. Marcus Rashford</p>
                                        <p>8. Jadon Sancho</p>
                                        <p>9. Cristiano Ronaldo</p>
                                        <p>10. Edinson Cavani</p>
                                        <p>11. Donny van de Beek</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 6 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/2/2c/Paris_Saint-Germain_F.C..svg" class="photo" alt="Paris Saint-Germain">
                                <div class="body">
                                    <h5>Paris Saint-Germain</h5>
                                    <p class="info">Entrenador: Christophe Galtier</p>
                                    <div class="players">
                                        <p>1. Gianluigi Donnarumma</p>
                                        <p>2. Marquinhos</p>
                                        <p>3. Sergio Ramos</p>
                                        <p>4. Marco Verratti</p>
                                        <p>5. Neymar</p>
                                        <p>6. Kylian Mbappé</p>
                                        <p>7. Lionel Messi</p>
                                        <p>8. Angel Di María</p>
                                        <p>9. Mauro Icardi</p>
                                        <p>10. Leandro Paredes</p>
                                        <p>11. Achraf Hakimi</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 7 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/6/6c/Arsenal_FC.svg" class="photo" alt="Arsenal">
                                <div class="body">
                                    <h5>Arsenal</h5>
                                    <p class="info">Entrenador: Mikel Arteta</p>
                                    <div class="players">
                                        <p>1. Bernd Leno</p>
                                        <p>2. Kieran Tierney</p>
                                        <p>3. Gabriel Magalhães</p>
                                        <p>4. Thomas Partey</p>
                                        <p>5. Granit Xhaka</p>
                                        <p>6. Bukayo Saka</p>
                                        <p>7. Pierre-Emerick Aubameyang</p>
                                        <p>8. Alexandre Lacazette</p>
                                        <p>9. Nicolas Pépé</p>
                                        <p>10. Emile Smith Rowe</p>
                                        <p>11. Martin Ødegaard</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 8 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/3/32/Chelsea_FC.svg" class="photo" alt="Chelsea">
                                <div class="body">
                                    <h5>Chelsea</h5>
                                    <p class="info">Entrenador: Graham Potter</p>
                                    <div class="players">
                                        <p>1. Édouard Mendy</p>
                                        <p>2. Reece James</p>
                                        <p>3. Kalidou Koulibaly</p>
                                        <p>4. Ben Chilwell</p>
                                        <p>5. N'Golo Kanté</p>
                                        <p>6. Jorginho</p>
                                        <p>7. Mason Mount</p>
                                        <p>8. Raheem Sterling</p>
                                        <p>9. Pierre-Emerick Aubameyang</p>
                                        <p>10. Christian Pulisic</p>
                                        <p>11. Hakim Ziyech</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 9 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/4/4b/AS_Monaco_logo.svg" class="photo" alt="AS Monaco">
                                <div class="body">
                                    <h5>AS Monaco</h5>
                                    <p class="info">Entrenador: Philippe Clement</p>
                                    <div class="players">
                                        <p>1. Alexander Nübel</p>
                                        <p>2. Ruben Aguilar</p>
                                        <p>3. Axel Disasi</p>
                                        <p>4. Guillermo Maripán</p>
                                        <p>5. Youssouf Fofana</p>
                                        <p>6. Aurélien Tchouaméni</p>
                                        <p>7. Sofiane Diop</p>
                                        <p>8. Kevin Volland</p>
                                        <p>9. Wissam Ben Yedder</p>
                                        <p>10. Myron Boadu</p>
                                        <p>11. Jean-Lucas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 10 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/e/e0/FC_Porto_logo.svg" class="photo" alt="FC Porto">
                                <div class="body">
                                    <h5>FC Porto</h5>
                                    <p class="info">Entrenador: Sérgio Conceição</p>
                                    <div class="players">
                                        <p>1. Diogo Costa</p>
                                        <p>2. João Mário</p>
                                        <p>3. Pepe</p>
                                        <p>4. Zaidu Sanusi</p>
                                        <p>5. Sergio Oliveira</p>
                                        <p>6. Mateus Uribe</p>
                                        <p>7. Luis Díaz</p>
                                        <p>8. Otávio</p>
                                        <p>9. Mehdi Taremi</p>
                                        <p>10. Evanilson</p>
                                        <p>11. Jesús Corona</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 11 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/7/7b/Benfica_logo.svg" class="photo" alt="Benfica">
                                <div class="body">
                                    <h5>Benfica</h5>
                                    <p class="info">Entrenador: Roger Schmidt</p>
                                    <div class="players">
                                        <p>1. Odysseas Vlachodimos</p>
                                        <p>2. Gilberto</p>
                                        <p>3. Nicolás Otamendi</p>
                                        <p>4. Enzo Fernández</p>
                                        <p>5. Julian Weigl</p>
                                        <p>6. Florentino Luís</p>
                                        <p>7. Rafa Silva</p>
                                        <p>8. Pizzi</p>
                                        <p>9. Darwin Núñez</p>
                                        <p>10. Luca Waldschmidt</p>
                                        <p>11. Haris Seferović</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 12 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/4/47/FC_Barcelona_%28crest%29.svg" class="photo" alt="FC Barcelona">
                                <div class="body">
                                    <h5>FC Barcelona B</h5>
                                    <p class="info">Entrenador: Rafael Márquez</p>
                                    <div class="players">
                                        <p>1. Iñaki Peña</p>
                                        <p>2. Alejandro Balde</p>
                                        <p>3. Marc Cucurella</p>
                                        <p>4. Gavi</p>
                                        <p>5. Pedri</p>
                                        <p>6. Ansu Fati</p>
                                        <p>7. Abde Ezzalzouli</p>
                                        <p>8. Nico González</p>
                                        <p>9. Lamine Yamal</p>
                                        <p>10. Estanis Pedrola</p>
                                        <p>11. Pablo Torre</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Team 13 -->
                    <div class="carousel-item">
                        <div class="team-card">
                            <div class="card">
                                <img src="https://upload.wikimedia.org/wikipedia/en/2/2a/FC_Schalke_04_logo.svg" class="photo" alt="FC Schalke 04">
                                <div class="body">
                                    <h5>FC Schalke 04</h5>
                                    <p class="info">Entrenador: Thomas Reis</p>
                                    <div class="players">
                                        <p>1. Alexander Schwolow</p>
                                        <p>2. Timo Becker</p>
                                        <p>3. Maya Yoshida</p>
                                        <p>4. Leo Greiml</p>
                                        <p>5. Rodrigo Zalazar</p>
                                        <p>6. Nikola Dovedan</p>
                                        <p>7. Simon Terodde</p>
                                        <p>8. Marius Bülter</p>
                                        <p>9. Kenan Karaman</p>
                                        <p>10. Mehmet Can Aydın</p>
                                        <p>11. Gervinho</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add more teams here -->
                </div>
            </div>
        
        <!-- Information Section -->
        <div class="info-section text-center">
            <h4>Estadísticas de Equipos</h4>
            <p>Consulta estadísticas detalladas sobre los equipos, incluyendo partidos ganados, perdidos y empates.</p>
        </div>

        <!-- Contact Section -->
        <div class="contact-section">
            <div class="container">
                <h4>Contacto</h4>
                <div class="divider"></div>
                <p>Si tienes alguna pregunta o necesitas más información, no dudes en ponerte en contacto con nosotros.</p>
                <form class="contact-form">
                    <input type="text" placeholder="Nombre" required>
                    <input type="email" placeholder="Correo Electrónico" required>
                    <textarea rows="4" placeholder="Mensaje" required></textarea>
                    <button type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        let currentIndex = 0;
        const items = $('#carousel .carousel-item');
        const itemCount = items.length;
        const intervalTime = 3000; // Tiempo en milisegundos para el auto-slide

        function showCurrent() {
            const itemToShow = Math.abs(currentIndex % itemCount);
            items.hide();
            items.eq(itemToShow).css('display', 'flex');
        }

        function nextSlide() {
            currentIndex++;
            showCurrent();
        }

        $('#nextBtn').on('click', function() {
            nextSlide();
        });

        $('#prevBtn').on('click', function() {
            currentIndex--;
            showCurrent();
        });

        // Auto-slide
        setInterval(nextSlide, intervalTime);

        showCurrent();
    });
</script>
</body>
</html>
