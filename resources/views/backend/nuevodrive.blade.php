@extends('comunes.masterBackend')

@section('title', 'Nueva Carpeta - Audiovisuales IES Jándula')

@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Nueva Carpeta</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Departamento de Audiovisuales</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    Nueva carpeta
                </div>
                <div class="card-body">
                    <form action="{{ route('medios.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <!-- Primera columna -->
                            <div class="col-md-4">
                                <label for="anio" class="form-label">Curso académico <b class="btn btn-success">Ejemplo:  2023-2024</b></label>
                                <input type="text" class="form-control form-control-sm" id="anio" name="anio" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="url" class="form-label">Url</label>
                                <input type="text" class="form-control form-control-sm" id="url" name="url" required>
                            </div>
                        </div>
                
                        <!-- Botón de envío -->
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
            <!--boton de volver-->
            <a href="{{ url('/panel/medios-drive') }}" class="btn btn-danger">
                <i class="fas fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>
    </main>

@endsection
