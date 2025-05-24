@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-info text-white text-center py-3">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-calendar-week me-2"></i> Información del Horario
                    </h3>
                </div>

                <!-- Cuerpo de la tarjeta -->
                <div class="card-body bg-light p-4">
                    <div class="row g-3">
                        <!-- Día, Doctor y Consultorio en una fila -->
                        <div class="col-md-4">
                            <label class="fw-bold">Día:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-info text-white">
                                    <i class="bi bi-calendar-day"></i>
                                </span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm" value="{{ $horario->dia }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold">Doctor:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-person-check"></i>
                                </span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm" value="{{ $horario->doctor->nombre }} {{ $horario->doctor->apellido }} - {{ $horario->doctor->especialidad }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="fw-bold">Consultorio:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white">
                                    <i class="bi bi-building"></i>
                                </span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm" value="{{ $horario->consultorio->nombre }} - {{ $horario->consultorio->ubicacion }}" readonly>
                            </div>
                        </div>

                        <!-- Hora de inicio y Hora final en una fila -->
                        <div class="col-md-6">
                            <label class="fw-bold">Hora de inicio:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white">
                                    <i class="bi bi-clock"></i>
                                </span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm" value="{{ $horario->hora_inicio }}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="fw-bold">Hora final:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-danger text-white">
                                    <i class="bi bi-clock-history"></i>
                                </span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm" value="{{ $horario->hora_fin }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie de la tarjeta -->
                <div class="card-footer text-center bg-light">
                    <a href="{{ url('admin/horarios') }}" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-arrow-left me-2"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
