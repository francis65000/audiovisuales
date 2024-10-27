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
            <h1 class="mt-4">Actualizar turnos</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-regular fa-calendar"></i>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h3>{{ $dia->dia }} {{ \Carbon\Carbon::parse($dia->fecha)->translatedFormat('d M Y') }}</h3>

                            <form action="{{ route('turnos.actualizar', $dia->id) }}" method="POST">
                                @csrf

                                @foreach ($turnosPorHora as $hora => $turno)
                                    <div class="mb-3 row">
                                        <!-- Columna para el encabezado del turno -->
                                        <div class="col-md-2">
                                            <div class="card rounded-0 shadow">
                                                <div class="card-body text-center fondo text-white">
                                                    <h5 for="hora{{ $hora }}"
                                                        class="form-label">{{ $hora }}º Hora</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Columna para el campo de entrada -->
                                        <div class="col-md-9">
                                            <div class="card-body text-center text-white">
                                                <input type="text" class="form-control" id="hora{{ $hora }}"
                                                name="turnos[{{ $hora }}]" value="{{ $turno->personal }}">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <button type="submit" class="btn btn-primary"><i class="fas fa-solid fa-floppy-disk"></i>
                                    Guardar Cambios</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger"><i
                                        class="fas fa-solid fa-xmark"></i> Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
                <!--HAY QUE QUITAR UN DIV AQUI IRIA PERO NO SE PUEDE PONER-->
            </div>
        </div>
    </main>

@endsection
