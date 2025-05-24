@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <h1 class="display-5 text-center">Listado de Horarios</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div
                    class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-calendar-alt me-2"></i> Horarios Registrados</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.horarios.create') }}" class="btn btn-success btn-sm shadow-sm">
                            <i class="fas fa-user-plus"></i> Crear nuevo horario
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if ($message = Session::get('mensaje'))
                    {{-- <div class="alert alert-success">{{ $message }}</div> --}}
                    <script>
                        Swal.fire({
                                    position: "top-end",
                                    icon: 'success',
                                    title: '¡Correcto!',
                                    text: '{{ $message }}',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                    </script>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="tblUsuarios"
                                    class="table table-striped table-hover table-bordered text-center dark">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="th-custom"><i class="bi bi-hash"></i>
                                                <b>ID</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-person-vcard"></i>
                                                <b>Doctor</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-clipboard2-pulse"></i>
                                                <b>Especialidad</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-building"></i>
                                                <b>Consultorio</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-calendar-event"></i>
                                                <b>Día de cita</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-clock"></i>
                                                <b>Hora inicio</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-clock-history"></i>
                                                <b>Hora fin</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-gear"></i>
                                                <b>Acciones</b>
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @php $contador = 1; @endphp
                                        @foreach ($horarios as $horario)
                                        <tr class="align-middle">
                                            <td class="td-custom">{{ $contador++ }}</td>
                                            <td class="td-custom">{{ $horario->doctor->nombre."
                                                ".$horario->doctor->apellido}}</td>
                                            <td class="td-custom">{{ $horario->doctor->especialidad }}</td>
                                            <td class="td-custom"> {{ $horario->consultorio->nombre }} <br> <small
                                                    class="text-muted">Ubicación: {{
                                                    $horario->consultorio->ubicacion}}</small></td>
                                            <td class="td-custom">{{ $horario->dia }}</td>
                                            <td class="td-custom">{{ $horario->hora_inicio }}</td>
                                            <td class="td-custom">{{ $horario->hora_fin }}</td>
                                            <td class="td-custom">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ url('admin/horarios/' . $horario->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('admin/horarios/' . $horario->id . '/edit') }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form action="#" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{ url('admin/horarios/' . $horario->id . '/confirm-delete') }}"
                                                            type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
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
            </div>
        </div>
    </div>
    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div
                    class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">
                        <i class="fas fa-calendar-alt me-2"></i> Calendario de horarios
                    </h3>
                    <div class="input-group w-50">
                        <span class="input-group-text bg-secondary text-white">
                            <i class="bi bi-building"></i>
                        </span>
                        <select name="consultorio_id" id="consultorio_select"
                            class="form-control focus-ring focus-ring_secondary" required>
                            <option value="">SELECCIONE UN CONSULTORIO...</option>
                            @foreach ($consultorios as $consultorio)
                            <option value="{{ $consultorio->id }}">
                                {{ $consultorio->id }} - {{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
    $('#consultorio_select').on('change', function() {
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
                <div id="consultorio_info">

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

{{-- <tbody>
    <tr style="text-align: center;">
        <td>8:00 - 9:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>9:00 - 10:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>10:00 - 11:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>11:00 - 12:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>12:00 - 13:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>13:00 - 14:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>14:00 - 15:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>15:00 - 16:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>16:00 - 17:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>17:00 - 18:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>18:00 - 19:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr style="text-align: center;">
        <td>19:00 - 20:00</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</tbody> --}}
