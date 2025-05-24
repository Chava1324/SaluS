@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <!-- Encabezado -->
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-calendar-check-fill me-2"></i> Detalles de la cita
                    </h3>
                </div>

                <!-- Cuerpo del detalle -->
                <div class="card-body bg-white p-4">
                    <div class="row g-4">
                        <!-- Paciente -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Paciente:
                            </label>
                            <div class="form-control bg-light">
                                {{ $historials->paciente->id }} - {{ $historials->paciente->apellidos }} {{
                                $historials->paciente->nombres }}
                            </div>
                        </div>

                        <!-- Fecha -->
                        <div class="col-md-6">
                            <label class="form-label fw-bold">
                                Fecha de la cita:
                            </label>
                            <div class="form-control bg-light">
                                {{ \Carbon\Carbon::parse($historials->fecha_visita)->format('d/m/Y') }}
                            </div>
                        </div>

                        <br>
                        <hr style="border: 1px solid #007bff;">

                        <!-- Descripción -->
                        <div class="col-12">
                            <label class="form-label fw-bold">
                                <i class="bi bi-file-earmark-text me-1"></i>Descripción de la cita:
                            </label>
                            <div class="border rounded-3 p-3 bg-light" style="min-height: 150px;">
                                {!! $historials->detalle !!}
                            </div>
                        </div>
                    </div>

                    <!-- Botón volver -->
                    <div class="d-flex justify-content-end mt-4">
                        <a href="{{ url('admin/historial') }}" class="btn btn-outline-primary shadow-sm">
                            <i class="bi bi-arrow-left me-1"></i> Volver al historial
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection