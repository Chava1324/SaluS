<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>holi :3</title>
</head>

<body>
    <table class="table table-borderless" style="width: 100%;">
        <tr>
            <td class="text-center align-middle" style="width: 70%;">
                <h4 class="fw-bold text-primary mb-2">
                    <i class="fas fa-hospital-alt me-2"></i>{{ $configuracion->nombre }}
                </h4>
                <p class="mb-1">
                    <i class="fas fa-map-marker-alt text-danger me-2"></i>{{ $configuracion->direccion }}
                </p>
                <p class="mb-1">
                    <i class="fas fa-phone text-success me-2"></i>{{ $configuracion->telefono }}
                </p>
                <p class="mb-0">
                    <i class="fas fa-envelope text-info me-2"></i>{{ $configuracion->correo }}
                </p>
            </td>
            <td class="text-end align-top" style="width: 30%;">
                <img src="{{ public_path('storage/' . $configuracion->logo) }}" alt="Logo" width="100px"
                    style="border-radius: 50%;">
            </td>
        </tr>
    </table>
    <h3 style="text-align: center" class="text-center text-dark mb-4">Listado de citas desde Desde: {{ \Carbon\Carbon::parse($fecha_inicio)->format('d/m/Y') }} - Hasta: {{ \Carbon\Carbon::parse($fecha_fin)->format('d/m/Y') }}</h3>
 
    <hr>
    <table class="table table-striped table-bordered" style="width: 100%; font-size: 11pt;">
        <thead class="table-light">
            <tr style="background-color: #170e97; text-align: center; color: white;">
                <th scope="col">Nro</th>
                <th scope="col">Doctor</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Fecha de reserva</th>
                <th scope="col">Hora de reserva</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($eventos as $evento)
            <tr>
                 <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $evento->doctor->nombre}} {{ $evento->doctor->apellido}}</td>
                <td class="text-center">{{ $evento->doctor->especialidad }}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($evento->start)->format('H:i')}}</td
            </tr>
            @endforeach
        </tbody>
    </table>
</body>


</html>
