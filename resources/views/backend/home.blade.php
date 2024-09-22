@extends('comunes.masterBackend')

@section('title', 'Inicio - DPTO Audiovisuales IES Jándula')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Inicio</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Personal</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Ver más</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Archivo Medios</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Ver más</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Panel de Tareas</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Ver más</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Semana Cultural</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">Ver más</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-solid fa-list-check"></i>
                            Tareas pendientes
                        </div>
                        <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                    </div>
                </div>
                <!--ACCESO DIRECTO A MEDIOS-->
                <div class="col-xl-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-brands fa-google-drive"></i>
                            Accesos directos medios
                        </div>
                        <div class="card-body">
                            <div class="card bg-success text-white mb-2">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <a class="text-white stretched-link text-decoration-none" href="#"><i
                                            class="FAS fa-solid fa-folder"></i> CURSO 2024 - 2025</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="card bg-success text-white mb-2">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <a class="text-white stretched-link text-decoration-none" href="#"><i
                                            class="FAS fa-solid fa-folder"></i> CURSO 2023 - 2024</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                            <div class="card bg-success text-white mb-2">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <a class="text-white stretched-link text-decoration-none" href="#"><i
                                            class="FAS fa-solid fa-folder"></i> CURSO 2022 - 2023</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
