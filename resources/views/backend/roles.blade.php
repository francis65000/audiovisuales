@extends('comunes.masterBackend')

@section('title', 'Roles - Audiovisuales IES Jándula')

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
                    Roles y accesos de usuarios a la plataforma
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($roles as $rol)
                            <div class="col-4 mb-4"> <!-- Mantener en 2 columnas -->
                                <div class="card {{ $rol->rol }}">
                                    <div class="card-body ">
                                        <!-- Información del empleado -->
                                        <h3 class="card-title">Rol {{ ucfirst($rol->rol) }}</h3>

                                        <div class="row">
                                            @if ($rol->rol == 'jefaso')
                                                <div class="col-6">
                                                    <h6>Permisos de Administrador</h6>

                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Gestionar usuarios<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Acceso a medios<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Acceso a roles<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Modificar cuadrante
                                                    tareas<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Modificar cuadrante semana
                                                    cultural

                                                </div>
                                                <div class="col-6">
                                                    <h6>Permisos de Lectura</h6>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Acceso a medios<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Ver cuadrante tareas<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Ver cuadrante semana
                                                    cultural
                                                </div>
                                            <!--COLABORADOR-->
                                            @elseif ($rol->rol == 'colaborador')
                                                <div class="col-6">
                                                    <h6>Permisos de Administrador</h6>

                                                    <i class="fas fa-solid fa-circle-xmark text-danger"></i> Gestionar usuarios<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Acceso a medios<br>
                                                    <i class="fas fa-solid fa-circle-xmark text-danger"></i> Acceso a roles<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Modificar cuadrante
                                                    tareas<br>
                                                    <i class="fas fa-solid fa-circle-xmark text-danger"></i> Modificar cuadrante semana
                                                    cultural

                                                </div>
                                                <div class="col-6">
                                                    <h6>Permisos de Lectura</h6>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Acceso a medios<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Ver cuadrante tareas<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Ver cuadrante semana
                                                    cultural
                                                </div>
                                            <!--LECTOR-->
                                            @elseif ($rol->rol == 'lector')
                                                <div class="col-6">
                                                    <h6>Permisos de Administrador</h6>

                                                    <i class="fas fa-solid fa-circle-xmark text-danger"></i> Gestionar usuarios<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Acceso a medios<br>
                                                    <i class="fas fa-solid fa-circle-xmark text-danger"></i> Acceso a roles<br>
                                                    <i class="fas fa-solid fa-circle-xmark text-danger"></i> Modificar cuadrante
                                                    tareas<br>
                                                    <i class="fas fa-solid fa-circle-xmark text-danger"></i> Modificar cuadrante semana
                                                    cultural

                                                </div>
                                                <div class="col-6">
                                                    <h6>Permisos de Lectura</h6>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Acceso a medios<br>
                                                    <i class="fas fa-solid fa-circle-xmark text-danger"></i> Ver cuadrante tareas<br>
                                                    <i class="fas fa-solid fa-circle-check text-success"></i> Ver cuadrante semana
                                                    cultural
                                                </div>
                                            @endif
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
