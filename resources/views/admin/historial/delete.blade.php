@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <!-- Encabezado -->
                <div class="card-header bg-danger text-white text-center py-3 rounded-top-4">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Confirmar eliminación de cita
                    </h3>
                </div>

                <!-- Cuerpo -->
                <div class="card-body bg-white p-4">
                    <div class="alert alert-warning fw-bold text-center">
                        ¿Estás seguro que deseas eliminar este historial clínico?
                        <br>
                        <span class="text-danger">Esta acción no se puede deshacer.</span>
                    </div>

                    <div class="mb-3">
                        <strong>Paciente:</strong>
                        {{ $historials->paciente->apellidos }} {{ $historials->paciente->nombres }}
                        <br>
                        <strong>Fecha:</strong>
                        {{ \Carbon\Carbon::parse($historials->fecha_visita)->format('d/m/Y') }}
                        <br>
                        <strong>Descripción:</strong>
                        <div class="border rounded-3 p-3 bg-light mt-2">{!! $historials->detalle !!}</div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('admin/historial') }}" class="btn btn-secondary shadow-sm">
                            <i class="bi bi-arrow-left me-1"></i> Cancelar
                        </a>

                        <form action="{{ route('admin.historial.destroy', $historials->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger shadow-sm">
                                <i class="bi bi-trash me-1"></i> Confirmar eliminación
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
