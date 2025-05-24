@extends('layouts.admin')

@section('content')
<div class="row">
    <h1 class="text-dark fw-bold"><i class="bi bi-speedometer2"></i> <b>Bienvenido: </b>{{Auth::User()->name}} - <b>Rol:
        </b>{{Auth::User()->roles->pluck('name')->first()}}</h1>
</div>
<hr>

<div class="row">
    <!-- Usuarios -->
    @can('admin.usuarios.index')
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-4 text-white bg-dark">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold">{{ $total_usuarios }}</h3>
                    <p class="mb-0">Usuarios Registrados</p>
                </div>
                <i class="bi bi-people-fill display-2 text-primary"></i>
            </div>
            <a href="{{ url('admin/usuarios') }}" class="btn btn-outline-primary w-100 rounded-bottom">
                Ver detalles <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    @endcan

    @can('admin.secretarias.index')
    <!-- Auxiliares Administrativos -->
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-4 text-white bg-dark">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold">{{ $total_secretarias }}</h3>
                    <p class="mb-0">Auxiliares Administrativos</p>
                </div>
                <i class="bi bi-person-badge-fill display-2 text-info"></i>
            </div>
            <a href="{{ url('admin/secretarias') }}" class="btn btn-outline-info w-100 rounded-bottom">
                Ver detalles <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    @endcan
    <!-- Pacientes -->
    @can('admin.pacientes.index')


    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-4 text-white bg-dark">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold">{{ $total_pacientes }}</h3>
                    <p class="mb-0">Pacientes</p>
                </div>
                <i class="bi bi-person-heart display-2 text-info"></i>
            </div>
            <a href="{{ url('admin/pacientes') }}" class="btn btn-outline-success w-100 rounded-bottom">
                Ver detalles <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    @endcan
    <!-- Consultorios -->

    @can('admin.consultorios.index')
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-4 text-white bg-dark">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold">{{ $total_consultorios }}</h3>
                    <p class="mb-0">Consultorios</p>
                </div>
                <i class="bi bi-building display-2 text-info"></i>
            </div>
            <a href="{{ url('admin/consultorios') }}" class="btn btn-outline-warning w-100 rounded-bottom">
                Ver detalles <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    @endcan
    @can('admin.doctores.index')
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-4 text-white bg-dark">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold">{{ $total_doctores }}</h3>
                    <p class="mb-0">Doctores</p>
                </div>
                <i class="bi bi-capsule display-2 text-info"></i>
            </div>
            <a href="{{ url('admin/doctores') }}" class="btn btn-outline-danger w-100 rounded-bottom">
                Ver detalles <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    @endcan
    @can('admin.horarios.index')
    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-lg rounded-4 text-white bg-dark">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold text-light">{{ $total_horario }}</h3>
                    <p class="mb-0 text-white-50">Horario</p>
                </div>
                <i class="bi bi-clock-history display-2 text-light"></i>
            </div>
            <div class="w-100" style="height: 4px; background-color: #6c757d;"></div>
            <a href="{{ url('admin/horarios') }}" class="btn btn-outline-light w-100 rounded-bottom hover-effect">
                Ver detalles <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    <style>
        .hover-effect {
            transition: background-color 0.3s, color 0.3s;
        }

        .hover-effect:hover {
            background-color: #6c757d !important;
            color: #ffffff !important;
            border-color: #6c757d !important;
        }
    </style>
    @endcan

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-lg rounded-4 text-white bg-dark">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold text-light">{{ $total_eventos }}</h3>
                    <p class="mb-0 text-white-50">Repoertes de citas</p>
                </div>
                <i class="bi bi-calendar-check display-2 text-light"></i>
            </div>
            <div class="w-100" style="height: 4px; background-color: #6c757d;"></div>
            <a href="" class="btn btn-outline-light w-100 rounded-bottom hover-effect"><i class="bi bi-check"></i>
            </a>
        </div>
    </div>
    <style>
        .hover-effect {
            transition: background-color 0.3s, color 0.3s;
        }

        .hover-effect:hover {
            background-color: #6c757d !important;
            color: #ffffff !important;
            border-color: #6c757d !important;
        }
    </style>

    @can('admin.horarios.cargar_datos_consultorios')

    <div class="col-lg-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm rounded-4 text-white bg-dark">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold">{{ $total_horario }}</h3>
                    <p class="mb-0">Calendario de Consultorios</p>
                </div>
                <i class="bi bi-calendar-event display-2 text-info"></i>
            </div>
            <a href="{{ url('admin/consultorios') }}" class="btn btn-outline-light w-100 rounded-bottom">
                Ver detalles <i class="bi bi-arrow-right-circle"></i>
            </a>
        </div>
    </div>
    @endcan

</div>
@can('admin.horarios.cargar_datos_consultorios')
<div class="row">
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden card-success"
                style="min-height: 80vh; background-color: #f8f9fa;">
                <!-- Encabezado con colores claros -->
                <div class="card-header bg-gradient-to-r from-blue-400 to-blue-600 text-black p-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                        <div class="d-flex align-items-center">
                            <span class="rounded-circle bg-blue-500 p-2 me-3">
                                <i class="fas fa-calendar-alt fa-lg text-white"></i>
                            </span>
                            <h2 class="card-title mb-0 text-xl font-bold tracking-tight">
                                Calendario de horarios de Consultorios
                            </h2>
                        </div>

                        <div class="w-100 w-md-50">
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-blue-500 text-black px-3 py-2">
                                    <i class="bi bi-building me-2"></i>Consultorio:
                                </span>
                                <select name="consultorio_id" id="consultorio_select"
                                    class="form-select rounded-end focus:ring-2 focus:ring-blue-400 focus:border-blue-500 py-2"
                                    aria-label="Seleccionar consultorio" required>
                                    <option value="" selected disabled>Seleccione un consultorio...</option>
                                    @foreach ($consultorios as $consultorio)
                                    <option value="{{ $consultorio->id }}">
                                        {{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Por favor seleccione un doctor</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Área de información con fondo claro -->
                <div id="consultorio_info" class="p-0 d-flex justify-content-center align-items-center"
                    style="min-height: 60vh; background-color: #ffffff;">
                    <div class="text-center text-black">
                        <span class="rounded-circle bg-blue-500 p-3">
                            <i class="bi bi-calendar-x text-black text-6xl"></i>
                        </span>
                        <h4 class="mt-3 font-medium">Seleccione un consultorio para ver los horarios</h4>
                        <p class="mt-2 text-muted">Los datos se cargarán automáticamente</p>
                    </div>
                </div>

                <!-- Loading state -->
                <div id="loading_indicator" class="d-none text-center py-5">
                    <div class="spinner-border text-blue-500" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                    <p class="text-blue-500 mt-2">Cargando horarios...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#consultorio_select').on('change', function() {
                var consultorio_id = $(this).val();
                var url = "{{ route('admin.horarios.cargar_datos_consultorios', ['id' => ':id']) }}".replace(':id', consultorio_id);

                if (consultorio_id !== '') {
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function(data) {
                            $('#consultorio_info').html(data);
                        },
                        error: function(xhr) {
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
    <div class="row justify-content-center mt-4">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-3 overflow-hidden card-warning">
                <div class="card-header bg-gradient-to-r from-blue-400 to-blue-600 text-black p-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                        <div class="d-flex align-items-center">
                            <span class="rounded-circle bg-blue-500 p-2 me-3">
                                <i class="fas fa-calendar-alt fa-lg text-white"></i>
                            </span>
                            <h2 class="card-title mb-0 text-xl font-bold tracking-tight">
                                Calendario de Reservas de Citas Médicas
                            </h2>
                        </div>

                        <div class="w-100 w-md-50">
                            <div class="input-group has-validation">
                                <span class="input-group-text bg-blue-500 text-black px-3 py-2">
                                    <i class="bi bi-building me-2"></i>Doctores:
                                </span>
                                <select name="doctor_id" id="doctor_select"
                                    class="form-control focus-ring focus-ring-primary" required>
                                    <option value="" disabled="">SELECCIONA UN DOCTOR</option>
                                    @foreach($doctores as $doctor)
                                    <option value="{{ $doctor->id }}">
                                        {{ $doctor->id }} - {{ $doctor->nombre }} {{$doctor->apellido }} -
                                        {{$doctor->especialidad }}
                                    </option>
                                    @endforeach
                                </select>

                                <script>

                                    document.addEventListener('DOMContentLoaded', function () {
                                        var calendarEl = document.getElementById('calendar');
                                        var calendar = new FullCalendar.Calendar(calendarEl, {
                                            initialView: 'dayGridMonth',
                                            locale: 'es',
                                            events: []
                                        });
                                        calendar.render();

                                        $('#doctor_select').on('change', function () {
                                            var doctor_id = $(this).val();
                                            if (doctor_id) {
                                                $.ajax({
                                                    url: "{{ url('/cargar_reserva_doctores') }}/" + doctor_id,
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    success: function (data) {
                                                        calendar.addEventSource(data);
                                                    },
                                                    error: function (xhr) {
                                                        console.error("Error en la petición AJAX:", xhr.responseText);
                                                        alert('Error en la carga de datos');
                                                    }
                                                });
                                            } else {
                                                calendar.removeAllEvents();
                                            }
                                        });
                                    });
                                </script>

                            </div>
                            <div id="doctor_info">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card-body">
                        <div class="row">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fas fa-calendar-plus me-2"></i>Registrar cita médica
                            </button>
                            <a href="{{ url('/admin/ver_reservas', Auth::user()->id) }}" class="btn btn-success">
                                <i class="bi bi-calendar-check"></i> Ver mis reservas
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="exampleModalLabel"><i
                                                    class="fas fa-calendar-check me-2"></i> Registrar Cita</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{url('/admin/eventos/create')}}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row mt-12">
                                                    <div class="col-md-12">
                                                        <label for="doctor_id" class="fw-bold">Doctor <b>*</b></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-primary text-white">
                                                                <i class="bi bi-person-check"></i>
                                                            </span>
                                                            <select name="doctor_id" id="doctor_id"
                                                                class="form-control focus-ring focus-ring-primary"
                                                                required>
                                                                <option value="" disabled="">SELECCIONA UN DOCTOR
                                                                </option>
                                                                @foreach($doctores as $doctor)
                                                                <option value="{{ $doctor->id }}">
                                                                    {{ $doctor->id }} - {{ $doctor->nombre }} {{
                                                                    $doctor->apellido }} -
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

                                                <div class="row mt-12">
                                                    <div class="col-md-12">
                                                        <label for="fecha_reserva" class="fw-bold">Fecha para tu cita
                                                            <b>*</b></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-success text-white">
                                                                <i class="fas fa-calendar-alt"></i>
                                                            </span>
                                                            <input type="date"
                                                                class="form-control focus-ring focus-ring-success"
                                                                id="fecha_reserva" name="fecha_reserva"
                                                                value="<?php echo date('Y-m-d') ?>" required>
                                                        </div>
                                                        @error('fecha_reserva')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <script>
                                                    document.addEventListener('DOMContentLoaded', function() {
                                                    const fechaReservaInput = document.getElementById('fecha_reserva');

                                                    // Se escucha el evento actual
                                                    fechaReservaInput.addEventListener('change', function() {
                                                        let selectedDate = this.value; // Se obtiene la fecha seleccionada

                                                        // Se obtiene la fecha actual formateada yyyy-mm-dd
                                                        let today = new Date().toISOString().split('T')[0];
                                                        // Verificación si la fecha seleccionada es anterior a la fecha actual
                                                        if (selectedDate < today) {
                                                            this.value = null;
                                                            alert('La fecha seleccionada no puede ser anterior a la fecha actual.');
                                                        }
                                                    });
                                                });
                                                </script>

                                                <div class="row mt-12">
                                                    <div class="col-md-12">
                                                        <label for="hora" class="fw-bold">Hora <b>*</b></label>
                                                        <div class="input-group">
                                                            <span class="input-group-text bg-warning text-white">
                                                                <i class="fas fa-clock"></i>
                                                            </span>
                                                            <input type="time"
                                                                class="form-control focus-ring focus-ring-warning"
                                                                id="hora_reserva" name="hora_reserva" step="3600"
                                                                required>
                                                        </div>
                                                        @error('hora_reserva')
                                                        <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                    <script>
                                                        document.addEventListener('DOMContentLoaded', function() {
                                                        const horaReservaInput = document.getElementById('hora_reserva');

                                                        // Se escucha el evento actual
                                                        horaReservaInput.addEventListener('change', function() {
                                                            let selectedTime = this.value; // Se obtiene la hora seleccionada

                                                            // Se obtiene la fecha actual formateada hh:mm
                                                            if (selectedTime) {
                                                                selectedTime = selectedTime.split(':');
                                                                selectedTime = selectedTime[0] + ':00';
                                                                this.value = selectedTime;
                                                            }
                                                            // Verificación si la hora seleccionada es anterior a la hora actual
                                                            if (selectedTime < '08:00' || selectedTime > '20:00') {
                                                                this.value = null;
                                                                alert('La hora seleccionada no es válida. Debe estar entre las 08:00 AM y las 08:00 PM.');
                                                            }
                                                        });
                                                    });
                                                    </script>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    <i class="fas fa-times"></i> Cerrar
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fas fa-save"></i> Registrar cita
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.getElementById('hora_reserva').addEventListener('change', function () {
                            let horaSeleccionada = this.value;
                            if (horaSeleccionada) {
                                let [hora_reserva, _] = horaSeleccionada.split(':');
                                this.value = `${hora_reserva.padStart(2, '0')}:00`;
                            }
                        });
                        </script>
                        <style>
                            input[type="time"]::-webkit-datetime-edit-minutes-field,
                            input[type="time"]::-webkit-datetime-edit-seconds-field,
                            input[type="time"]::-webkit-inner-spin-button {
                                display: none;
                            }
                        </style>
                        <div id="calendar">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endcan



@if (Auth::user()->hasRole('doctor'))
 <div class="row mt-3">
    <!-- mt-3 para darle separación hacia abajo -->
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Calendario de reservas</h3>
                    </div>
                </div>
            </div>
            <div class="table-responsive">

                {{-- <h1>{{ Auth::user()->doctor->id }}</h1> --}}


                <table id="tblUsuarios" class="table table-striped table-hover table-bordered text-center dark">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="th-custom"><i class="fas fa-hashtag"></i>
                                <b></b>
                            </th>
                            <th scope="col" class="th-custom"><i class="fas fa-user-tag"></i>
                                <b>Paciente</b>
                            </th>
                            <th scope="col" class="th-custom"><i class="fas fa-calendar-alt"></i>
                                <b>Fecha Reserva</b>
                            </th>
                            <th scope="col" class="th-custom"><i class="fas fa-clock"></i>
                                <b>Hora reserva</b>
                            </th>
                            {{-- <th scope="col" class="th-custom"><i class="fas fa-tools"></i>
                                <b>Acciones</b>
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php $contador = 1; @endphp
                        @foreach ($eventos as $evento)
                        @if (Auth::user()->doctor->id == $evento->doctor_id)
                        <tr class="align-middle">
                            <td class="td-custom">{{ $contador++ }}</td>
                            <td class="td-custom">{{ $evento->user->name }}</td>
                            <td class="td-custom">{{ \Carbon\Carbon::parse($evento->fecha_reserva)->format('d/m/Y')
                                }}</td>
                            <td class="td-custom">{{ \Carbon\Carbon::parse($evento->hora_reserva)->format('h:i A')
                                }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                <style>
                    .th-custom {
                        background-color: #003366;
                        /* Azul oscuro elegante */
                        color: white;
                        padding: 12px;
                        text-align: center;
                        text-transform: uppercase;
                        font-weight: bold;
                        border: 1px solid #ffffff30;
                    }

                    /* Estilos para las celdas */
                    .td-custom {
                        padding: 10px;
                        border: 1px solid #dee2e6;
                        text-align: center;
                        vertical-align: middle;
                        background-color: #f8f9fa;
                        font-size: 14px;
                    }

                    /* Estilos para filas alternas */
                    tbody tr:nth-child(even) .td-custom {
                        background-color: #e9ecef;
                    }

                    /* Efecto hover */
                    tbody tr:hover .td-custom {
                        background-color: #d6e4f0;
                        transition: 0.3s;
                    }

                    /* Ajuste de botones */
                    .btn-info,
                    .btn-primary,
                    .btn-danger {
                        border-radius: 5px;
                        padding: 5px 10px;
                    }

                    .table-responsive {
                        overflow-x: auto;
                        -webkit-overflow-scrolling: touch;

                    }
                </style>
                <script>
                    $(document).ready(function() {
                            $('#tblUsuarios').DataTable({
                                "language": {
                                    "lengthMenu": "Mostrar _MENU_ registros por página",
                                    "zeroRecords": "No se encontraron resultados",
                                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                                    "infoEmpty": "No hay registros disponibles",
                                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                                    "search": "Buscar:",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Último",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                dom: 'Bfrtip',
                                buttons: [{
                                        extend: 'collection',
                                        text: '<i class="fas fa-file-export"></i> Exportar',
                                        className: 'btn btn-primary dropdown-toggle',
                                        buttons: [{
                                                extend: 'copy',
                                                text: '<i class="fas fa-copy"></i> Copiar',
                                                className: 'dropdown-item'
                                            },
                                            {
                                                extend: 'csv',
                                                text: '<i class="fas fa-file-csv"></i> CSV',
                                                className: 'dropdown-item'
                                            },
                                            {
                                                extend: 'excel',
                                                text: '<i class="fas fa-file-excel"></i> Excel',
                                                className: 'dropdown-item'
                                            },
                                            {
                                                extend: 'pdf',
                                                text: '<i class="fas fa-file-pdf"></i> PDF',
                                                className: 'dropdown-item'
                                            },
                                            {
                                                extend: 'print',
                                                text: '<i class="fas fa-print"></i> Imprimir',
                                                className: 'dropdown-item'
                                            }
                                        ]
                                    },
                                    {
                                        extend: 'colvis',
                                        text: '<i class="fas fa-columns"></i> Mostrar columnas',
                                        className: 'btn btn-secondary'
                                    }
                                ]
                            });
                        });
                </script>
            </div>
        </div>
    </div>
</div>
@endif


@endsection
