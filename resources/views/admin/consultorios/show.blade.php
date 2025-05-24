@extends('layouts.admin')

@section('content')


                </div>
                <!-- Cuerpo -->
                <div class="container-fluid min-vh-10 d-flex align-items-center justify-content-center">
                    <div class="col-lg-8 col-md-10">
                        <div class="card shadow-lg border-0 rounded-3">
                            <!-- Encabezado -->
                            <div class="card-header bg-primary text-white text-center">
                                <h3 class="fw-bold text-uppercase mb-0">
                                    <i class="bi bi-hospital me-2"></i> Información del Consultorio
                                </h3>
                            </div>

                            <!-- Cuerpo -->
                            <div class="card-body">
                                <div class="row g-3">
                                    <!-- Nombre -->
                                    <div class="col-12">
                                        <label class="fw-bold text-capitalize">Nombre del consultorio:</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="bi bi-hospital"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control bg-light text-muted border-0 shadow-sm"
                                                value="{{ $consultorio->nombre }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Ubicación -->
                                    <div class="col-md-6">
                                        <label class="fw-bold text-capitalize">Ubicación:</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-info text-white">
                                                <i class="bi bi-geo-alt"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control bg-light text-muted border-0 shadow-sm"
                                                value="{{ $consultorio->ubicacion }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Capacidad -->
                                    <div class="col-md-6">
                                        <label class="fw-bold text-capitalize">Capacidad:</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-dark text-white">
                                                <i class="bi bi-people"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control bg-light text-muted border-0 shadow-sm"
                                                value="{{ $consultorio->capacidad }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Teléfono -->
                                    <div class="col-md-6">
                                        <label class="fw-bold text-capitalize">Teléfono:</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-danger text-white">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control bg-light text-muted border-0 shadow-sm"
                                                value="{{ $consultorio->telefono }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Especialidad -->
                                    <div class="col-md-6">
                                        <label class="fw-bold text-capitalize">Especialidad:</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-secondary text-white">
                                                <i class="bi bi-clipboard-pulse"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control bg-light text-muted border-0 shadow-sm"
                                                value="{{ $consultorio->especialidad }}" readonly>
                                        </div>
                                    </div>

                                    <!-- Estado -->
                                    <div class="col-md-6">
                                        <label class="fw-bold text-capitalize">Estado:</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-success text-white">
                                                <i class="bi bi-check-circle"></i>
                                            </span>
                                            <input type="text"
                                                class="form-control bg-light text-muted border-0 shadow-sm"
                                                value="{{ $consultorio->estado }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Footer -->
                            <div class="card-footer text-center bg-light">
                                <a href="{{ url('admin/consultorios') }}" class="btn btn-outline-secondary px-4">
                                    <i class="bi bi-arrow-left me-2"></i> Volver
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
