<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Categorías') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <!-- Encabezado de la sección -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-medium text-gray-900">
                        Lista de Categorías
                    </h3>
                    <button id="openModalBtn" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition duration-300 ease-in-out transform hover:scale-105">Agregar Categoría</button>
                </div>

                <!-- Tabla de categorías -->
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                    ID
                                </th>
                                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <!-- Puedes agregar más columnas según tus necesidades -->
                                <th class="px-6 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Iteración sobre las categorías obtenidas de la API -->
                            @forelse ($categorias as $categoria)
                                <tr class="hover:bg-gray-50 transition duration-200 ease-in-out">
                                    <td class="px-6 py-4 border-b border-gray-200 text-sm">
                                        {{ $categoria['id'] }}
                                    </td>
                                    <td class="px-6 py-4 border-b border-gray-200 text-sm">
                                        {{ $categoria['nombre'] }}
                                    </td>
                                    <!-- Agregar más columnas según necesites -->
                                    <td class="px-6 py-4 border-b border-gray-200 text-sm flex space-x-4">
                                        <!-- Enlaces para editar y eliminar -->
                                        <button class="text-blue-500 hover:text-blue-700 transition duration-300 ease-in-out edit-btn" data-id="{{ $categoria['id'] }}" data-nombre="{{ $categoria['nombre'] }}">Editar</button>
                                        <form action="{{ route('categorias.delete', $categoria['id']) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition duration-300 ease-in-out" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <!-- Mensaje de no hay categorías -->
                                <tr>
                                    <td colspan="3" class="px-6 py-4 border-b border-gray-200 text-center text-sm text-gray-600">
                                        No hay categorías disponibles.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- The Create Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 class="form-header" id="modal-title">Crear Categoría</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="modal-form" action="{{ route('categorias.create') }}" method="POST">
                @csrf
                <input type="hidden" id="modal-id" name="id">
                <div class="form-group">
                    <label for="modal-nombre">Nombre de la Categoría:</label>
                    <input type="text" id="modal-nombre" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="button" id="modal-submit">Crear</button>
                </div>
            </form>
        </div>
    </div>

    <!-- The Update Modal -->
    <div id="myModal2" class="modal">
        <div class="modal-content">
            <span class="close2">&times;</span>
            <h2 class="form-header" id="modal-title2">Actualizar Categoría</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="modal-form2" method="PUT">
                @csrf
                @method('PUT')
                <input type="hidden" id="modal-id2" name="id">
                <div class="form-group">
                    <label for="modal-nombre2">Nombre de la Categoría:</label>
                    <input type="text" id="modal-nombre2" name="nombre" value="{{ old('nombre') }}" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="button" id="modal-submit2">Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #e0f7fa, #e0f2f1);
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 2rem 0;
            background: #004d40;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 2rem auto;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 2rem;
        }

        .form-header {
            text-align: center;
            font-size: 2rem;
            color: #004d40;
            margin-bottom: 1rem;
        }

        .alert-danger {
            background: #ffebee;
            border: 1px solid #f44336;
            color: #d32f2f;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .alert-danger ul {
            list-style-type: none;
            padding: 0;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #004d40;
        }

        .form-group input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .button {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #004d40;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            text-align: center;
        }

        .button:hover {
            background: #00695c;
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

<script>
        // Get the modal
        var modal = document.getElementById("myModal");
        var modal2 = document.getElementById("myModal2");

        // Get the button that opens the modal
        var btn = document.getElementById("openModalBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        var span2 = document.getElementsByClassName("close2")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
            document.getElementById('modal-title').textContent = 'Crear Categoría';
            document.getElementById('modal-submit').textContent = 'Crear';
            document.getElementById('modal-form').action = '{{ route("categorias.create") }}';
            document.getElementById('modal-id').value = '';
            document.getElementById('modal-nombre').value = '';
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        span2.onclick = function() {
            modal2.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            } else if (event.target == modal2) {
                modal2.style.display = "none";
            }
        }

        // Edit button functionality
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.onclick = function() {
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-nombre');
                modal2.style.display = "block";
                document.getElementById('modal-title2').textContent = 'Actualizar Categoría';
                document.getElementById('modal-submit2').textContent = 'Actualizar';
                document.getElementById('modal-form2').action = '/categorias/update/' + id;
                document.getElementById('modal-id2').value = id;
                document.getElementById('modal-nombre2').value = nombre;
            }
        });
    </script>
</x-app-layout>
