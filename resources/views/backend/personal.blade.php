@extends('comunes.masterBackend')

@section('title', 'Personal - Audiovisuales IES Jándula')

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
    </style>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Personal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Relación de personal del departamento de audiovisuales
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($personal as $employee)
                            @php
                                // Busca el rol correspondiente por rol_id
                                $rol = $roles->firstWhere('id', $employee->rol_id);

                            @endphp

                            <div class="col-6 mb-4"> <!-- Mantener en 2 columnas -->
                                <div class="card {{ $rol->rol ?? 'default-role-class' }}">
                                    <!-- Clase por defecto si no hay rol -->
                                    <div class="card-body">
                                        <!-- Información del empleado -->
                                        <h3 class="card-title"><i class="fas fa-solid fa-circle-user"></i> {{ $loop->iteration }} {{ $employee->nombre }}</h3>

                                        <div class="row">
                                            <div class="col-3">
                                                <p class="card-text">
                                                    <strong>Rol:</strong>
                                                    {{ $rol ? ucfirst($rol->rol) : 'Sin rol asignado' }}
                                                </p>
                                            </div>
                                            <div class="col-3">
                                                <p class="card-text">
                                                    <strong>Aula Ref:</strong> {{ $employee->aula ? $employee->aula : 'No asignada' }}
                                                </p>
                                            </div>
                                            <div class="col-6">
                                                <p class="card-text">
                                                    @foreach ($users as $user)
                                                        <!--comprobar que el campo nombre de una tabla y otra coincide-->
                                                        @if ($user->name == $employee->nombre)
                                                            <strong>Email:</strong> {{ $user->email ?? 'Sin email asignado' }}
                                                        @endif
                                                    @endforeach
                                                </p>
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
