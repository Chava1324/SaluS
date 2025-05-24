@extends('layouts.admin')

@section('content')
<div class="container-fluid vh-10 d-flex flex-column justify-content-center align-items-center py-5">
    <div class="col-lg-8 col-md-10">
        <div class="card shadow-lg border-0 rounded-3">
            <!-- Encabezado -->
            <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center py-4">
                <h3 class="fw-bold text-uppercase mb-0">
                    <i class="bi bi-clipboard-data me-2"></i> Reportes de personal medico
                </h3>
            </div>
            <!-- Cuerpo -->

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">

                    </div>
                    <div class="card-body">
                        <a href="{{url('/admin/doctores/pdf')}}" class="btn btn-success">
                            <i class="bi bi-printer me-2"></i> Listado de personal medico
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
