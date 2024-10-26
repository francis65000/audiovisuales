@extends('comunes.masterBackend')

@section('title', 'Comunicaciones - Audiovisuales IES Jándula')

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

        .mi-mensaje {
            background-color: #8ffdff;
            color: black;
            text-align: right;
            margin-left: auto;
            margin-right: 0;
            margin-bottom: 1%;
            border-radius: 10px;
            width: fit-content;
            max-width: 90%;

        }

        .otro-mensaje {
            background-color: #ceff8f;
            color: black;
            text-align: left;
            margin-right: auto;
            margin-left: 0;
            margin-bottom: 1%;
            border-radius: 10px;
            width: fit-content;
            max-width: 90%;

        }
    </style>
    <main>
        <div class="container-fluid px-4">
            <!--<h1 class="mt-4">Comunicaciones</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>-->
            <div class="card mb-4 mt-3">
                <div class="card-header">
                    <i class="fas fa-regular fa-comment"></i>
                    Chat
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="card p-4" style="height: 600px; overflow-y: auto;">
                            <!-- Ajusta la altura según sea necesario -->
                            <!-- Bucle con los mensajes -->
                            @php
                                $ultimaFecha = null; // Inicializar la variable para la última fecha
                            @endphp

                            @foreach ($chats as $mensaje)
                                @php
                                    // Parsear la fecha y la hora
                                    $fechaMensaje = \Carbon\Carbon::parse($mensaje->fecha . ' ' . $mensaje->hora);
                                    // Formatear la fecha para mostrar
                                    $fechaFormateada = $fechaMensaje->format('d M Y'); // Formato: "20 Oct 2024"
                                @endphp

                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- Mostrar la fecha si es diferente de la última fecha mostrada -->
                                        @if ($ultimaFecha !== $fechaFormateada)
                                            <div class="text-center my-2">
                                                <button class="btn btn-info"
                                                    style="background-color: #b3d7ff; border: none;">
                                                    {{ $fechaFormateada }}
                                                </button>
                                            </div>
                                            @php
                                                $ultimaFecha = $fechaFormateada; // Actualizar la última fecha mostrada
                                            @endphp
                                        @endif

                                        <div
                                            class="card p-2 {{ $mensaje->nombre_usuario == Auth::user()->name ? 'mi-mensaje' : 'otro-mensaje' }}">
                                            <p class="fw-bold">{{ $mensaje->nombre_usuario }}</p>
                                            <p class="fs-5">{{ $mensaje->mensaje }}</p>
                                            <p class="">{{ $fechaMensaje->format('H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <!-- Columna para el campo de texto -->
                        <div class="col-md-6 mb-3">
                            <input type="text" id="nombre_usuario" name="nombre_usuario" value="{{ Auth::user()->name }}"
                                class="form-control" hidden>
                        </div>
                        <div class="col-md-11 mb-3">
                            <label for="campo_texto" class="form-label">Mensaje</label>
                            <input type="text" id="campo_texto" name="campo_texto" value="{{ old('campo_texto') }}"
                                class="form-control" required>
                        </div>

                        <!-- Columna para el botón -->
                        <div class="col-md-1 d-flex align-items-end mb-3">
                            <button type="submit" class="btn btn-primary w-100">Enviar <i class="fas fa-solid fa-right-long"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
