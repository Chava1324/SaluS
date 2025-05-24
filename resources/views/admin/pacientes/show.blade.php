@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado -->
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="fw-bold text-uppercase fs-5 mb-0">
                        <i class="bi bi-person-circle me-2"></i> Información del Paciente
                    </h3>

                </div>

                <!-- Cuerpo -->
                <div class="collapse show" id="userData">
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Nombre y Apellidos -->
                            <div class="col-12">
                                <label class="fw-bold">Nombre Completo:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person-fill"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->nombres }} {{ $paciente->apellidos }}" readonly>
                                </div>
                            </div>

                            <!-- CURP y NSS -->
                            <div class="col-md-6">
                                <label class="fw-bold">CURP:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="bi bi-card-list"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->curp }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold">NSS:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="bi bi-hospital"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->nss }}" readonly>
                                </div>
                            </div>

                            <!-- Fecha de Nacimiento y Género -->
                            <div class="col-md-6">
                                <label class="fw-bold">Fecha de Nacimiento:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white">
                                        <i class="bi bi-calendar-event"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->fecha_nacimiento }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold">Género:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white">
                                        <i class="bi bi-gender-ambiguous"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->genero }}" readonly>
                                </div>
                            </div>

                            <!-- Teléfono y Correo -->
                            <div class="col-md-6">
                                <label class="fw-bold">Teléfono:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->telefono }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold">Correo Electrónico:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="bi bi-envelope-at"></i>
                                    </span>
                                    <input type="email" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->correo }}" readonly>
                                </div>
                            </div>

                            <!-- Dirección -->
                            <div class="col-12">
                                <label class="fw-bold">Dirección:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-warning text-dark">
                                        <i class="bi bi-house-door"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->direccion }}" readonly>
                                </div>
                            </div>

                            <!-- Grupo Sanguíneo y Alergias -->
                            <div class="col-md-6">
                                <label class="fw-bold">Grupo Sanguíneo:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="bi bi-droplet"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->grupo_sanguineo }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="fw-bold">Alergias:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-warning text-dark">
                                        <i class="bi bi-exclamation-triangle"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->alergias }}" readonly>
                                </div>
                            </div>

                            <!-- Contacto de Emergencia -->
                            <div class="col-md-6">
                                <label class="fw-bold">Contacto de Emergencia:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white">
                                        <i class="bi bi-person-lines-fill"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->contacto_emergencia }}" readonly>
                                </div>
                            </div>

                            <!-- Observaciones -->
                            <div class="col-md-6">
                                <label class="fw-bold">Observaciones:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white">
                                        <i class="bi bi-file-earmark-text"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                        value="{{ $paciente->observaciones }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-center bg-light">
                        <a href="{{ url('admin/pacientes') }}" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-arrow-left me-2"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
