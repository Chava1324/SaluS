@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-danger shadow-sm rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title fw-bold mb-0">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> Eliminar Usuario
                    </h3>
                </div>

                <!-- Cuerpo de la tarjeta -->
                <div class="card-body">
                    <p class="text-danger fw-bold text-center">
                        Esta acción no se puede deshacer. Si eliminas este usuario, todos sus datos asociados se
                        perderán permanentemente.
                    </p>

                    <form action="{{ url('admin/usuarios/' . $usuario->id) }}" method="POST" id="delete-form">
                        @csrf
                        @method('DELETE')

                        <div class="row g-3">
                            <!-- Nombre -->
                            <div class="col-12">
                                <label class="fw-bold">Nombre:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" class="form-control bg-light" value="{{ $usuario->name }}"
                                        readonly>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-12">
                                <label class="fw-bold">Correo Electrónico:</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="bi bi-envelope-at"></i>
                                    </span>
                                    <input type="email" class="form-control bg-light" value="{{ $usuario->email }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de acción -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary shadow-sm">
                                <i class="bi bi-arrow-left me-2"></i> Cancelar
                            </a>
                            <button type="button" class="btn btn-danger shadow-sm" id="delete-button">
                                <i class="bi bi-trash-fill me-2"></i> Eliminar Usuario
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
