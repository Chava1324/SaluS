@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado -->
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center shadow-sm">
                    <h3 class="fw-bold text-uppercase fs-5 mb-0">
                        <i class="bi bi-pencil-square me-2"></i> Modificar Auxiliar: {{ $secretaria->nombres }} {{ $secretaria->apellidos }}
                    </h3>
                </div>

                <!-- Cuerpo del Formulario -->
                <div class="card-body">
                    <form action="{{ route('admin.secretarias.update', $secretaria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <!-- Nombre y Apellidos -->
                            <div class="col-md-6">
                                <label for="nombres" class="form-label fw-bold">Nombre(s) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white"><i class="bi bi-person"></i></span>
                                    <input type="text" value="{{ $secretaria->nombres }}" id="nombres" name="nombres"
                                        class="form-control bg-light" placeholder="Introduce el nombre" required>
                                </div>
                                @error('nombres') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="apellidos" class="form-label fw-bold">Apellidos <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white"><i class="bi bi-person-lines-fill"></i></span>
                                    <input type="text" value="{{ $secretaria->apellidos }}" id="apellidos" name="apellidos"
                                        class="form-control bg-light" placeholder="Introduce los apellidos" required>
                                </div>
                                @error('apellidos') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- CURP y Celular -->
                            <div class="col-md-6">
                                <label for="curp" class="form-label fw-bold">CURP <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white"><i class="bi bi-card-list"></i></span>
                                    <input type="text" value="{{ $secretaria->curp }}" id="curp" name="curp"
                                        class="form-control bg-light text-uppercase" placeholder="Introduce la CURP"
                                        required maxlength="18" pattern="[A-Za-z0-9]{18}"
                                        oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '').toUpperCase()">
                                </div>
                                @error('curp') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="celular" class="form-label fw-bold">Celular <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white"><i class="bi bi-phone"></i></span>
                                    <input type="tel" value="{{ $secretaria->celular }}" id="celular" name="celular"
                                        class="form-control bg-light" placeholder="Número telefónico" required
                                        pattern="\d{10}" oninput="this.value = this.value.replace(/\D/g, '')">
                                </div>
                                @error('celular') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Fecha de Nacimiento y Dirección -->
                            <div class="col-md-6">
                                <label for="fecha_nacimiento" class="form-label fw-bold">Fecha de Nacimiento <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white"><i class="bi bi-calendar"></i></span>
                                    <input type="date" value="{{ $secretaria->fecha_nacimiento }}" id="fecha_nacimiento"
                                        name="fecha_nacimiento" class="form-control bg-light" required>
                                </div>
                                @error('fecha_nacimiento') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="direccion" class="form-label fw-bold">Dirección <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white"><i class="bi bi-house-door"></i></span>
                                    <input type="text" value="{{ $secretaria->direccion }}" id="direccion" name="direccion"
                                        class="form-control bg-light" placeholder="Introduce la dirección" required>
                                </div>
                                @error('direccion') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Correo Electrónico -->
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-bold">Correo Electrónico <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-warning text-dark"><i class="bi bi-envelope"></i></span>
                                    <input type="email" id="email" value="{{ $secretaria->user->email }}" name="email"
                                        class="form-control bg-light" placeholder="Introduce tu email" required>
                                </div>
                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <!-- Contraseña y Confirmación -->
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-bold">Nueva Contraseña (Opcional)</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white"><i class="bi bi-key"></i></span>
                                    <input type="password" id="password" name="password"
                                        class="form-control bg-light" placeholder="Introduce nueva contraseña">
                                </div>
                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password_confirmation" class="form-label fw-bold">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white"><i class="bi bi-shield-lock"></i></span>
                                    <input type="password" id="password_confirmation" name="password_confirmation"
                                        class="form-control bg-light" placeholder="Vuelve a introducir la contraseña">
                                </div>
                                @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/secretarias') }}" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-arrow-left-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-save"></i> Actualizar Datos
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
