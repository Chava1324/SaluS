@extends('layouts.admin')

@section('content')
    <div class="container-fluid min-vh-100 p-0 position-relative">
        <div class="card shadow-lg border-0 rounded-0 position-absolute top-0 start-0 w-100 h-70">
            <!-- Card Header -->
            <div class="card-header bg-warning bg-gradient text-white d-flex justify-content-between align-items-center">
                <h3 class="card-title mb-0">
                    <i class="bi bi-pencil-square me-2"></i> Modificación de {{ $usuario->name }}
                </h3>
                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="collapse" data-bs-target="#userEditForm">
                    <i class="bi bi-dash-lg"></i>
                </button>
            </div>

            <!-- Card Body -->
            <div class="collapse show" id="userEditForm">
                <div class="card-body">
                    <form action="{{ url('admin/usuarios/' . $usuario->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Nombre de usuario <span
                                    class="text-danger">*</span></label>
                            <input type="text" value="{{ $usuario->name }}" id="name" name="name"
                                class="form-control shadow-sm" placeholder="Introduce tu nombre de usuario" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email <span
                                    class="text-danger">*</span></label>
                            <input type="email" id="email" value="{{ $usuario->email }}" name="email"
                                class="form-control shadow-sm" placeholder="Introduce tu email" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-bold">Contraseña</label> <span
                                class="text-muted">(Opcional)</span>
                            <input type="password" id="password" value="{{ old('password') }}" name="password"
                                class="form-control shadow-sm" placeholder="Actualiza la contraseña">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label fw-bold">Verifica la contraseña</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control shadow-sm" placeholder="Vuelve a introducir la contraseña">
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/usuarios') }}" class="btn btn-secondary px-4">
                                <i class="bi bi-arrow-left me-2"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success px-4" id="btngrd">
                                <i class="bi bi-check-circle me-2"></i> Actualizar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
