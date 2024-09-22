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

        .bg-greeen {
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
            <h1 class="mt-4">Fichas Personal</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>

            <div class="row text-center">
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-info text-white mb-4">
                        <div class="card-body text-dark fw-bold">PLANIFICACIÓN</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-yellow text-white mb-4">
                        <div class="card-body text-dark fw-bold">OTROS</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-orange text-white mb-4">
                        <div class="card-body text-dark fw-bold">GRADUACIONES</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-greeen text-white mb-4">
                        <div class="card-body text-dark fw-bold">EVENTOS</div>
                    </div>
                </div>
                <div class="col-xl-2 col-md-6">
                    <div class="card bg-pink text-white mb-4">
                        <div class="card-body text-dark fw-bold">SEMANA CULTURAL</div>
                    </div>
                </div>
            </div>

            <a href="#" class="btn btn-primary mb-2"><i class="fas fa-solid fa-plus"></i> Nueva tarea</a>

            <!--PLANIFICADAS-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-solid fa-list-check"></i>
                    PLANIFICADAS
                </div>
                <div class="card-body">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-info text-white mb-4">
                            <div class="card-body text-dark">
                                <h4>Reunion Departamento 11:00h</h4>
                                <p>Reunion para comentar temas de inicio de curso</p>

                                <a href="#" class="btn btn-success mb-2"><i class="fas fa-solid fa-arrows-spin"></i>
                                    En proceso</a>
                                <a href="#" class="btn btn-warning mb-2"><i class="fas fa-solid fa-pen-to-square"></i>
                                    Modificar</a>
                                <a href="#" class="btn btn-danger mb-2"><i class="fas fa-solid fa-trash"></i>
                                    Eliminar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--EN PROCESO-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-solid fa-bars-progress"></i>
                    EN PROCESO
                </div>
                <div class="card-body">


                </div>
            </div>
            <!--TERMINADAS-->
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-solid fa-square-check"></i>
                    TERMINADAS
                </div>
                <div class="card-body">


                </div>
            </div>

            <a href="#" class="btn btn-danger mb-2"><i class="fas fa-solid fa-x"></i> Vaciar tabla</a>
        </div>
    </main>

@endsection
