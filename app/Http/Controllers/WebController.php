<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\Configuraciones;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index(/*$id*/)
    {

        $consultorios = Consultorio::all();
        $configuracion = Configuraciones::first();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_pacientes = Paciente::count();
        $total_secretarias = Secretaria::count();
        return view('index', compact('consultorios', 'total_doctores', 'total_consultorios', 'total_pacientes', 'total_secretarias', 'configuracion'));
    }

    public function cargar_datos_consultorios($id)
    {
        $consultorio = Consultorio::find($id);
        try {
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
            // print_r($horarios);
            return view('cargar_datos_consultorios', compact('horarios,consultorios'));
        } catch (\Exception $exception) {
            return response()->json([
                'mensaje' => $exception->getMessage(),
                'icono' => 'error'
            ]);
        }
    }
    public function cargar_reserva_doctores($id)
    {
        //echo $id;
        try {
            $eventos = Event::where('doctor_id', $id)->select('id', 'title', DB::raw('DATE_FORMAT(start, "%Y-%m-%d") as start'), DB::raw('DATE_FORMAT(end, "%Y-%m-%d") as end'), 'color')->get();
            return response()->json($eventos);
        } catch (\Exception $exception) {
            return response()->json([
                'mensaje' => $exception->getMessage(),
                'icono' => 'error'
            ]);
        }
    }
}
