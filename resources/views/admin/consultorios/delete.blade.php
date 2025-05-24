@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger shadow-sm rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold mb-0">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Eliminar Consultorio
                    </h3>

                </div>

                <!-- Cuerpo de la tarjeta -->
                <div class="collapse show" id="deleteCard">
                    <div class="card-body">
                        <p class="text-danger fw-bold text-center">
                            Esta acción no se puede deshacer. Si eliminas este consultorio, todos sus datos asociados se
                            perderán permanentemente.
                        </p>
                        <div class="border p-4 rounded-3 bg-white shadow-sm">
                            <div class="row g-3">
                                <!-- Nombre -->
                                <div class="col-md-6">
                                    <label class="fw-bold text-capitalize">Nombre del Consultorio:</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white">
                                            <i class="bi bi-hospital"></i>
                                        </span>
                                        <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
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
                                        <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
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
                                        <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
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
                                        <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
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
                                        <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
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
                                        <input type="text" class="form-control bg-light text-muted border-0 shadow-sm"
                                            value="{{ $consultorio->estado }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form action="{{ url('admin/consultorios/' . $consultorio->id) }}" method="POST"
                            id="delete-form">
                            @csrf
                            @method('DELETE')

                            <!-- Botones de acción -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary shadow-sm">
                                    <i class="bi bi-arrow-left me-2"></i> Cancelar
                                </a>
                                <button type="button" class="btn btn-danger shadow-sm" id="delete-button">
                                    <i class="bi bi-trash-fill me-2"></i> Eliminar Consultorio
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert2 para confirmación -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.getElementById('delete-button').addEventListener('click', function() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esta acción.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form').submit();
            }
        });
    });
</script>
@endsection
