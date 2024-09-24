@extends('comunes.masterBackend')

@section('title', 'Archivo Medios - Audiovisuales IES Jándula')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Archivo Medios</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Archivo fotográfico por cursos
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-primary mb-2"><i class="fas fa-solid fa-plus"></i> Nuevo</a>
                    @if ($mediosDrive->isEmpty())
                        <p>No hay medios disponibles.</p>
                    @else
                        @foreach ($mediosDrive as $medio)
                            <div class="card bg-success text-white mb-2">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <a class="text-white stretched-link text-decoration-none" href="{{$medio->url}}" target="_blank"><i
                                            class="fas fa-solid fa-folder"></i> {{$medio->anio}}</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </main>

@endsection
