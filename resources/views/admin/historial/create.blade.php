@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center align-items-start g-4">
        <!-- Card: Nueva cita médica -->
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-calendar-plus-fill me-2"></i> Nueva cita médica
                    </h3>
                </div>
                <div class="card-body bg-white p-4">
                    <form action="{{ url('/admin/historial/create') }}" method="POST">
                        @csrf
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
                                        <option value="">Selecciona un paciente</option>
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}">
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
                                    <input type="date" id="fecha_visita" name="fecha_visita"
                                           value="{{ date('Y-m-d') }}" class="form-control" readonly>
                                </div>
                            </div>

                            <hr class="mt-4" style="border: 1px solid #007bff;">

                            <!-- Descripción -->
                            <div class="col-12">
                                <label for="editor" class="form-label fw-bold">
                                    <i class="bi bi-file-earmark-text me-1"></i>Descripción de la cita
                                </label>
                                <textarea name="detalle" class="form-control rounded-3 shadow-sm" id="editor" rows="8"
                                          style="resize: none; border: 1px solid #ced4da; padding: 10px; font-size: 1rem;"></textarea>
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ url('admin/historial') }}" class="btn btn-outline-secondary shadow-sm">
                                <i class="bi bi-arrow-left me-1"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-success shadow-sm">
                                <i class="bi bi-check-circle me-1"></i> Guardar cita
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Card: Datos del paciente -->
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-4 h-100">
                <div class="card-header bg-info text-white text-center py-3 rounded-top-4">
                    <h4 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-person-lines-fill me-2"></i> Datos del paciente
                    </h4>
                </div>
                <div class="card-body bg-light">
                    <div class="mb-3">
                        <label class="form-label fw-bold">CURP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-file-earmark-person"></i></span>
                            <input type="text" id="curp" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">NSS</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-shield-check"></i></span>
                            <input type="text" id="nss" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                            <input type="text" id="telefono" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Correo</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="text" id="correo" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Alergias</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-exclamation-triangle-fill"></i></span>
                            <input type="text" id="alergias" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="observaciones" class="form-label fw-bold">Observaciones</label>
                        <div class="input-group">
                            <span class="input-group-text bg-dark text-white">
                                <i class="bi bi-chat-square-text-fill"></i>
                            </span>
                            <textarea id="observaciones" class="form-control" rows="3" readonly></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- Cierra el row -->
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pacienteSelect = document.getElementById('paciente_id');

        pacienteSelect.addEventListener('change', function () {
            const pacienteId = this.value;
console.log(`/admin/paciente/${pacienteId}/create`);
     if (pacienteId) {
fetch(`{{ url('/admin/paciente') }}/${pacienteId}/datos`)
                  .then(response => {
                        if (!response.ok) {
                            throw new Error('Paciente no encontrado');
                        }
                        return response.json();
                    })
                    .then(data => {
                        document.getElementById('curp').value = data.curp || '';
                        document.getElementById('nss').value = data.nss || '';
                        document.getElementById('telefono').value = data.telefono || '';
                        document.getElementById('correo').value = data.correo || '';
                        document.getElementById('alergias').value = data.alergias || '';
                        document.getElementById('observaciones').value = data.observaciones || 'Sin observaciones';

                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('No se pudo obtener la información del paciente');
                    });
            }
        });
    });
</script>

@endsection
