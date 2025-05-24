@extends('layouts.admin')

@section('content')
<div class="container mt-4 pb-5"> <!-- Agregar pb-5 para espacio en la parte inferior -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado -->
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-person-plus me-2"></i> Registro de Nuevo Consultorio
                    </h3>
                </div>

                <!-- Cuerpo del formulario -->
                <div class="card-body bg-light p-4 pb-5"> <!-- pb-5 para agregar más espacio antes del footer -->
                    <form action="{{ url('/admin/consultorios/create') }}" method="POST" class="space-y-4">
                        @csrf
                        <div class="row g-3">
                            <!-- Nombre -->
                            <div class="col-md-6">
                                <label for="nombre" class="fw-bold">Nombre(s) <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person"></i>
                                    </span>
                                    <input type="text" value="{{ old('nombre') }}" id="nombre" name="nombre"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce el nombre del consultorio" required pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"
                                        title="Solo se permiten letras y espacios"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\sáéíóúÁÉÍÓÚñÑ]/g, '')">
                                </div>
                                @error('nombre')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Ubicación -->
                            <div class="col-md-6">
                                <label for="ubicacion" class="fw-bold">Ubicación <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info text-white">
                                        <i class="bi bi-geo-alt"></i>
                                    </span>
                                    <input type="text" value="{{ old('ubicacion') }}" id="ubicacion" name="ubicacion"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce la ubicación" required
                                        pattern="^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s,.#-]+$"
                                        title="Solo se permiten letras, números, espacios y signos de puntuación básicos">
                                </div>
                                @error('ubicacion')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Capacidad -->
                            <div class="col-md-6">
                                <label for="capacidad" class="fw-bold">Capacidad <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-dark text-white">
                                        <i class="bi bi-people"></i>
                                    </span>
                                    <input type="number" value="{{ old('capacidad') }}" id="capacidad" name="capacidad"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce la capacidad" required min="1" max="5"
                                        pattern="\d{1,3}" title="Ingrese un número válido entre 1 y 5">
                                </div>
                                @error('capacidad')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Teléfono -->
                            <div class="col-md-6">
                                <label for="telefono" class="form-label fw-bold">Teléfono <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-danger text-white">
                                        <i class="bi bi-telephone"></i>
                                    </span>
                                    <input type="tel" value="{{ old('telefono') }}" id="telefono" name="telefono"
                                        class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce el teléfono" maxlength="10" pattern="^\d{10}$"
                                        title="Ingrese un número de 10 dígitos sin espacios ni guiones"
                                        oninput="this.value = this.value.replace(/\D/g, '')">
                                </div>
                                @error('telefono')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Especialidad -->
                            <div class="col-md-6">
                                <label for="especialidad" class="form-label fw-bold">Especialidad <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-secondary text-white">
                                        <i class="bi bi-clipboard-pulse"></i>
                                    </span>
                                    <input type="text" value="{{ old('especialidad') }}" id="especialidad"
                                        name="especialidad" class="form-control focus:ring focus:ring-blue-300"
                                        placeholder="Introduce la especialidad" required
                                        pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$" title="Solo se permiten letras y espacios"
                                        oninput="this.value = this.value.replace(/[^a-zA-Z\sáéíóúÁÉÍÓÚñÑ]/g, '')">
                                </div>
                                @error('especialidad')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Estado -->
                            <div class="col-md-6">
                                <label for="estado" class="form-label fw-bold">Estado <b>*</b></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="bi bi-check-circle"></i>
                                    </span>
                                    <select id="estado" name="estado" class="form-select focus:ring focus:ring-blue-300"
                                        required>
                                        <option value="" disabled selected>Selecciona el estado</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                        <option value="Reservado">Reservado</option>
                                    </select>
                                </div>
                                @error('estado')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Botones separados -->
                            <div class="d-flex justify-content-between mt-4 mb-4"> <!-- Agregado mb-4 -->
                                <a href="{{ url('admin/consultorios') }}" class="btn btn-secondary shadow-sm">
                                    <i class="bi bi-arrow-left-circle me-2"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-success shadow-sm">
                                    <i class="bi bi-save me-2"></i> Guardar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Espaciado en el footer -->
                <div class="card-footer bg-light text-center py-3"> <!-- Agregado py-3 -->
                    <small class="text-muted">© 2025 - Sistema de Consultorios</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
