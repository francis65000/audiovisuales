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

        .fixed-height {
            height: auto;
            /* Ajusta este valor según tus necesidades */
        }

        .tamanio-fijo {
            height: 70px;
            /* Ajusta este valor según tus necesidades */
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
                        <div class="col-md-1 m-0 p-0">
                            <div class="d-flex flex-column">
                                <!-- Icono de reloj -->
                                <div class="card m-0 p-0 rounded-0 shadow mb-1">
                                    <div class="card-body text-center p-3 fondo text-white">
                                        <i class="fas fa-clock fs-2"></i>
                                    </div>
                                </div>
                                @foreach (range(1, 6) as $hora)
                                    <div class="card rounded-0 shadow mb-1">
                                        <div class="card-body text-center p-3 fondo text-white">
                                            <h5 class="card-title">{{ $hora }}º Hora</h5>
                                        </div>
                                    </div>
                                @endforeach
                                
                            </div>
                        </div>
                        <!-- ESTRUCTURA DE DIAS SUPERIOR -->
                        @foreach ($dias as $index => $dia)
                            <div class="col-md-2 m-0 p-0">
                                <div class="d-flex flex-column">
                                    <!-- Tarjeta del Día -->
                                    <div class="card m-0 p-0 rounded-0 shadow mb-1">
                                        <div class="card-body text-center p-3 fondo text-white">
                                            <h5 class="card-title">
                                                {{ $dia->dia }} de
                                                {{ \Carbon\Carbon::parse($dia->fecha)->translatedFormat('d M') }}
                                            </h5>
                                        </div>
                                    </div>

                                    <!-- RELLENAR DE LA TABLA TURNOS -->
                                    @foreach ($turnos as $turno)
                                        @if ($dia->id == $turno->dia)
                                            <div class="card rounded-0 shadow mb-1">
                                                <div class="card-body text-center p-3 bg-light">
                                                @empty($turno->personal)
                                                    <h5 class="card-title">-</h5>
                                                @else
                                                    <h5 class="card-title">{{ $turno->personal }}</h5>
                                                @endempty
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                                <!-- Espacio en blanco si no hay turnos -->
                                @if (!$turnos->where('dia', $dia->id)->count())
                                    <div class="card rounded-0 shadow mb-1">
                                        <div class="card-body text-center p-3 border-bottom">
                                            <div class="alert alert-danger mb-0" role="alert">
                                                <h5 class="card-title mb-0">
                                                    <i class="fas fa-exclamation-triangle"></i> Sin turnos
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Botón de Editar -->
                                <div class="card m-0 p-0 rounded-0 shadow mb-1">
                                    <div class="card-body text-center p-3 fondo-warning text-white">
                                        <button class="btn btn-warning">
                                            <i class="fas fa-pen-to-square"></i> Editar
                                        </button>
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