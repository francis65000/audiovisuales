@extends('comunes.masterBackend')

@section('title', 'Nuevo Personal - Audiovisuales IES Jándula')

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
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($personal as $employee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->nombre }}</td>
                                    <td>{{ $employee->apellido }}</td>
                                    <td>{{ $employee->rol ? ucfirst($employee->rol->rol) : 'Sin rol asignado' }}</td>
                                    <!-- ACCIONES -->
                                    <td>
                                        <a href="{{ url('/empleado/' . $employee->id . '/ver') }}" class="btn btn-primary">
                                            <i class="fas fa-solid fa-pen-to-square"></i> Ver ficha
                                        </a>
                                        <a href="{{ url('/empleado/' . $employee->id . '/editar') }}"
                                            class="btn btn-warning">
                                            <i class="fas fa-solid fa-pen-to-square"></i> Modificar
                                        </a>
                                        <a href="{{ url('/empleado/' . $employee->id . '/eliminar') }}"
                                            class="btn btn-danger"
                                            onclick="return confirm('¿Estás seguro de eliminar este empleado?')">
                                            <i class="fas fa-solid fa-x"></i> Eliminar
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
