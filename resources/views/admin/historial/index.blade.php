@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="row mb-4">
        <h1 class="display-5 text-center">Citas e Historials</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="card shadow-lg border-0 rounded-3">
                <div
                    class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
                    <h3 class="card-title"><i class="fas fa-calendar-alt me-2"></i>Historial medicos</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <a href="{{ route('admin.historial.create') }}" class="btn btn-success btn-sm shadow-sm">
                            <i class="fas fa-user-plus"></i> Crear nuevo historial
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
                                    <thead class="table-dark text-center">
                                        <tr>
                                            <th><i class="bi bi-hash"></i> <b>#</b></th>
                                            <th><i class="bi bi-hospital"></i> <b>Detalle</b></th>
                                            <th><i class="bi bi-calendar-event"></i> <b>Fecha</b></th>
                                            <th><i class="bi bi-person-fill"></i> <b>Paciente</b></th>
                                            <th><i class="bi bi-person-badge-fill"></i> <b>Doctor</b></th>
                                            <th><i class="bi bi-gear-fill"></i> <b>Acciones</b></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center align-middle">
                                        @php $contador = 1; @endphp
                                        @foreach ($historials as $historiale)
                                        @if (Auth::user()->hasRole('admin') || $historiale->doctor_id ==
                                        Auth::user()->doctor->id)

                                        <tr>
                                            <td>{{ $contador++ }}</td>
                                            <td>{!! \Illuminate\Support\Str::limit($historiale->detalle, 100, '...') !!}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($historiale->fecha_visita)->format('d/m/Y') }}
                                            </td>

                                            <td>
                                                {{ $historiale->paciente->apellidos }} {{ $historiale->paciente->nombres
                                                }}
                                            </td>

                                            <td>
                                                {{ $historiale->doctor->apellido }} {{ $historiale->doctor->nombre }}
                                            </td>

                                            {{-- Acciones --}}
                                            <td>
                                                <div class="d-flex justify-content-center gap-2">
                                                    <a href="{{ url('admin/historial/' . $historiale->id) }}"
                                                        class="btn btn-sm btn-info shadow-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="{{ url('admin/historial/' . $historiale->id . '/edit') }}"
                                                        class="btn btn-sm btn-primary shadow-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ url('admin/historial/' . $historiale->id . '/edit') }}"
                                                        class="btn btn-sm btn-primary shadow-sm">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    {{-- <form
                                                        action="{{ route('admin.historial.destroy', $historiale->id) }}"
                                                        method="POST" class="d-inline-block formulario-eliminar">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger btn-eliminar shadow-sm">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form> --}}
                                                    <script>
                                                        document.querySelectorAll('.btn-eliminar').forEach(btn => {
                                                    btn.addEventListener('click', function (e) {
                                                        e.preventDefault();
                                                        const form = this.closest('form');
                                                        Swal.fire({
                                                            title: '¿Estás seguro?',
                                                            text: 'Esta acción no se puede deshacer',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonColor: '#d33',
                                                            cancelButtonColor: '#6c757d',
                                                            confirmButtonText: 'Sí, eliminar',
                                                            cancelButtonText: 'Cancelar'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                form.submit();
                                                            }
                                                        });
                                                    });
                                                });
                                                    </script>
                                                </div>
                                            </td>
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
            </div>
        </div>
    </div>
</div>
@endsection