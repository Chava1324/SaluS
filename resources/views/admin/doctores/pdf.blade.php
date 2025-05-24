<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7D4pr2IK8iDkDz4z4hSR+8i2Qp6Lg9eJ8+" crossorigin="anonymous">
    <title>Document</title>
</head>

<body style="font-family: Arial, sans-serif; font-size: 12pt;">
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
                <img src="{{ public_path('storage/' . $configuracion->logo) }}" alt="Logo" width="100px">
            </td>
        </tr>
    </table>
    <h3 style="text-align: center" class="text-center text-dark mb-4">Listado del personal médico</h3>
    <hr>
    <table class="table table-striped table-bordered" style="width: 100%; font-size: 11pt;">
        <thead class="table-light">
            <tr style="background-color: #170e97; text-align: center; color: white;">
                <th scope="col">Nro</th>
                <th scope="col">Nombre y apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Licencia</th>
                <th scope="col">Especialidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctores as $doctor)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $doctor->user->name }} {{ $doctor->apellido }}</td>
                <td class="text-center">{{ $doctor->telefono }}</td>
                <td class="text-center">{{ $doctor->licencia_medica }}</td>
                <td class="text-center">{{ $doctor->especialidad }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
