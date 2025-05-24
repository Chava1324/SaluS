@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-person-plus me-2"></i> Registro de Nueva Secretaria
                    </h3>
                </div>

                <!-- Cuerpo del formulario -->
                <div class="card-body bg-light p-4">
                    <form action="{{ url('/admin/secretarias/create') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <!-- Nombre -->
                            <div class="col-md-6">
                                <label for="nombres" class="fw-bold">Nombre(s) <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" value="{{ old('nombres') }}" id="nombres" name="nombres"
                                        class="form-control bg-light" placeholder="Introduce los nombres" required>
                                </div>
                                @error('nombres')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Apellidos -->
                            <div class="col-md-6">
                                <label for="apellidos" class="fw-bold">Apellidos <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person-lines-fill"></i>
                                    </span>
                                    <input type="text" value="{{ old('apellidos') }}" id="apellidos" name="apellidos"
                                        class="form-control bg-light" placeholder="Introduce los apellidos" required>
                                </div>
                                @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- CURP -->
                            <div class="col-md-6">
                                <label for="curp" class="fw-bold">CURP <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="bi bi-card-list"></i>
                                    </span>
                                    <input type="text" value="{{ old('curp') }}" id="curp" name="curp"
                                        class="form-control bg-light" placeholder="Ingresa el CURP" required>
                                </div>
                                @error('curp')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Celular -->
                            <div class="col-md-6">
                                <label for="celular" class="fw-bold">Celular <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="bi bi-phone"></i>
                                    </span>
                                    <input type="tel" value="{{ old('celular') }}" id="celular" name="celular"
                                        class="form-control bg-light" placeholder="Número telefónico" required>
                                </div>
                                @error('celular')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Fecha de nacimiento -->
                            <div class="col-md-6">
                                <label for="fecha_nacimiento" class="fw-bold">Fecha de Nacimiento <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white">
                                        <i class="bi bi-calendar"></i>
                                    </span>
                                    <input type="date" value="{{ old('fecha_nacimiento') }}" id="fecha_nacimiento"
                                        name="fecha_nacimiento" class="form-control bg-light" required>
                                </div>
                                @error('fecha_nacimiento')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Dirección -->
                            <div class="col-12">
                                <label for="direccion" class="fw-bold">Dirección <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-warning text-dark">
                                        <i class="bi bi-geo-alt"></i>
                                    </span>
                                    <input type="text" id="direccion" value="{{ old('direccion') }}" name="direccion"
                                        class="form-control bg-light" placeholder="Introduce la dirección" required>
                                </div>
                                @error('direccion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Correo -->
                            <div class="col-md-6">
                                <label for="email" class="fw-bold">Correo Electrónico <b>*</b></label>
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
                            <div class="col-md-6">
                                <label for="password" class="fw-bold">Contraseña <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" id="password" name="password" class="form-control bg-light"
                                        placeholder="Introduce tu contraseña" required>
                                </div>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                           <!-- Confirmar Contraseña -->
                           <div class="col-md-6">
                            <label for="password_confirmation" class="fw-bold">Confirmar Contraseña <b>*</b></label>
                            <div class="input-group">
                                <span class="input-group-text bg-secondary text-white">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control bg-light" placeholder="Vuelve a introducir la contraseña" required>
                            </div>
                            @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/secretarias') }}" class="btn btn-secondary shadow-sm">
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
