<?php

?>
<div class="table-responsive p-3">
    <style>
        .table th,
        .table td {
            width: 120px;
            max-width: 120px;
            text-overflow: ellipsis;
        }
    </style>
    <table class="table table-striped table-hover table-sm table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Hora</th>
                <th scope="col">Lunes</th>
                <th scope="col">Martes</th>
                <th scope="col">Miércoles</th>
                <th scope="col">Jueves</th>
                <th scope="col">Viernes</th>
                <th scope="col">Sábado</th>
            </tr>
        </thead>
        <tbody>
            @php
            $horas = [
            '08:00:00 - 09:00:00', '09:00:00 - 10:00:00', '10:00:00 - 11:00:00',
            '11:00:00 - 12:00:00', '12:00:00 - 13:00:00', '13:00:00 - 14:00:00',
            '14:00:00 - 15:00:00', '15:00:00 - 16:00:00', '16:00:00 - 17:00:00',
            '17:00:00 - 18:00:00', '18:00:00 - 19:00:00', '19:00:00 - 20:00:00'
            ];
            $diasSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO'];
            @endphp
            @foreach ($horas as $hora)
            @php
            list($hora_inicio, $hora_fin) = explode(' - ', $hora);
            @endphp
            <tr>
                <td class="p-2 fw-bold">{{$hora}}</td>
                @foreach ($diasSemana as $dia)
                @php
                $nombre_doctor = '';
                foreach ($horarios as $horario) {
                if (strtoupper($horario->dia) == $dia && $hora_inicio >= $horario->hora_inicio &&
                $hora_fin <= $horario->hora_fin) {
                    $nombre_doctor = $horario->doctor->nombre . ' ' . $horario->doctor->apellido;
                    break;
                    }
                    }
                    @endphp
                    <td class="p-2">{{$nombre_doctor}}</td>
                    @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>