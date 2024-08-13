<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administradores Baxxal</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for icons -->
    <link href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" rel="stylesheet">
    <!-- Custom CSS -->
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
        .card-custom {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.2s;
            background: linear-gradient(145deg, #ffffff, #e6e6e6);
            box-shadow: 6px 6px 12px #c5c5c5,
                        -6px -6px 12px #ffffff;
        }
        .card-custom:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        .card-body-custom {
            padding: 1.5rem;
        }
        .badge-custom {
            font-size: 0.8rem;
            padding: 0.5rem 1rem;
            border-radius: 30px;
        }
        .btn-custom {
            border-radius: 30px;
            font-weight: 500;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .text-primary-custom {
            color: #007bff !important;
        }
    </style>
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="header-title">
            {{ __('Administradores Baxxal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-primary-custom">Torneos Activos</h3>
                <div class="row">
                    <div class="col-md-4 mb-4">
                        <div class="card card-custom h-100">
                            <div class="card-body card-body-custom">
                                <h4 class="card-title font-semibold">Copa del Rey</h4>
                                <p class="card-text text-gray-600">Torneo nacional de España</p>
                                <p class="card-text text-gray-600">Categoría: Primera División</p>
                                <p class="card-text text-gray-600">Equipos: 16</p>
                                <span class="badge badge-custom bg-success text-light">Activo</span>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-custom">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card card-custom h-100">
                            <div class="card-body card-body-custom">
                                <h4 class="card-title font-semibold">Liga Profesional</h4>
                                <p class="card-text text-gray-600">Torneo de primera división de Argentina</p>
                                <p class="card-text text-gray-600">Categoría: Primera División</p>
                                <p class="card-text text-gray-600">Equipos: 20</p>
                                <span class="badge badge-custom bg-success text-light">Activo</span>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-custom">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card card-custom h-100">
                            <div class="card-body card-body-custom">
                                <h4 class="card-title font-semibold">Campeonato Paulista</h4>
                                <p class="card-text text-gray-600">Torneo de primera división de São Paulo, Brasil</p>
                                <p class="card-text text-gray-600">Categoría: Primera División</p>
                                <p class="card-text text-gray-600">Equipos: 20</p>
                                <span class="badge badge-custom bg-success text-light">Activo</span>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary btn-custom">Ver Detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
