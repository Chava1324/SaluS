@extends('layouts.admin')

@section('content')
<div class="container-fluid py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Encabezado general -->
            <div class="mb-4 text-center">
                <h2 class="fw-bold text-uppercase text-primary">
                    <i class="bi bi-clipboard-data me-2"></i> Reportes de reservas de citas
                </h2>
            </div>

            <!-- Card: Listado de todas las citas -->
            <div class="card shadow mb-4 border-start border-4 border-success">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-list-check me-2"></i> Todas las citas registradas
                    </h5>
                </div>
                <div class="card-body">
                    <a href="{{url('/admin/reservas/pdf')}}" class="btn btn-outline-success">
                        <i class="bi bi-printer me-2"></i> Generar PDF general
                    </a>
                </div>
            </div>

            <!-- Card: Listado por fechas -->
            <div class="card shadow mb-4 border-start border-4 border-warning">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-calendar-range me-2"></i> Citas filtradas por fechas
                    </h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/reservas/pdf_fechas') }}" method="GET">
                        <div class="row mb-4 justify-content-between">
                            <div class="col-md-5">
                                <label for="fecha_inicio" class="form-label">Fecha Inicio:</label>
                                <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio"
                                    value="{{ request('fecha_inicio') }}">
                            </div>
                            <div class="col-md-5 text-end">
                                <label for="fecha_fin" class="form-label">Fecha Fin:</label>
                                <input type="date" class="form-control" name="fecha_fin" id="fecha_fin"
                                    value="{{ request('fecha_fin') }}">
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-warning text-dark">
                                <i class="bi bi-printer me-2"></i> Generar PDF por fechas
                            </button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- Card adicional ejemplo
            <div class="card shadow mb-4 border-start border-4 border-info">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0 fw-semibold">
                        <i class="bi bi-person-badge me-2"></i> Reporte por médico
                    </h5>
                </div>
                <div class="card-body">
                    <a href="#" class="btn btn-outline-info">
                        <i class="bi bi-printer me-2"></i> Generar PDF por médico
                    </a>
                </div>
            </div>-->

        </div>
    </div>
</div>

@endsection
