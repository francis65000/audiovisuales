@extends('comunes.masterBackend')

@section('title', 'Nuevo Usuario - Audiovisuales IES Jándula')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Nuevo Usuario</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <form action="{{ route('personal.store') }}" method="POST" onsubmit="return validarFormulario()">
                @csrf
                <div class="row">

                    <!-- Primera columna (50% del ancho) -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-solid fa-user-group"></i>
                                USUARIO CON ROL
                            </div>
                            <div class="card-body">

                                <div class="row mb-3">
                                    <div class="col-md-9">
                                        <label for="nombre" class="form-label">Nombre y apellidos del usuario</label>
                                        <input type="text" class="form-control form-control-sm" id="nombre"
                                            name="nombre" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="rol_id" class="form-label">Rol</label>
                                        <select class="form-select form-select-sm" id="rol_id" name="rol_id" required>
                                            <option value="" selected>Selecciona un rol</option>
                                            <option value="1">Jefaso</option>
                                            <option value="3">Colaborador</option>
                                            <option value="5">Lector</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <h6>Seleccionar el Aula</h6>
                                    <div class="col-md-4 col-xl-6">
                                        <label for="planta" class="form-label">Planta</label>
                                        <select class="form-select form-select-sm" id="planta" name="planta"
                                            onchange="mostrarAulas()">
                                            <option value="" selected>Selecciona una planta</option>
                                            <option value="planta0">Planta 0</option>
                                            <option value="planta1">Planta 1</option>
                                            <option value="planta2">Planta 2</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 col-xl-6">
                                        <label for="aula" class="form-label">Aula</label>
                                        <select class="form-select form-select-sm" id="aula" name="aula">
                                            <option value="" selected>Selecciona un aula</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Segunda columna (50% del ancho) -->
                    <div class="col-md-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-solid fa-key"></i>
                                USUARIO CON ACCESO AL SISTEMA
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Nombre y apellidos</label>
                                        <input type="text" class="form-control form-control-sm" id="name"
                                            name="name" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control form-control-sm" id="email"
                                            name="email" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h6>La contraseña debe de tener mayúsculas, minúsculas, números y caracteres especiales
                                    </h6>

                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control form-control-sm" id="password"
                                            name="password" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="password_confirmation" class="form-label">Repite la contraseña</label>
                                        <input type="password" class="form-control form-control-sm"
                                            id="password_confirmation" name="password_confirmation" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-solid fa-plus"></i> Crear</button>
                <a href="{{ url('/panel/personal/gestion-usuarios') }}" class="btn btn-danger">
                    <i class="fas fa-solid fa-xmark"></i> Cancelar
                </a>
            </form>
        </div>
    </main>
    <script>
        const aulas = {
            planta0: [
                "0.1",
                "0.2 NORTE",
                "0.2 SUR",
                "0.3",
                "0.5",
                "0.7",
                "0.9 PLASTICA",
                "0.11",
                "ED. NUEVO",
                "JEFATURA"
            ],
            planta1: [
                "1.2",
                "1.4",
                "1.6",
                "1.8 LAB CIEN",
                "1.10 TALLER TIC",
                "1.12",
                "1.1 ORIENTACION",
                "1.3",
                "1.5",
                "1.7",
                "1.9",
                "1.11 TECN ESO",
                "1.13 MEC IN",
                "1.15",
                "1.17",
                "1.19 CONVIVENCIA"
            ],
            planta2: [
                "2.2",
                "2.4",
                "2.6",
                "2.8",
                "2.10 AUDIOVISUALES",
                "2.12 LAB FYQ",
                "2.1 ORIENTACION",
                "2.3",
                "2.5",
                "2.7",
                "2.9 INFORMATICA",
                "2.11 TECN ESO",
                "2.13 MEC IN",
                "2.15",
                "2.17",
                "2.19",
                "2.21 EVANGELICA",
                "2.23 PT"
            ]
        };

        function mostrarAulas() {
            const plantaSeleccionada = document.getElementById('planta').value;
            const aulaSelect = document.getElementById('aula');

            // Limpiar las opciones del select de aulas
            aulaSelect.innerHTML = '<option value="" selected>Selecciona un aula</option>';

            // Comprobar si se ha seleccionado una planta válida
            if (plantaSeleccionada in aulas) {
                aulas[plantaSeleccionada].forEach(aula => {
                    const option = document.createElement('option');
                    option.value = aula;
                    option.textContent = aula;
                    aulaSelect.appendChild(option);
                });
            }
        }

        function validarFormulario() {
            const planta = document.getElementById('planta').value;
            const aulaSelect = document.getElementById('aula');

            // Si el select de aula está visible y no tiene un valor seleccionado
            if (planta && aulaSelect.value === "") {
                alert("Por favor, selecciona un aula.");
                return false; // Evitar el envío del formulario
            }

            return true; // Permitir el envío del formulario
        }
    </script>

@endsection
