<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
public function porPaciente($id)
{
    $reservas = DB::table('events')
        ->join('consultorios', 'events.consultorio_id', '=', 'consultorios.id')
        ->where('events.user_id', $id)
        ->select(
            'events.id',
            'consultorios.nombre as consultorio', // <== nombre correcto
            DB::raw('DATE(events.start) as fecha'),
            DB::raw('TIME(events.start) as hora_inicio'),
            DB::raw('TIME(events.end) as hora_fin')
        )
        ->get();

    return response()->json($reservas);
}

}
