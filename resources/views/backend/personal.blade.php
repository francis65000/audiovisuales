@extends('comunes.masterBackend')

@section('title', 'Personal - Audiovisuales IES Jándula')

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
                    <div class="row">
                        @foreach ($personal as $employee)
                            <div class="col-6 mb-4"> <!-- Mantener en 2 columnas -->
                                <div class="card bg-info">
                                    <div class="card-body">
                                        <!-- Información del empleado -->
                                        <h3 class="card-title">#{{ $loop->iteration }} {{ $employee->nombre }} {{ $employee->apellido }}</h3>
                                        
                                        <div class="row">
                                            <div class="col-4">
                                                <p class="card-text">
                                                    <strong>Rol:</strong> {{ $employee->rol ? ucfirst($employee->rol->rol) : 'Sin rol asignado' }}
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <p class="card-text">
                                                    <strong>Aula de referencia:</strong> {{ $employee->aula }}
                                                </p>
                                            </div>
                                            <div class="col-4">
                                                <a href="{{ url('/empleado/' . $employee->id . '/editar') }}" class="btn btn-warning me-2">
                                                    <i class="fas fa-solid fa-pen"></i> Modificar
                                                </a>
                                                <a href="{{ url('/empleado/' . $employee->id . '/eliminar') }}" class="btn btn-danger"
                                                   onclick="return confirm('¿Estás seguro de eliminar este empleado?')">
                                                    <i class="fas fa-solid fa-trash"></i> Eliminar
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                        
                </div>
            </div>
        </div>
    </main>

@endsection
