@extends('layouts.admin')

@section('content')
<div class="container mt-1">
    <div class="row d-flex justify-content-start">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h3 class="fw-bold text-uppercase mb-0">
                        <i class="bi bi-calendar-week me-2"></i> Registro de Nuevo Horario
                    </h3>
                </div>
                <div class="card-body bg-light p-4">
                    <div class="row">
                        <!-- Columna del formulario -->
                        <div class="col-md-3">
                            <form action="{{ url('/admin/horarios/create') }}" method="POST">
                                @csrf
                                <div class="row mt-12">
                                    <div class="col-md-12">
                                        <label for="consultorio_id" class="fw-bold">Consultorio <b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-secondary text-white">
                                                <i class="bi bi-building"></i>
                                            </span>
                                            <select name="consultorio_id" id="consultorio_id" class="form-control"
                                                required>
                                                <option value="" disabled="">SELECCIONA UN CONSULTORIO</option>
                                                @foreach ($consultorios as $consultorio)
                                                <option value="{{ $consultorio->id }}">
                                                    {{ $consultorio->id }} - {{ $consultorio->nombre }} - {{
                                                    $consultorio->ubicacion }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <script>
                                                $(document).ready(function() {
                                                $('#consultorio_id').on('change', function() { 
                                                    var consultorio_id = $(this).val();
                                                    var url = "{{ route('admin.horarios.cargar_datos_consultorios', ['id' => ':id']) }}";
                                                    url = url.replace(':id', consultorio_id);

                                                    if (consultorio_id != '') {
                                                        $.ajax({
                                                            url: url,
                                                            type: 'GET',
                                                            success: function(data) {
                                                                $('#consultorio_info').html(data);
                                                            },
                                                            error: function(xhr, status, error) {
                                                                console.error("Error en la petición AJAX:", xhr.responseText);
                                                                alert('Error en la carga de datos');
                                                            }
                                                        });
                                                    } else {
                                                        $('#consultorio_info').html('');
                                                    }
                                                });
                                            });
                                            </script>

                                        </div>
                                        @error('consultorio_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-12">
                                    <div class="col-md-12">
                                        <label for="doctor_id" class="fw-bold">Doctor <b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="bi bi-person-check"></i>
                                            </span>
                                            <select name="doctor_id" id="doctor_id"
                                                class="form-control focus-ring focus-ring-primary" required>
                                                <option value="" disabled="">SELECCIONA UN DOCTOR</option>
                                                @foreach($doctores as $doctor)
                                                <option value="{{ $doctor->id }}">
                                                    {{ $doctor->id }} - {{ $doctor->nombre }} {{ $doctor->apellido }} -
                                                    {{
                                                    $doctor->especialidad }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('doctor_id')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <br>


                                <div class="row mt-12">
                                    <div class="col-md-12">
                                        <label for="dia" class="fw-bold">Día <b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-info text-white">
                                                <i class="bi bi-calendar-day"></i>
                                            </span>
                                            <select name="dia" id="dia"
                                                class="form-control focus-ring focus-ring-primary" required>
                                                <option value="LUNES">Lunes</option>
                                                <option value="MARTES">Martes</option>
                                                <option value="MIERCOLES">Miércoles</option>
                                                <option value="JUEVES">Jueves</option>
                                                <option value="VIERNES">Viernes</option>
                                                <option value="SABADO">Sábado</option>
                                            </select>
                                        </div>
                                        @error('dia')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mt-12">
                                    <div class="col-md-12">
                                        <label for="hora_inicio" class="fw-bold">Hora de inicio <b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-success text-white">
                                                <i class="bi bi-clock"></i>
                                            </span>
                                            <input type="time" value="{{ old('hora_inicio') }}" id="hora_inicio"
                                                name="hora_inicio" class="form-control focus-ring focus-ring-success"
                                                required>
                                        </div>
                                        @error('hora_inicio')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-12">
                                    <div class="col-md-12">
                                        <label for="hora_fin" class="fw-bold">Hora final <b>*</b></label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-danger text-white">
                                                <i class="bi bi-clock-history"></i>
                                            </span>
                                            <input type="time" value="{{ old('hora_fin') }}" id="hora_fin"
                                                name="hora_fin" class="form-control focus-ring focus-ring-danger"
                                                required>
                                        </div>
                                        @error('hora_fin')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mt-12">
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mt-4">
                                            <a href="{{ url('admin/horarios') }}" class="btn btn-secondary shadow-sm">
                                                <i class="bi bi-arrow-left-circle me-2"></i> Cancelar
                                            </a>
                                            <button type="submit" class="btn btn-success shadow-sm">
                                                <i class="bi bi-save me-2"></i> Guardar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <div id="consultorio_info"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
