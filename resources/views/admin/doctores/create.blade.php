@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-person-plus me-2"></i> Registro de Nuevo Doctor
                    </h3>
                </div>

                <!-- Cuerpo del formulario -->
                <div class="card-body bg-light p-4">
                    <form action="{{ url('/admin/doctores/create') }}" method="POST" class="space-y-4">
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
                                        class="form-control bg-light" placeholder="Introduce los nombres" required
                                        pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" title="Solo se permiten letras y espacios">
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
                                        class="form-control bg-light" placeholder="Introduce los apellidos" required
                                        pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" title="Solo se permiten letras y espacios">
                                </div>
                                @error('apellidos')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Telefono -->
                            <div class="col-md-6">
                                <label for="telefono" class="fw-bold">Teléfono <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="bi bi-phone"></i>
                                    </span>
                                    <input type="tel" value="{{ old('telefono') }}" id="telefono" name="telefono"
                                        class="form-control bg-light" placeholder="Número telefónico" required
                                        maxlength="10" pattern="^\d{10}$"
                                        title="Ingrese un número de 10 dígitos sin espacios ni guiones"
                                        oninput="this.value = this.value.replace(/\D/g, '')">
                                </div>
                                @error('telefono')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Licencia_medica Médica -->
                            <div class="col-md-6">
                                <label for="licencia_medica" class="form-label fw-bold">Licencia Médica <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-black">
                                        <i class="bi bi-file-earmark-medical text-black"></i>
                                    </span>
                                    <input type="text" value="{{ old('licencia_medica') }}" id="licencia_medica"
                                        name="licencia_medica" class="form-control bg-light"
                                        placeholder="Introduce la licencia médica" required maxlength="10"
                                        pattern="\d{10}" title="Ingrese un número de 10 dígitos sin espacios ni guiones"
                                        oninput="this.value = this.value.replace(/\D/g, '')">
                                </div>
                                @error('licencia_medica')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Especialidad -->
                            <div class="col-md-6">
                                <label for="especialidad" class="fw-bold">Especialidad <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-warning text-dark">
                                        <i class="bi bi-clipboard2-pulse"></i>
                                    </span>
                                    <input type="text" id="especialidad" value="{{ old('especialidad') }}"
                                        name="especialidad" class="form-control bg-light"
                                        placeholder="Introduce la especialidad" required
                                        pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$" title="Solo se permiten letras y espacios">
                                </div>
                                @error('especialidad')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="fw-bold">Correo Electrónico <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email" id="email" value="{{ old('email') }}" name="email"
                                        class="form-control bg-light" placeholder="Introduce tu correo electrónico"
                                        required pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                        title="Introduce un correo electrónico válido (ejemplo: usuario@dominio.com)">
                                </div>
                                @error('email')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Contraseña -->
                            <div class="col-md-6">
                                <label for="password" class="fw-bold">Contraseña <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="bi bi-key"></i>
                                    </span>
                                    <input type="password" id="password" name="password" class="form-control bg-light"
                                        placeholder="Introduce tu contraseña" required {{--
                                        pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                        title="La contraseña debe tener al menos 8 caracteres, incluyendo una letra, un número y un símbolo especial."
                                        --}}>
                                </div>
                                @error('password')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Confirmación de Contraseña -->
                            <div class="col-md-6">
                                <label for="password_confirmation" class="fw-bold">Confirmar Contraseña <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white">
                                        <i class="bi bi-shield-lock"></i>
                                    </span>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control bg-light" placeholder="Repite tu contraseña" required>
                                </div>
                                @error('password_confirmation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/doctores') }}" class="btn btn-secondary shadow-sm">
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