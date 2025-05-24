@extends('layouts.admin')
@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <h1 class="display-5 text-center">Listado de Auxiliares administrativo</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-18">
            <div class="card shadow-lg border-0 rounded-3">
                <div
                    class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-calendar-alt me-2"></i> Auxilires administrativos
                        registrados
                    </h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <a href="{{ route('admin.secretarias.create') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-user-plus"></i> Crear nuevo auxiliar
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
                                    class="table table-striped table-hover table-bordered text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col" class="th-custom"><i class="bi bi-hash"></i> <b>#</b></th>
                                            <th scope="col" class="th-custom"><i class="bi bi-person"></i>
                                                <b>Nombre(s)</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-person-badge"></i>
                                                <b>Apellidos</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-card-list"></i>
                                                <b>Identificación</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-calendar-date"></i>
                                                <b>Fecha Nacimiento</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-geo-alt"></i>
                                                <b>Dirección</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-envelope"></i>
                                                <b>Email</b>
                                            </th>
                                            <th scope="col" class="th-custom"><i class="bi bi-tools"></i>
                                                <b>Acciones</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $contador = 1; @endphp
                                        @foreach ($secretarias as $secretaria)
                                        <tr class="align-middle">
                                            <td class="td-custom">{{ $contador++ }}</td>
                                            <td class="td-custom">{{ $secretaria->nombres }}</td>
                                            <td class="td-custom">{{ $secretaria->apellidos }}</td>
                                            <td class="td-custom">{{ $secretaria->curp }}</td>
                                            <td class="td-custom">{{ $secretaria->fecha_nacimiento }}</td>
                                            <td class="td-custom">{{ $secretaria->direccion }}</td>
                                            <td class="td-custom">{{ $secretaria->user->email ?? 'Sin email' }}</td>
                                            <td class="td-custom">
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ url('admin/secretarias/' . $secretaria->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ route('admin.secretarias.edit', $secretaria->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.secretarias.confirm-delete', $secretaria->id) }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
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

                                    .table-responsive {
                                        width: 100%;
                                        overflow-x: auto !important;
                                        -webkit-overflow-scrolling: touch;
                                    }
                                </style>
                                <script>
                                    $(document).ready(function() {
                                            $('#tblUsuarios').DataTable({
                                                "language": {
                                                    "autoWidth": false, // Desactiva el auto ajuste de ancho
                                                    "responsive": true, // Activa el diseño responsivo de DataTables
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
</div>
@endsection