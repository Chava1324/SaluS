@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <div class="row mb-4">
            <h1 class="display-5 text-center">Listado de Pacientes</h1>
        </div>
        <hr>

        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg border-0 rounded-3">
                    <div
                        class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                        <h3 class="card-title"><i class="fas fa-calendar-alt me-2"></i>Pacientes Registrados</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <a href="{{ route('admin.pacientes.create') }}" class="btn btn-success btn-sm shadow-sm">
                                <i class="fas fa-user-plus"></i> Crear nuevo Paciente
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
                                                <th scope="col" class="th-custom"><i class="bi bi-hash"></i> <b></b>
                                                </th>
                                                <th scope="col" class="th-custom"><i class="bi bi-person"></i> <b>Nombre
                                                        apellido</b></th>
                                                <th scope="col" class="th-custom"><i class="bi bi-file-person"></i>
                                                    <b>Curp</b>
                                                </th>
                                                <th scope="col" class="th-custom"><i class="bi bi-file-medical"></i>
                                                    <b>Nss</b>
                                                </th>
                                                <th scope="col" class="th-custom"><i class="bi bi-calendar"></i> <b>Fecha
                                                        Nacimiento</b></th>
                                                <th scope="col" class="th-custom"><i class="bi bi-gender-ambiguous"></i>
                                                    <b>Género</b>
                                                </th>
                                                <th scope="col" class="th-custom"><i class="bi bi-envelope"></i>
                                                    <b>Email</b>
                                                </th>
                                                <th scope="col" class="th-custom"><i class="bi bi-house-door"></i>
                                                    <b>Dirección</b>
                                                </th>
                                                <th scope="col" class="th-custom"><i class="bi bi-tools"></i>
                                                    <b>Acciones</b>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $contador = 1; @endphp
                                            @foreach ($pacientes as $paciente)
                                                <tr class="align-middle">
                                                    <td class="td-custom">{{ $contador++ }}</td>
                                                    <td class="td-custom">{{ $paciente->nombres }}
                                                        {{ $paciente->apellidos }}
                                                    </td>
                                                    <td class="td-custom">{{ $paciente->curp }}</td>
                                                    <td class="td-custom">{{ $paciente->nss }}</td>
                                                    <td class="td-custom">{{ $paciente->fecha_nacimiento }}</td>
                                                    <td class="td-custom">{{ $paciente->genero }}</td>
                                                    <td class="td-custom">{{ $paciente->correo }}</td>
                                                    <td class="td-custom">{{ $paciente->direccion }}</td>
                                                    <td class="td-custom">
                                                        <div class="d-flex justify-content-center gap-2">
                                                            <a href="{{ url('admin/pacientes/' . $paciente->id) }}"
                                                                class="btn btn-sm btn-info">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            <a href="{{ url('admin/pacientes/' . $paciente->id . '/edit') }}"
                                                                class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form action="#" method="POST" class="d-inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <a href="{{ url('admin/pacientes/' . $paciente->id . '/confirm-delete') }}"
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
    @endsection
