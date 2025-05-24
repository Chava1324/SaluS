@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-person-plus me-2"></i> Registrar Nuevo Usuario
                    </h3>
                </div>

                <!-- Cuerpo del formulario -->
                <div class="card-body bg-light p-4">
                    <form action="{{ url('/admin/usuarios/create') }}" method="POST">
                        @csrf

                        <!-- Nombre de Usuario -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nombre de Usuario <b>*</b></label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" value="{{ old('name') }}" id="name" name="name"
                                    class="form-control bg-light" placeholder="Introduce tu nombre de usuario" required>
                            </div>
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Correo Electrónico <b>*</b></label>
                            <div class="input-group">
                                <span class="input-group-text bg-danger text-white">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" id="email" value="{{ old('email') }}" name="email"
                                    class="form-control bg-light" placeholder="Introduce tu email" required>
                            </div>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Contraseña -->
                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Contraseña <b>*</b></label>
                            <div class="input-group">
                                <span class="input-group-text bg-warning text-dark">
                                    <i class="bi bi-key"></i>
                                </span>
                                <input type="password" id="password" name="password" class="form-control bg-light"
                                    placeholder="Introduce tu contraseña" required>
                            </div>
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Confirmar Contraseña -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña
                                <b>*</b></label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control bg-light" placeholder="Vuelve a introducir la contraseña"
                                    required>
                            </div>
                            @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary shadow-sm">
                                <i class="bi bi-arrow-left-circle me-2"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success shadow-sm">
                                <i class="bi bi-save me-2"></i> Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
