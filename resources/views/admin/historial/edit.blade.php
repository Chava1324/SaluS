@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <!-- Encabezado -->
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-calendar-check-fill me-2"></i> Editar cita médica
                    </h3>
                </div>

                <!-- Cuerpo del formulario -->
                <div class="card-body bg-white p-4">
                    <form action="{{ url('/admin/historial', $historials->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            <!-- Paciente -->
                            <div class="col-md-6">
                                <label for="paciente_id" class="form-label fw-bold">
                                    Paciente <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-person-badge"></i>
                                    </span>
                                    <select name="paciente_id" id="paciente_id" class="form-select" required>
                                        @foreach ($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}" {{ $paciente->id == $historials->paciente_id
                                            ? 'selected' : '' }}>
                                            {{ $paciente->id }} - {{ $paciente->apellidos }} {{ $paciente->nombres }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Fecha -->
                            <div class="col-md-6">
                                <label for="fecha_visita" class="form-label fw-bold">
                                    Fecha de la cita <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-success text-white">
                                        <i class="bi bi-calendar-event"></i>
                                    </span>
                                    <input type="date" id="fecha_visita" name="fecha_visita" class="form-control"
                                        value="{{ $historials->fecha_visita }}" required readonly>
                                </div>
                            </div>

                            <br>
                            <hr style="border: 1px solid #007bff;">

                            <!-- Descripción -->
                            <div class="col-12">
                                <label for="editor" class="form-label fw-bold">
                                    <i class="bi bi-file-earmark-text me-1"></i>Descripción de la cita
                                </label>
                                <textarea name="detalle" class="form-control rounded-3 shadow-sm" id="editor" rows="8"
                                    style="resize: none; border: 1px solid #ced4da; padding: 10px; font-size: 1rem;">{!! $historials->detalle !!}</textarea>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/historial') }}" class="btn btn-outline-secondary shadow-sm">
                                <i class="bi bi-arrow-left me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Guardar cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
</script>
@endsection
