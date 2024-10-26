@extends('comunes.masterBackend')

@section('title', 'Cuadrante de turnos - Audiovisuales IES Jándula')

@section('content')

    <style>
        .jefaso {
            background-color: #CFB53B;
            /* O el código hexadecimal que prefieras, por ejemplo: #ff9800 */
        }

        .colaborador {
            background-color: #BEBEBE;
            /* O el código hexadecimal que prefieras, por ejemplo: #ff9800 */
        }

        .lector {
            background-color: #CD7F32;
            /* O el código hexadecimal que prefieras, por ejemplo: #ff9800 */
        }

        .fondo {
            background-color: #cd33cb;
        }
    </style>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cuadrante de turnos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    ---
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead class="thead-light fondo">
                                <tr>
                                    <th class="d-flex justify-content-center fs-3">
                                        <i class="fas fa-solid fa-clock"></i>
                                    </th>
                                    <th class="header-cell">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i>
                                        </button>
                                        LUNES 20 FEB
                                    </th>
                                    <th class="header-cell">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i>
                                        </button>
                                        LUNES 20 FEB
                                    </th>
                                    <th class="header-cell">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i>
                                        </button>
                                        LUNES 20 FEB
                                    </th>
                                    <th class="header-cell">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i>
                                        </button>
                                        LUNES 20 FEB
                                    </th>
                                    <th class="header-cell">
                                        <button class="btn btn-success btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i>
                                        </button>
                                        LUNES 20 FEB
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Juan Pérez</td>
                                    <td>juan@example.com</td>
                                    <td>28</td>
                                    <td>Madrid</td>
                                    <td>Desarrollador</td>
                                </tr>
                                <tr>
                                    <td class="text-center">2</td>
                                    <td>Ana Gómez</td>
                                    <td>ana@example.com</td>
                                    <td>32</td>
                                    <td>Barcelona</td>
                                    <td>Diseñadora</td>
                                </tr>
                                <tr>
                                    <td class="text-center">3</td>
                                    <td>Luis Martínez</td>
                                    <td>luis@example.com</td>
                                    <td>45</td>
                                    <td>Valencia</td>
                                    <td>Gerente</td>
                                </tr>
                                <tr class="fw-bold fondo">
                                    <td class="text-center fs-3">R</td>
                                    <td class="text-center fs-3">E</td>
                                    <td class="text-center fs-3">C</td>
                                    <td class="text-center fs-3">R</td>
                                    <td class="text-center fs-3">E</td>
                                    <td class="text-center fs-3">O</td>
                                </tr>
                                <tr>
                                    <td class="text-center">5</td>
                                    <td>Pedro Sánchez</td>
                                    <td>pedro@example.com</td>
                                    <td>29</td>
                                    <td>Bilbao</td>
                                    <td>Programador</td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td>Laura Ruiz</td>
                                    <td>laura@example.com</td>
                                    <td>27</td>
                                    <td>Zaragoza</td>
                                    <td>Investigadora</td>
                                </tr>
                                <tr>
                                    <td class="text-center">6</td>
                                    <td>Laura Ruiz</td>
                                    <td>laura@example.com</td>
                                    <td>27</td>
                                    <td>Zaragoza</td>
                                    <td>Investigadora</td>
                                </tr>
                                <tr class="text-center">
                                    <td></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i> Editar día
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i> Editar día
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i> Editar día
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i> Editar día
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm">
                                            <i class="fas fa-solid fa-pen-to-square"></i> Editar día
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
