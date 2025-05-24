@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-10 d-flex flex-column justify-content-center align-items-center py-5">
    <div class="col-lg-8 col-md-10">
        <div class="card shadow-lg border-0 rounded-3">
            <!-- Encabezado -->
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center py-4">
                <h3 class="fw-bold text-uppercase mb-0">
                    <i class="bi bi-person-circle me-2"></i> Información del Doctor
                </h3>
            </div>
            <!-- Cuerpo -->
            <div class="collapse show" id="userData">
                <div class="card-body px-5 py-4">
                    <div class="row g-4">
                        <!-- Nombre -->
                        <div class="col-md-6">
                            <label class="fw-bold">Nombre(s):</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white px-3"><i
                                        class="bi bi-person"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm py-3"
                                    value="{{ $doctor->user->name }}" readonly>
                            </div>
                        </div>
                        <!-- Apellidos -->
                        <div class="col-md-6">
                            <label class="fw-bold">Apellidos:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white px-3"><i
                                        class="bi bi-person-vcard"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm py-3"
                                    value="{{ $doctor->apellido }}" readonly>
                            </div>
                        </div>
                        <!-- Teléfono -->
                        <div class="col-md-6">
                            <label class="fw-bold">Teléfono:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white px-3"><i
                                        class="bi bi-phone"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm py-3"
                                    value="{{ $doctor->telefono }}" readonly>
                            </div>
                        </div>
                        <!-- Licencia Médica -->
                        <div class="col-md-6">
                            <label class="fw-bold">Licencia Médica:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white px-3"><i
                                        class="bi bi-file-medical"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm py-3"
                                    value="{{ $doctor->licencia_medica }}" readonly>
                            </div>
                        </div>
                        <!-- Especialidad -->
                        <div class="col-md-6">
                            <label class="fw-bold">Especialidad:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-warning text-dark px-3"><i
                                        class="bi bi-clipboard-pulse"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm py-3"
                                    value="{{ $doctor->especialidad }}" readonly>
                            </div>
                        </div>
                        <!-- Correo Electrónico -->
                        <div class="col-md-6">
                            <label class="fw-bold">Correo Electrónico:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-danger text-white px-3"><i
                                        class="bi bi-envelope-at"></i></span>
                                <input type="email" class="form-control bg-light text-muted border-0 shadow-sm py-3"
                                    value="{{ $doctor->user->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Footer -->
                <div class="card-footer text-center bg-light py-3">
                    <a href="{{ url('admin/doctores') }}" class="btn btn-outline-secondary px-5 py-2">
                        <i class="bi bi-arrow-left me-2"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
