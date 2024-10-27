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
                        <div class="card p-4" id="chatContainer" style="height: 600px; overflow-y: auto;">
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
                                            <p class="mb-0">{{ $fechaMensaje->format('H:i') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!--En caso de que no haya mensajes que diga que no hay mensajes-->
                            @if (count($chats) == 0)
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="text-center">
                                            <div class="card alert alert-danger p-3" style="display: inline-block;">
                                                <h2 class="fs-1"><i class="fas fa-solid fa-circle-exclamation"></i></h2>
                                                <h3 class="fs-3">No hay mensajes</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <form action="{{ route('chat.send') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!--INPUTS QUE NO SE VEN-->
                            <div class="col-md-6 mb-3">
                                <input type="text" id="nombre_usuario" name="nombre_usuario"
                                    value="{{ Auth::user()->name }}" class="form-control" hidden>
                                <input type="date" id="fecha" name="fecha" class="form-control"
                                    value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" hidden>
                                <input type="time" id="hora" name="hora" class="form-control" value=""
                                    hidden>
                            </div>
                        </div>
                        <!--INPUTS QUE SE VEN-->
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="campo_texto" class="form-label">Mensaje</label>
                                <input type="text" id="mensaje" name="mensaje" value="{{ old('campo_texto') }}"
                                    class="form-control" required>
                            </div>

                            <!-- Columna para el botón -->
                            <div class="col-md-2 d-flex align-items-end mb-3">
                                <button type="submit" class="btn btn-primary w-100">Enviar <i
                                        class="fas fa-solid fa-circle-chevron-right"></i> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @php
                use Illuminate\Support\Facades\DB;

                // Obtener el nombre del usuario autenticado
                $usuarioNombre = Auth::user()->name;

                // Consultar la tabla 'personal' para obtener el rol del usuario
                $rolUsuario = DB::table('personal')->where('nombre', $usuarioNombre)->value('rol_id');
            @endphp
            @if (Auth::check() && $rolUsuario === 1)
                <div>
                    <!--VACIAR EL CHAT ENTERO CON CONFIRMACION POR ALERT-->
                    <form action="{{ route('chat.delete') }}" method="POST">
                        @csrf
                        <!--texto-->
                        <h5>Vaciar Chat</h5>
                        <h5 class="btn btn-danger fw-bold">¡IMPORTANTE!</h5>
                        <p>Vaciar el chat es un proceso que no se puede deshacer, se eliminarán todos los mensajes.</p>
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('¿Estás seguro de que quieres vaciar el chat? Esta acción no se puede deshacer.');"><i
                                class="fas fa-solid fa-trash-can"></i> Vaciar chat</button>
                    </form>
                </div>
            @endif
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const chatContainer = document.getElementById("chatContainer");
            chatContainer.scrollTop = chatContainer.scrollHeight;
        });
    </script>
@endsection
