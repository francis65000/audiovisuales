@extends('comunes.masterBackend')

@section('title', 'Nueva tarea - DPTO Audiovisuales IES Jándula')

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
            <h1 class="mt-4">Nueva Tarea</h1>
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

            <div class="card mb-4">
                <div class="card-header">
                    Nueva Tarea
                </div>
                <div class="card-body">
                    <form action="{{url('/panel/tareas/tasks')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="titulo" class="form-label">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="categoria" class="form-label">Categoría</label>
                                <select class="form-select" id="categoria" name="categoria" required>
                                    <option value="" disabled selected>Selecciona una categoría</option>
                                    <option value="bg-info">1- Planificación</option>
                                    <option value="bg-yellow">2- Otros</option>
                                    <option value="bg-orange">3- Graduaciones</option>
                                    <option value="bg-green">4- Eventos</option>
                                    <option value="bg-pink">5- Semana Cultural</option>
                                    <!-- Agrega más opciones según sea necesario -->
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="creado_por" class="form-label">Creado por</label>
                                <input type="text" class="form-control" id="creado_por" name="creado_por"
                                    value="{{ Auth::user()->name }}" readonly required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="creado_por" class="form-label">Estado</label>
                                <input type="text" class="form-control" id="estado" name="estado" value="1"
                                    readonly required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Tarea</button>
                    </form>
                </div>
            </div>

            <a href="{{ url('/panel/cuadrante-tareas') }}" class="btn btn-danger mb-2"><i
                    class="fas fa-solid fa-angle-left"></i> Volver</a>

        </div>
    </main>

@endsection
