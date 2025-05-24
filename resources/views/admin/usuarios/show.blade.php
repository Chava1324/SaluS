@extends('layouts.admin')

@section('content')
<div class="container-fluid min-vh-10 d-flex align-items-center justify-content-center">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow-lg border-0 rounded-3">
            <!-- Card Header -->
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h3 class="fw-bold mb-0">
                    <i class="bi bi-person-circle me-2"></i> Información del Usuario
                </h3>

            </div>

            <!-- Card Body -->
            <div class="collapse show" id="userData">
                <div class="card-body">
                    <form>
                        @csrf

                        <!-- Nombre de usuario -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nombre de usuario <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-primary text-white">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text" value="{{ $usuario->name }}" id="name" name="name"
                                    class="form-control bg-light text-muted border-0 shadow-sm" disabled>
                            </div>
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Correo Electrónico <span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-danger text-white">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="email" id="email" value="{{ $usuario->email }}" name="email"
                                    class="form-control bg-light text-muted border-0 shadow-sm" disabled>
                            </div>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Botón de regreso -->
                        <div class="text-center mt-4">
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left me-2"></i> Volver
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
