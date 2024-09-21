@extends('comunes.masterBackend')

@section('title', 'Inicio - Audiovisuales IES Jándula')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Fichas Personal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Relación de personal del departamento de audiovisuales
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-2"><i class="fas fa-solid fa-plus"></i> Nuevo</a>
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($personal as $employee)
                                <tr>
                                    <td>{{ $employee->nombre }}</td>
                                    <td>{{ $employee->apellido }}</td>
                                    <td>{{ $employee->rol ? ucfirst($employee->rol->rol) : 'Sin rol asignado' }}</td>

                                    <td><a href="#" class="btn btn-primary"><i class="fas fa-solid fa-pen-to-square"></i> Modificar</a> <a href="#" class="btn btn-danger"><i class="fas fa-solid fa-x"></i> Eliminar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
