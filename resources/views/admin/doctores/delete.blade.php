@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger shadow-sm rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold mb-0">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Eliminar Doctor
                    </h3>
                </div>

                <!-- Cuerpo de la tarjeta -->
                <div class="card-body">
                    <p class="text-danger fw-bold text-center">
                        Esta acción no se puede deshacer. Si eliminas esta doctor, todos sus datos asociados se perderán permanentemente.
                    </p>

                    <form action="{{ route('admin.doctores.destroy', $doctor->id) }}" method="POST" id="delete-form">
                        @csrf
                        @method('DELETE')

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

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.doctores.index') }}" class="btn btn-secondary shadow-sm">
                                <i class="bi bi-arrow-left me-2"></i> Cancelar
                            </a>
                            <button type="button" class="btn btn-danger shadow-sm" id="delete-button">
                                <i class="bi bi-trash-fill me-2"></i> Eliminar Doctor
                            </button>
                        </div>
                    </form>
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
