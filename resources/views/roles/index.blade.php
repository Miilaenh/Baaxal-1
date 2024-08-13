<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .header-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #343a40;
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Lista de Usuarios</h1>

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de Usuarios -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nombre</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Rol</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b">
                            @foreach ($user->roles as $role)
                                {{ $role->name }}@if (!$loop->last), @endif
                            @endforeach
                        </td>
                        <td class="py-2 px-4 border-b">
                        <form action="{{ route('admin.updateRole', $user->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('PUT')
    <select name="role" required>
        <option value="">Seleccionar Rol</option>
        <option value="organizador">Organizador</option>
        <option value="administrador">Administrador</option>
    </select>
    <button type="submit" class="text-blue-500 hover:text-blue-700">Actualizar Rol</button>
</form>

                            <a href="#" class="text-red-500 hover:text-red-700 ml-2" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">Eliminar</a>
                            <form id="delete-form-{{ $user->id }}" action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
