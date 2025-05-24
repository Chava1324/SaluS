@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Encabezado de la tarjeta -->
                <div class="card-header bg-warning text-white text-center py-3">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-gear me-2"></i> Editar configuración
                    </h3>
                </div>

                <!-- Cuerpo del formulario -->
                <div class="card-body bg-light p-4">
                    <form action="{{ url('/admin/configuraciones', $configuraciones->id) }}" method="POST"
                        enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <!-- Primera columna: Nombre y Teléfono -->
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre" class="fw-bold">Nombre del hospital<b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="bi bi-hospital"></i>
                                            </span>
                                            <input type="text" id="nombre" name="nombre" class="form-control bg-light"
                                                placeholder="Introduce el nombre" required
                                                pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+$"
                                                title="Solo se permiten letras y espacios"
                                                value="{{ $configuraciones->nombre }}">
                                        </div>
                                        @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="telefono" class="fw-bold">Teléfono<b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-success text-white">
                                                <i class="bi bi-telephone"></i>
                                            </span>
                                            <input type="tel" id="telefono" name="telefono"
                                                class="form-control bg-light" placeholder="Introduce el teléfono"
                                                required pattern="^\d{10}$"
                                                title="Introduce un número de 10 dígitos sin espacios ni guiones"
                                                value="{{ old('telefono', $configuraciones->telefono) }}">
                                        </div>
                                        @error('telefono')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label for="correo" class="fw-bold">Correo electrónico<b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-danger text-white">
                                                <i class="bi bi-envelope"></i>
                                            </span>
                                            <input type="email" id="correo" name="correo" class="form-control bg-light"
                                                placeholder="Introduce el correo electrónico" required
                                                title="Introduce un correo válido"
                                                value="{{ old('correo', $configuraciones->correo) }}">
                                        </div>
                                        @error('correo')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Segunda columna: Dirección y Logo -->
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="direccion" class="fw-bold">Dirección<b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-info text-white">
                                                <i class="bi bi-geo-alt"></i>
                                            </span>
                                            <input type="text" id="direccion" name="direccion"
                                                class="form-control bg-light" placeholder="Introduce la dirección"
                                                required pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ0-9\s,.-]+$"
                                                title="Letras, números y algunos símbolos (, . -)"
                                                value="{{ old('direccion', $configuraciones->direccion) }}">
                                        </div>
                                        @error('direccion')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Sección de carga de logo -->
                                <div
                                    class="mt-2 flex justify-center rounded-md border border-dashed border-gray-900/25 p-6">
                                    <div class="text-center">
                                        <img id="imagePreview"
                                            class="w-32 h-32 mx-auto rounded-full object-cover shadow-md border-2 border-gray-300"
                                            src="{{ $configuraciones->logo ? asset('storage/' . $configuraciones->logo) : '' }}"
                                            alt="Vista previa del logo"
                                            style="{{ $configuraciones->logo ? '' : 'display: none;' }} object-fit: cover; width: 128px; height: 128px;">


                                        <div class="mt-4 flex justify-center text-sm leading-6 text-gray-600">
                                            <label for="logo"
                                                class="relative cursor-pointer font-semibold text-indigo-600">
                                                <span>Subir logo</span>
                                                <input id="logo" name="logo" type="file" accept="image/*"
                                                    class="sr-only">
                                            </label>
                                        </div>

                                        <div id="fileName" class="mt-2 text-xs text-gray-500"></div>

                                        <p class="text-xs leading-5 text-gray-600 mt-2">PNG, JPG, GIF hasta 10MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SCRIPT para actualizar la imagen al seleccionar un nuevo archivo -->
                        <script>
                            document.getElementById('logo').addEventListener('change', function(event) {
                                const fileInput = event.target;
                                const imagePreview = document.getElementById('imagePreview');
                                const fileName = document.getElementById('fileName');

                                if (fileInput.files && fileInput.files[0]) {
                                    const reader = new FileReader();

                                    reader.onload = function(e) {
                                        imagePreview.src = e.target.result;
                                        imagePreview.style.display = 'block';
                                    }

                                    reader.readAsDataURL(fileInput.files[0]);
                                    fileName.textContent = fileInput.files[0].name;
                                } else {
                                    imagePreview.src = '';
                                    imagePreview.style.display = 'none';
                                    fileName.textContent = '';
                                }
                            });
                        </script>

                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ url('admin/configuraciones') }}" class="btn btn-secondary shadow-sm">
                    <i class="bi bi-arrow-left-circle me-2"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success shadow-sm">
                    <i class="bi bi-save me-2"></i> Guardar
                </button>
            </div>
            </form>
        </div>


        <!-- Botones -->


        </form>
    </div>
</div>
</div>
</div>
</div>
@endsection
