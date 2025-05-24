@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-10 d-flex flex-column justify-content-center align-items-center py-5">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg border-0 rounded-3">
            <!-- Encabezado -->
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h3 class="fw-bold text-uppercase mb-0">
                    <i class="bi bi-person-circle me-2"></i> Información de la Secretaria
                </h3>

            </div>

            <!-- Cuerpo -->
            <div class="collapse show" id="userData">
                <div class="card-body">
                    <div class="row g-3">
                        <!-- Nombre -->
                        <div class="col-md-6">
                            <label class="fw-bold">Nombre(s):</label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                    value="{{ $secretaria->user->name }}" readonly>
                            </div>
                        </div>

                        <!-- Apellidos -->
                        <div class="col-md-6">
                            <label class="fw-bold">Apellidos:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white"><i class="bi bi-person-vcard"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                    value="{{ $secretaria->apellidos }}" readonly>
                            </div>
                        </div>

                        <!-- CURP -->
                        <div class="col-md-6">
                            <label class="fw-bold">CURP:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-dark text-white"><i class="bi bi-card-list"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                    value="{{ $secretaria->curp }}" readonly>
                            </div>
                        </div>

                        <!-- Celular -->
                        <div class="col-md-6">
                            <label class="fw-bold">Celular:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-success text-white"><i class="bi bi-phone"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                    value="{{ $secretaria->celular }}" readonly>
                            </div>
                        </div>

                        <!-- Fecha de Nacimiento -->
                        <div class="col-md-6">
                            <label class="fw-bold">Fecha de Nacimiento:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-info text-white"><i class="bi bi-calendar-event"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                    value="{{ $secretaria->fecha_nacimiento }}" readonly>
                            </div>
                        </div>

                        <!-- Dirección -->
                        <div class="col-md-6">
                            <label class="fw-bold">Dirección:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-warning text-dark"><i class="bi bi-house-door"></i></span>
                                <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                    value="{{ $secretaria->direccion }}" readonly>
                            </div>
                        </div>

                        <!-- Correo Electrónico -->
                        <div class="col-12">
                            <label class="fw-bold">Correo Electrónico:</label>
                            <div class="input-group">
                                <span class="input-group-text bg-danger text-white"><i class="bi bi-envelope-at"></i></span>
                                <input type="email" class="form-control bg-light text-muted border-0 shadow-sm"
                                    value="{{ $secretaria->user->email }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer text-center bg-light">
                    <a href="{{ url('admin/secretarias') }}" class="btn btn-outline-secondary px-4">
                        <i class="bi bi-arrow-left me-2"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
