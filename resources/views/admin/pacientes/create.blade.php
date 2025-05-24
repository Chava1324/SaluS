@extends('layouts.admin')



@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-person-plus me-2"></i> Registro de Nuevo Paciente
                    </h3>
                </div>

                <div class="card-body bg-light p-4">
                    <form action="{{ url('/admin/pacientes/create') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="row g-3">
                            <!-- Nombre y Apellido -->
                            <div class="col-md-6">
                                <label for="nombres" class="fw-bold">Nombre(s) <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" value="{{ old('nombre') }}" id="nombre" name="nombre"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce el nombre" required
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\sáéíóúÁÉÍÓÚñÑ]/g, '')">
                                </div>
                                @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="apellidos" class="fw-bold">Apellidos <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person-lines-fill"></i>
                                    </span>
                                    <input type="text" value="{{ old('apellidos') }}" id="apellidos" name="apellidos"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce los apellidos" required
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\sáéíóúÁÉÍÓÚñÑ]/g, '')">
                                </div>
                                @error('apellidos')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- CURP y NSS -->
                            <div class="col-md-6">
                                <label for="curp" class="fw-bold">CURP <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="bi bi-card-list"></i>
                                    </span>
                                    <input type="text" value="{{ old('curp') }}" id="curp" name="curp"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce la CURP" required maxlength="18"
                                        pattern="[A-Za-z0-9]{18}"
                                        oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '').toUpperCase()">
                                </div>
                                @error('curp')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nss" class="form-label fw-bold">NSS <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-black"><i
                                            class="bi bi-hospital text-black"></i></span>
                                    <input type="text" value="{{ old('nss') }}" id="nss" name="nss"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce el NSS" required maxlength="11" pattern="\d{11}"
                                        oninput="this.value = this.value.replace(/\D/g, '')">
                                </div>
                                @error('nss')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Fecha de nacimiento y Género -->
                            <div class="col-md-6">
                                <label for="fecha_nacimiento" class="form-label fw-bold">Fecha de nacimiento
                                    <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-black"><i
                                            class="bi bi-calendar text-black"></i></span>
                                    <input type="date" value="{{ old('fecha_nacimiento') }}" id="fecha_nacimiento"
                                        name="fecha_nacimiento" class="form-control focus:ring focus:ring-blue-300"
                                        required>
                                </div>
                                @error('fecha_nacimiento')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="genero" class="form-label fw-bold">Género <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-warning  text-black"><i
                                            class="bi bi-gender-ambiguous  text-black"></i></span>
                                    <select id="genero" name="genero" class="form-select focus:ring focus:ring-blue-300"
                                        required>
                                        <option value="" disabled selected>Selecciona</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                                @error('genero')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Teléfono y Correo -->
                            <div class="col-md-6">
                                <label for="telefono" class="form-label fw-bold">Teléfono <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-black"><i
                                            class="bi bi-telephone text-black"></i></span>
                                    <input type="tel" value="{{ old('telefono') }}" id="telefono" name="telefono"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce el teléfono" required>
                                </div>
                                @error('telefono')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="correo" class="form-label fw-bold">Correo <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-black"><i
                                            class="bi bi-envelope text-black"></i></span>
                                    <input type="email" value="{{ old('correo') }}" id="correo" name="correo"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce el correo" required>
                                </div>
                                @error('correo')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Dirección -->
                            <div class="col-md-12">
                                <label for="direccion" class="form-label fw-bold">Dirección <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-black"><i
                                            class="bi bi-house-door text-black"></i></span>
                                    <input type="text" value="{{ old('direccion') }}" id="direccion" name="direccion"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce la dirección" required
                                        oninput="this.value = this.value.replace(/[^A-Za-z0-9]/g, '').toUpperCase()">
                                </div>
                                @error('direccion')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Grupo sanguíneo y Alergias -->
                            <div class="col-md-6">
                                <label for="grupo_sanguineo" class="form-label fw-bold">Grupo sanguíneo <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-black"><i
                                            class="bi bi-droplet text-black"></i></span>
                                    <select id="grupo_sanguineo" name="grupo_sanguineo"
                                        class="form-select focus:ring focus:ring-blue-300" required>
                                        <option value="" disabled selected>Selecciona el grupo sanguíneo</option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                @error('grupo_sanguineo')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="alergias" class="form-label fw-bold">Alergias <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light text-black"><i
                                            class="bi bi-exclamation-triangle text-black"></i></span>
                                    <input type="text" value="{{ old('alergias') }}" id="alergias" name="alergias"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce las alergias" required
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\sáéíóúÁÉÍÓÚñÑ]/g, '')">
                                </div>
                                @error('alergias')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Contacto de emergencia y Observaciones -->
                            <div class="col-md-6">
                                <label for="contacto_emergencia" class="form-label fw-bold">Contacto de emergencia
                                    <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-warning text-black"><i
                                            class="bi bi-person-lines-fill text-black"></i></span>
                                    <input type="text" value="{{ old('contacto_emergencia') }}" id="contacto_emergencia"
                                        name="contacto_emergencia" class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce el contacto de emergencia" required>
                                </div>
                                @error('contacto_emergencia')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-black"><i
                                            class="bi bi-file-earmark-text text-black"></i></span>
                                    <textarea id="observaciones" name="observaciones"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce observaciones">{{ old('observaciones') }}</textarea>
                                </div>
                                @error('observaciones')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Botón de guardar -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/pacientes') }}" class="btn btn-secondary shadow-sm">
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
    @endsection