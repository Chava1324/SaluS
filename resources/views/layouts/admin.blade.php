<?php
        use App\Models\Configuraciones;
        $configuracion = Configuraciones::first();
       ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>🩺 Citas medicas 🩺</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ url('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ url('dist/css/adminlte.min.css') }}">
    <!-- ICONOS DE BSTP  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- CDN DE SWEETALERTO-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <!-- FULLCALENDAR -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <script src="{{url('fullcalendar/es.global.js')}}"></script>

    <!-- CKEDITOR
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/45.0.0/ckeditor5.css" />-->



    <!-- jQuery -->
    <script src="{{ url('plugins/jquery/jquery.min.js') }}"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/admin') }}" class="nav-link">Sistema de reservas de citas medicas</a>
                </li>

            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link d-flex align-items-center py-3 px-2"
                style="background: linear-gradient(90deg, #60666d 0%, #36626e 100%); box-shadow: 0 2px 8px rgba(211, 3, 3, 0.08);">
                <img src="{{ asset('storage/' . $configuracion->logo) }}" alt="logo" width="48" height="48"
                    class="img-fluid rounded-circle shadow-sm border border-white" style="object-fit: cover;">
                <div class="d-flex flex-column ms-3">
                    <span class="brand-text fw-bold text-white" style="font-size: 1.15rem;">{{ $configuracion->nombre
                        }}</span>
                    <small class="text-white-50" style="font-size: 0.95rem;"><i class="bi bi-telephone"></i> {{
                        $configuracion->telefono }}</small>
                </div>
            </a> <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info d-flex align-items-center">
                         <div>
                            <span class="text-white-50 small">Usuario:</span>
                            <a href="#" class="d-block fw-bold text-white" style="text-decoration: none;">{{
                                Auth::user()->name }}</a>
                        </div>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        @can('admin.usuarios.index')
                        <li class="nav-item">
                            <a href="{{ url('admin/configuraciones') }}" class="nav-link active">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>
                                    Configuracion
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                        </li>
                        @endcan
                        @can('admin.usuarios.index')
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas bi bi-people-fill"></i>
                                <p>
                                    Usuarios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/usuarios/create') }}" class="nav-link active">
                                        <i class="bi bi-person-fill-add"></i>
                                        <p>Creacion de usuarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/usuarios') }}" class="nav-link active">
                                        <i class="bi bi-person-lines-fill"></i>
                                        <p>Administracion de usuarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('admin.secretarias.index')


                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas bi bi-person-standing-dress"></i>
                                <p>
                                    Aux. administrativos
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/secretarias/create') }}" class="nav-link active">
                                        <i class="bi bi-person-fill-up"></i>
                                        <p>Creacion de Auxiliares</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/secretarias') }}" class="nav-link active">
                                        <i class="bi bi-person-check"></i>
                                        <p>Administracion de Auxiliares</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('admin.pacientes.index')
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon bi bi-people"></i>
                                <p>
                                    Pacientes <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/pacientes/create') }}" class="nav-link active">
                                        <i class="bi bi-person-plus"></i>
                                        <p>Creación de pacientes</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/pacientes') }}" class="nav-link active">
                                        <i class="bi bi-person-badge"></i>
                                        <p>Administración de pacientes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        @can('admin.consultorios.index')
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas bi bi-door-open"></i>
                                <p>
                                    Consultorios <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/consultorios/create') }}" class="nav-link active">
                                        <i class="bi bi-hospital"></i>
                                        <p>Creacion de consultorio</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/consultorios') }}" class="nav-link active">
                                        <i class="bi bi-bandaid"></i>
                                        <p>Administracion de consultorios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        @can('admin.doctores.index')
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas bi bi-person-lines-fill"></i> <!-- Icono para Doctores -->
                                <p>
                                    Doctores <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/doctores/create') }}" class="nav-link active">
                                        <i class="bi bi-capsule"></i>
                                        <p>Creación de doctores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/doctores') }}" class="nav-link active">
                                        <i class="bi bi-person-heart"></i>
                                        <p>Administración de doctores</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/doctores/reportes') }}" class="nav-link active">
                                        <i class="bi bi-bar-chart"></i>
                                        <p>Reportes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        @can('admin.horarios.index')
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas bi bi-calendar2-plus-fill"></i>
                                <p>
                                    Horarios <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/horarios/create') }}" class="nav-link active">
                                        <i class="bi bi-clock-fill"></i>
                                        <p>Creación de horarios</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('admin/horarios') }}" class="nav-link active">
                                        <i class="bi bi-calendar3-range-fill"></i>
                                        <p>Administración de horarios</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        @can('admin.usuarios.index')
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon bi bi-calendar-check-fill"></i> <!-- Icono para Reservas -->
                                <p>
                                    Reportes por citas <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/reservas/reportes') }}" class="nav-link active">
                                        <i class="bi bi-file-earmark-bar-graph"></i> <!-- Icono para Reportes -->
                                        <p>Reportes</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('admin.historial.index')
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon bi bi-journal-medical"></i> <!-- Icono para Historial Clínico -->
                                <p>
                                    Citas medicas <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('admin/historial') }}" class="nav-link active">
                                        <i class="bi bi-file-earmark-medical"></i> <!-- Icono para Reportes -->
                                        <p>Listado de historial</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan



                        <li class="nav-item">
                            <a href="{{route('logout')}}" class="nav-link" style="background-color: #a9200e;" id=""
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <i class="nav-icon bi-door-closed"></i>
                                <p>
                                    Cerrar sesion
                                </p>
                            </a>
                        </li>


                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @if (($message = Session::get('mensaje')) && ($icono = Session::get('icono')))
        <script>
            Swal.fire({
                    position: "top-end",
                    icon: '{{ $icono }}',
                    title: '¡Correcto!',
                    text: '{{ $message }}',
                    showConfirmButton: false,
                    timer: 3000
                });
        </script>
        @endif


        <div class="content-wrapper">
            <br>

            <div class="container">
                @yield('content')
            </div>

        </div>
        {{--
        <!-- Content Wrapper. Contains page content -->

        <!-- /.control-sidebar --> --}}

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Hospital SaluS
            </div>
            <!-- Default to the left -->
            <strong>
                Copyright &copy; 2025 ChavaDeV 1324
                <img src="{{ asset('dist/img/logoDev.png') }}" alt="Logo ChavaDev" style="height: 40px;">
            </strong>
            <strong>VIVA EL CÓDIGO LIBRE</strong>
        </footer>


    </div>


    <!-- REQUIRED SCRIPTS -->

    <!-- Bootstrap 4 -->
    <script src="{{ url('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ url('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ url('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ url('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>




    <!-- AdminLTE App -->
    <script src="{{ url('dist/js/adminlte.min.js') }}"></script>
</body>

</html>
