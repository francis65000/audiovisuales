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

        .fondo-warning {
            background-color: #ffc107;
        }

        .fondo-danger {
            background-color: #dc3545;
        }

        .fixed-height {
            height: auto;
            /* Ajusta este valor según tus necesidades */
        }

        .tamanio-fijo {
            height: 70px;
            /* Ajusta este valor según tus necesidades */
        }

        .atencion {
            color: #842029 !important;
            /* Color del texto */
            background-color: #f8d7da !important;
            /* Color de fondo */
            border-color: #f5c2c7;
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
                    
                    <!--SACAR LA FECHA QUE HAY GUARDADA -->
                    <p class="badge fondo fs-5 m-0"><i class="fas fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($dias[0]->fecha)->translatedFormat('Y') }}</p>
                </div>
                <div class="card-body">
                    @php
                        use Illuminate\Support\Facades\DB;

                        // Obtener el nombre del usuario autenticado
                        $usuarioNombre = Auth::user()->name;

                        // Consultar la tabla 'personal' para obtener el rol del usuario
                        $rolUsuario = DB::table('personal')->where('nombre', $usuarioNombre)->value('rol_id');
                    @endphp
                    <div class="row">
                        <div class="col-md-2 m-0 p-0">
                            <div class="d-flex flex-column">
                                <!-- Icono de reloj -->
                                <div class="card m-0 p-0 rounded-0 shadow mb-1">
                                    <div class="card-body text-center p-3 fondo text-white">
                                        <i class="fas fa-clock fs-4"></i>
                                    </div>
                                </div>
                                @foreach (range(1, 6) as $hora)
                                    <div class="card rounded-0 shadow mb-1">
                                        <div class="card-body text-center p-3 fondo text-white">
                                            <h5 class="card-title">{{ $hora }}º Hora</h5>
                                        </div>
                                    </div>
                                @endforeach
                                @if (Auth::check() && $rolUsuario === 1)
                                <div class="card m-0 p-0 rounded-0 shadow mb-1">
                                    <div class="card-body text-center p-3 fondo-danger text-white">
                                        <form action="{{ route('vaciar.personal') }}" method="POST" style="display:inline;"
                                            onsubmit="return confirm('¿Estás seguro de que deseas vaciar el cuadrante entero? Esta acción no se puede deshacer.');">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onsubmit="return confirm('¿Estás seguro de que deseas vaciar el cuadrante entero? Esta acción no se puede deshacer.');">
                                                <i class="fas fa-solid fa-trash-can"></i> Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <!-- ESTRUCTURA DE DIAS SUPERIOR -->
                        @foreach ($dias as $index => $dia)
                            <div class="col-md-2 m-0 p-0">
                                <div class="d-flex flex-column">
                                    <!-- Tarjeta del Día -->
                                    <div class="card m-0 p-0 rounded-0 shadow mb-1">
                                        <div class="card-body text-center p-3 fondo text-white">
                                            <h6 class="card-title">
                                                {{ $dia->dia }}
                                                {{ \Carbon\Carbon::parse($dia->fecha)->translatedFormat('d M') }}
                                            </h6>
                                        </div>
                                    </div>

                                    <!-- RELLENAR DE LA TABLA TURNOS -->
                                    @foreach ($turnos as $turno)
                                        @if ($dia->id == $turno->dia)
                                            @if (!empty($turno->personal) && $turno->personal !== '-')
                                                <div class="card rounded-0 shadow mb-1">
                                                    <div class="card-body text-center p-3 bg-light">

                                                        <h5 class="card-title">{{ $turno->personal }}</h5>

                                                    </div>
                                                </div>
                                            @endif
                                            @if ($turno->personal === '-')
                                                <div class="card rounded-0 shadow mb-1 atencion">
                                                    <div class="card-body text-center p-3 bg-light atencion">
                                                        <h5 class="card-title atencion">
                                                            <i class="fas fa-exclamation-triangle"></i> No asignada
                                                        </h5>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach

                                    <!-- Espacio en blanco si no hay turnos -->
                                    @if (!$turnos->where('dia', $dia->id)->count() || $turno->personal === '')
                                        <div class="card rounded-0 shadow mb-1">
                                            <div class="card-body text-center p-3 border-bottom">
                                                <div class="alert alert-danger mb-0" role="alert">
                                                    <h5 class="card-title mb-0">
                                                        <i class="fas fa-solid fa-circle-exclamation"></i> Sin turnos
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Botón de Editar -->
                                    <div class="card m-0 p-0 rounded-0 shadow mb-1">
                                        <div class="card-body text-center p-3 fondo-warning text-white">
                                            <a href="{{ route('turnos.editar', $dia->id) }}" class="btn btn-warning">
                                                <i class="fas fa-pen-to-square"></i> Editar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--HAY QUE QUITAR UN DIV AQUI IRIA PERO NO SE PUEDE PONER-->
                </div>
            </div>
        </div>
    </main>

@endsection
