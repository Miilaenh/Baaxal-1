<!-- resources/views/admin.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración - Resultados del Partido') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Aquí se muestran los resultados de los partidos -->
                <div id="matchesContainer" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Los partidos se generarán aquí con JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <!-- Modales se generarán aquí -->
    <div id="modalsContainer"></div>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js" defer></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tu script para generar los partidos y modales
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
                // Más partidos...
            ];

            const matchesContainer = document.getElementById('matchesContainer');
            const modalsContainer = document.getElementById('modalsContainer');

            matches.forEach((match, index) => {
                const matchCard = document.createElement('div');
                matchCard.className = 'bg-white shadow-lg rounded-lg p-4';
                matchCard.innerHTML = `
                    <h3 class="text-xl font-bold">${match.teams}</h3>
                    <div class="flex items-center justify-center mb-4">
                        <img src="${match.team1_logo}" alt="Logo ${match.teams.split(' vs ')[0]}" class="w-1/4 mr-2">
                        <span class="mx-2">vs</span>
                        <img src="${match.team2_logo}" alt="Logo ${match.teams.split(' vs ')[1]}" class="w-1/4 ml-2">
                    </div>
                    <button class="bg-blue-500 text-white py-2 px-4 rounded" data-bs-toggle="modal" data-bs-target="#statsModal${index}">Ver detalles</button>
                    <p class="mt-2 text-gray-600">Fecha: ${match.date}</p>
                    <p class="text-gray-600">Resultado: ${match.result}</p>
                `;
                matchesContainer.appendChild(matchCard);

                const statsModal = document.createElement('div');
                statsModal.id = `statsModal${index}`;
                statsModal.className = 'modal fade';
                statsModal.tabIndex = '-1';
                statsModal.innerHTML = `
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">${match.teams}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="flex items-center justify-center mb-4">
                                    <img src="${match.team1_logo}" alt="Logo ${match.teams.split(' vs ')[0]}" class="w-1/4 mr-4">
                                    <img src="${match.team2_logo}" alt="Logo ${match.teams.split(' vs ')[1]}" class="w-1/4 ml-4">
                                </div>
                                <table class="table-auto w-full">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2">Estadísticas del equipo</th>
                                            <th class="px-4 py-2">${match.teams.split(' vs ')[0]}</th>
                                            <th class="px-4 py-2">${match.teams.split(' vs ')[1]}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${Object.keys(match.stats).map(stat => `
                                            <tr>
                                                <td class="border px-4 py-2">${stat}</td>
                                                <td class="border px-4 py-2">${match.stats[stat][0]}</td>
                                                <td class="border px-4 py-2">${match.stats[stat][1]}</td>
                                            </tr>
                                        `).join('')}
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="bg-red-500 text-white py-2 px-4 rounded" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                `;
                modalsContainer.appendChild(statsModal);
            });
        });
    </script>
</x-app-layout>
