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
                    <a href="{{ url('/panel/medios-drive/crear') }}" class="btn btn-primary mb-2"><i
                            class="fas fa-solid fa-plus"></i> Nuevo</a>
                    @if ($mediosDrive->isEmpty())
                        <p>No hay medios disponibles.</p>
                    @else
                        <div class="row">
                            @foreach ($mediosDrive as $medio)
                                <div class="col-xl-3 col-md-6">
                                    <div class="card bg-success text-white mb-2">
                                        <div class="card-body d-flex align-items-center justify-content-between">
                                            <a class="text-white  text-decoration-none fs-4" href="{{ $medio->url }}"
                                                target="_blank">
                                                <i class="fas fa-solid fa-folder fa-3x mb-2"></i>
                                                <br> CURSO {{ $medio->anio }}
                                            </a>
                                            <!--boton de eliminar-->
                                        </div>
                                        <div class="card-footer d-flex align-items-center justify-content-between">
                                            <form action="{{ route('medios.destroy', $medio->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta carpeta?');">
                                                    <i class="fas fa-solid fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                            <div class="small text-white">
                                                <a class="text-white  text-decoration-none"
                                                    href="{{ $medio->url }}" target="_blank">
                                                    <i class="fas fa-solid fa-arrow-up-right-from-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>

@endsection
