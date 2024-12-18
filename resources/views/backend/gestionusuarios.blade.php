@extends('comunes.masterBackend')

@section('title', 'Gestión Usuarios - Audiovisuales IES Jándula')

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
            <h1 class="mt-4">Gestión Usuarios</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="card-body">
                <div class="row">
                    <!-- Segunda columna, puedes añadir otra tarjeta o contenido aquí -->
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-header">
                                <i class="fas fa-solid fa-key"></i>
                                Personal con acceso al sistema
                            </div>
                            <div class="card-body">
                                <a href="{{url('/panel/personal/crear')}}" class="btn btn-success mb-4">
                                    <i class="fas fa-solid fa-user-plus"></i> Nuevo
                                </a>
                                @foreach ($personal as $employee)
                                    @foreach ($users as $user)
                                        @if ($user->name == $employee->nombre)
                                            @php
                                                // Busca el rol correspondiente por rol_id
                                                $rol = $roles->firstWhere('id', $employee->rol_id);
                                            @endphp

                                            <div class="col-12 mb-4">
                                                <!-- Mantener en 1 columna dentro de la tarjeta general -->
                                                <div class="card {{ $rol->rol ?? 'default-role-class' }}">
                                                    <div class="card-body">
                                                        <!-- Información del empleado -->
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <div class="col-12 d-flex align-items-center">
                                                                    <h4 class="card-title mb-0">
                                                                        <i class="fas fa-solid fa-circle-user"></i> {{ $employee->nombre }}
                                                                    </h4>
                                                                </div>
                                                                <div class="col-12 d-flex align-items-center mt-2">
                                                                    <div class="col-2 d-flex align-items-center">
                                                                        <p class="card-text mb-0">
                                                                            <strong>Rol:</strong>
                                                                            {{ $rol ? ucfirst($rol->rol) : 'Sin rol asignado' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-4 d-flex align-items-center">
                                                                        <p class="card-text mb-0">
                                                                            <strong>Aula Ref:</strong>
                                                                            {{ $employee->aula ? $employee->aula : 'No asignada' }}
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-6 d-flex align-items-center">
                                                                        <p class="card-text mb-0">
                                                                            <strong>Email:</strong>
                                                                            {{ $user->email }}
                                                                        </p>
                                                                    </div>
                                                                </div> 
                                                            </div>
                                                            <div class="col-2 d-flex justify-content-end align-items-center">
                                                                <!-- Botones para pasar la id  del empleado a la ruta de editar -->
                                                                <a href="{{url('/panel/personal/editar/'.$employee->id)}}" class="btn btn-warning me-2">
                                                                    <i class="fas fa-solid fa-user-edit"></i> Modificar
                                                                </a>

                                                                <form action="{{ route('personal.destroy', ['id' => $employee->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger"><i class="fas fa-solid fa-user-times"></i> Eliminar </button>
                                                                </form>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection
