@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-danger shadow-sm rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold mb-0">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Eliminar Secretaria
                    </h3>
                </div>

                <!-- Cuerpo de la tarjeta -->
                <div class="card-body">
                    <p class="text-danger fw-bold text-center">
                        Esta acción no se puede deshacer. Si eliminas esta secretaria, todos sus datos asociados se perderán permanentemente.
                    </p>

                    <form action="{{ route('admin.secretarias.destroy', $secretaria->id) }}" method="POST" id="delete-form">
                        @csrf
                        @method('DELETE')

                        <div class="row g-3">
                            <!-- Nombre -->
                            <div class="col-md-6">
                                <label class="fw-bold">Nombre:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light" value="{{ $secretaria->user->name }}" readonly>
                                </div>
                            </div>

                            <!-- Apellidos -->
                            <div class="col-md-6">
                                <label class="fw-bold">Apellidos:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light" value="{{ $secretaria->apellidos }}" readonly>
                                </div>
                            </div>

                            <!-- CURP -->
                            <div class="col-md-6">
                                <label class="fw-bold">CURP:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="bi bi-credit-card-2-front"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light" value="{{ $secretaria->curp }}" readonly>
                                </div>
                            </div>

                            <!-- Celular -->
                            <div class="col-md-6">
                                <label class="fw-bold">Celular:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light" value="{{ $secretaria->celular }}" readonly>
                                </div>
                            </div>

                            <!-- Fecha de nacimiento -->
                            <div class="col-md-6">
                                <label class="fw-bold">Fecha de Nacimiento:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white">
                                        <i class="bi bi-calendar-event"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light" value="{{ $secretaria->fecha_nacimiento }}" readonly>
                                </div>
                            </div>

                            <!-- Dirección -->
                            <div class="col-12">
                                <label class="fw-bold">Dirección:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-warning text-dark">
                                        <i class="bi bi-house-door"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light" value="{{ $secretaria->direccion }}" readonly>
                                </div>
                            </div>

                            <!-- Correo -->
                            <div class="col-md-6">
                                <label class="fw-bold">Correo:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="bi bi-envelope-at"></i>
                                    </span>
                                    <input type="email" class="form-control bg-light" value="{{ $secretaria->user->email }}" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('admin.secretarias.index') }}" class="btn btn-secondary shadow-sm">
                                <i class="bi bi-arrow-left me-2"></i> Cancelar
                            </a>
                            <button type="button" class="btn btn-danger shadow-sm" id="delete-button">
                                <i class="bi bi-trash-fill me-2"></i> Eliminar Secretaria
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
