@extends('comunes.masterBackend')

@section('title', 'Inicio - DPTO Audiovisuales IES Jándula')

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
            <h1 class="mt-4">Inicio</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <h1>{{$cuentaUsuarios}}</h1>
                            Usuarios
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="{{url('/panel/personal')}}">Personal</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">
                            <h1>{{$cuentaMedios}}</h1>
                            Carpetas de Medios
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="{{url('/panel/medios-drive')}}">Archivo Medios</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <h1>{{$cuentaTareas}}</h1>
                            Tareas
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="{{ url('/panel/cuadrante-tareas') }}">Panel de Tareas</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <h1>0</h1>
                            Eventos
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link text-decoration-none" href="#">Semana Cultural</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-solid fa-list-check"></i>
                            Tareas pendientes
                        </div>
                        <div class="card-body">
                            @if ($tareasPendientes->isEmpty())
                                <p>No hay tareas disponibles.</p>
                            @else
                                <div class="row">
                                    @foreach ($tareasPendientes as $tarea)
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card text-white mb-4 {{ $tarea->categoria }}">
                                                <div class="card-body text-dark">
                                                    <h5 class="text-uppercase">{{ $tarea->titulo }}</h5>
                                                    <p>Apertura:
                                                        {{ \Carbon\Carbon::parse($tarea->created_at)->format('d-m-Y') }}</p>
                                                    <p>{{ $tarea->descripcion }}</p>
                                                    <p><i>Creador: {{ $tarea->creado_por }}</i>
                                                        <br>
                                                        <i>Actualizado: {{ $tarea->actualizado_por }}</i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            Tareas pendientes: {{ $conteoTareasPendientes }}
                            <a class="btn btn-primary stretched-link" href="{{ url('/panel/cuadrante-tareas') }}">Panel de
                                tareas <i class="fas fa-angle-right"></i></a>

                        </div>
                    </div>
                </div>
                <!--ACCESO DIRECTO A MEDIOS-->
                <div class="col-xl-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-brands fa-google-drive"></i>
                            Accesos directos medios
                        </div>
                        <div class="card-body">
                            @foreach ($mediosDrive as $medio)
                                <div class="card bg-success text-white mb-2">
                                    <div class="card-body d-flex align-items-center justify-content-between">
                                        <a class="text-white stretched-link text-decoration-none" href="{{$medio->url}}" target="_blank"><i
                                                class="FAS fa-solid fa-folder"></i> CURSO {{$medio->anio}}</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
