@extends('comunes.masterBackend')

@section('title', 'Cuadrante tareas - DPTO Audiovisuales IES Jándula')

@section('content')

    <style>
        .bg-orange {
            background-color: orange;
            /* O el código hexadecimal que prefieras, por ejemplo: #ff9800 */
        }

        .bg-yellow {
            background-color: yellow;
            /* O el código hexadecimal que prefieras, por ejemplo: #ff9800 */
        }

        .bg-green {
            background-color: #92D050;
            /* O el código hexadecimal que prefieras, por ejemplo: #ff9800 */
        }

        .bg-pink {
            background-color: #E8588F;
            /* O el código hexadecimal que prefieras, por ejemplo: #ff9800 */
        }
    </style>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cuadrante de Tareas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <!--LEYENDA DE COLORES-->
            <h3 class="mt-4 text-right">Leyenda de Colores</h3>
            <div class="row text-center">
                <div class="col-12">
                    <div class="row justify-content-center">
                        <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                            <div class="card bg-info h-100">
                                <div class="card-body d-flex align-items-center justify-content-center fw-bold">
                                    PLANIFICACIÓN
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                            <div class="card bg-yellow h-100">
                                <div class="card-body d-flex align-items-center justify-content-center fw-bold">
                                    OTROS
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                            <div class="card bg-orange h-100">
                                <div class="card-body d-flex align-items-center justify-content-center fw-bold">
                                    GRADUACIONES
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                            <div class="card bg-green h-100">
                                <div class="card-body d-flex align-items-center justify-content-center fw-bold">
                                    EVENTOS
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-6 mb-4">
                            <div class="card bg-pink h-100">
                                <div class="card-body d-flex align-items-center justify-content-center fw-bold">
                                    SEMANA CULTURAL
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--AQUI EMPIEZAN LAS TABLAS-->
            <a href="{{ url('/panel/tareas/crear') }}" class="btn btn-primary mb-2"><i class="fas fa-solid fa-plus"></i>
                Nueva tarea</a>
            @php
                use Illuminate\Support\Facades\DB;

                // Obtener el nombre del usuario autenticado
                $usuarioNombre = Auth::user()->name;

                // Consultar la tabla 'personal' para obtener el rol del usuario
                $rolUsuario = DB::table('personal')->where('nombre', $usuarioNombre)->value('rol_id');
            @endphp
            <!--PLANIFICADAS//////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-solid fa-list-check"></i>
                    PLANIFICADAS
                </div>
                <div class="card-body">
                    @if ($tareasPanificadas->isEmpty())
                        <p>No hay tareas disponibles.</p>
                    @else
                        <div class="row">
                            @foreach ($tareasPanificadas as $tarea)
                                <div class="col-xl-3 col-md-6">
                                    <div class="card text-white mb-4 {{ $tarea->categoria }}">
                                        <div class="card-body text-dark">
                                            <h5 class="text-uppercase">{{ $tarea->titulo }}</h5>
                                            <p>Apertura: {{ \Carbon\Carbon::parse($tarea->created_at)->format('d-m-Y') }}
                                            </p>
                                            <p>{{ $tarea->descripcion }}</p>
                                            <p><i>Creador: {{ $tarea->creado_por }}</i>
                                                <br>
                                                <i>Actualizado: {{ $tarea->actualizado_por }}</i>
                                            </p>
                                            <form action="{{ route('tasks.updateEstado', $tarea->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success mb-2"
                                                    onclick="return confirm('¿Estás seguro de que deseas cambiar el estado a En proceso?');">
                                                    <i class="fas fa-solid fa-arrows-spin"></i> En proceso
                                                </button>
                                            </form>
                                            <a href="#" class="btn btn-warning mb-2"><i
                                                    class="fas fa-solid fa-pen-to-square"></i>
                                                Modificar</a>
                                            @if (Auth::check() && $rolUsuario === 1)
                                                <form action="{{ route('tasks.destroy', $tarea->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mb-2"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?');">
                                                        <i class="fas fa-solid fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!--EN PROCESO//////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-solid fa-bars-progress"></i>
                    EN PROCESO
                </div>
                <div class="card-body">
                    @if ($tareasEnProceso->isEmpty())
                        <p>No hay tareas disponibles.</p>
                    @else
                        <div class="row">
                            @foreach ($tareasEnProceso as $tarea)
                                <div class="col-xl-3 col-md-6">
                                    <div class="card text-white mb-4 {{ $tarea->categoria }}">
                                        <div class="card-body text-dark">
                                            <h5 class="text-uppercase">{{ $tarea->titulo }}</h5>
                                            <p>Apertura: {{ \Carbon\Carbon::parse($tarea->created_at)->format('d-m-Y') }}
                                            </p>
                                            <p>{{ $tarea->descripcion }}</p>
                                            <p><i>Creador: {{ $tarea->creado_por }}</i>
                                                <br>
                                                <i>Actualizado: {{ $tarea->actualizado_por }}</i>
                                            </p>
                                            <form action="{{ route('tasks.cerrarTarea', $tarea->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success mb-2"
                                                    onclick="return confirm('¿Estás seguro de que deseas cambiar el estado a Terminada?');">
                                                    <i class="fas fa-solid fa-arrows-spin"></i> Terminada
                                                </button>
                                            </form>
                                            <a href="#" class="btn btn-warning mb-2"><i
                                                    class="fas fa-solid fa-pen-to-square"></i>
                                                Modificar</a>
                                            @if (Auth::check() && $rolUsuario === 1)
                                                <form action="{{ route('tasks.destroy', $tarea->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mb-2"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?');">
                                                        <i class="fas fa-solid fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            <!--TERMINADAS///////////////////////////////////////////////////////////////////////////////////////////////////////////-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-solid fa-square-check"></i>
                    TERMINADAS
                </div>
                <div class="card-body">
                    @if ($tareasTerminadas->isEmpty())
                        <p>No hay tareas disponibles.</p>
                    @else
                        <div class="row">
                            @foreach ($tareasTerminadas as $tarea)
                                <div class="col-xl-3 col-md-6">
                                    <div class="card text-white mb-4 {{ $tarea->categoria }}">
                                        <div class="card-body text-dark">
                                            <h5 class="text-uppercase">{{ $tarea->titulo }}</h5>
                                            <p>Apertura: {{ \Carbon\Carbon::parse($tarea->created_at)->format('d-m-Y') }}
                                            </p>
                                            <p>{{ $tarea->descripcion }}</p>
                                            <p><i>Creador: {{ $tarea->creado_por }}</i>
                                                <br>
                                                <i>Actualizado: {{ $tarea->actualizado_por }}</i>
                                            </p>
                                            @if (Auth::check() && $rolUsuario === 1)
                                                <form action="{{ route('tasks.destroy', $tarea->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mb-2"
                                                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta tarea?');">
                                                        <i class="fas fa-solid fa-trash"></i> Eliminar
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
            @if (Auth::check() && $rolUsuario === 1)
                <h5>Vaciar Cuadrante de tareas</h5>
                <h5 class="btn btn-danger fw-bold">¡IMPORTANTE!</h5>
                <p>Vaciar el cuadrante de tareas es un proceso que no se puede deshacer, se eliminarán todas las tareas del
                    cuadrante.</p>
                <a href="#" class="btn btn-danger mb-2"
                    onclick="return confirm('¿Estás seguro de que deseas vaciar todo el cuadrante?');"><i
                        class="fas fa-solid fa-trash"></i> Eliminar todo</a>
            @endif
        </div>
    </main>

@endsection
