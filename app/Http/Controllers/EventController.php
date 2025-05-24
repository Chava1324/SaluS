<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Doctor;
use App\Models\Consultorio;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Configuraciones;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    logger('🚀 store');
    logger($request->all());

    $doctor = Doctor::find($request->input('doctor_id'));
    $consultorio = Consultorio::find($request->input('consultorio_id'));
    $doctor_id = $request->doctor_id;
    $fecha_reserva = $request->fecha_reserva;
    $hora_reserva = date('H:i:s', strtotime($request->hora_reserva));
    $dia = date('N', strtotime($fecha_reserva));
    $dia_de_reserva = $this->traducir_dia($dia);

    // Log de diagnóstico: horarios del doctor ese día
    $horarios = Horario::where('doctor_id', $doctor_id)
        ->where('dia', $dia_de_reserva)
        ->get();

    logger("⏰ Horarios disponibles para el día {$dia_de_reserva}:");
    foreach ($horarios as $h) {
        logger("→ {$h->hora_inicio} - {$h->hora_fin}");
    }

    // Validar si el doctor tiene disponibilidad ese día y hora
    $horario = Horario::where('doctor_id', $doctor_id)
        ->where('dia', $dia_de_reserva)
        ->where('hora_inicio', '<=', $hora_reserva)
        ->where('hora_fin', '>=', $hora_reserva)
        ->exists();

    if (!$horario) {
        logger('❌ El doctor no tiene disponibilidad en ese horario');
        return redirect()->back()->with([
            'mensaje' => 'El doctor no está disponible en este horario para ese consultorio',
            'icono' => 'error',
            'hora_reserva' => 'El doctor no está disponible en ese horario'
        ]);
    }

    // Validar si ya existe una cita en la misma fecha y hora para el mismo doctor
    $fecha_hora_reserva = $fecha_reserva . " " . $hora_reserva;
    $eventos_duplicados = Event::where('doctor_id', $doctor_id)
        ->where('start', $fecha_hora_reserva)
        ->exists();

    if ($eventos_duplicados) {
        logger('⚠️ Ya existe una cita para ese doctor en ese horario');
        return redirect()->back()->with([
            'mensaje' => 'Ya existe una cita en ese horario',
            'icono' => 'error',
            'hora_reserva' => 'Ya existe una cita en ese horario'
        ]);
    }

    // Crear el nuevo evento
    $evento = new Event();
    $evento->title = $hora_reserva . ' - ' . $doctor->especialidad;
    $evento->start = $fecha_hora_reserva;
    $evento->end = $fecha_hora_reserva;
    $evento->color = '#e8320f';
    $evento->user_id = Auth::user()->id;
    $evento->doctor_id = $doctor_id;
    $evento->consultorio_id = '1';
    $evento->save();

    logger('✅ Evento creado correctamente');

    return redirect()->route('admin.index')->with('mensaje', 'Cita creada correctamente')->with('icono', 'success');
}

    public function traducir_dia($dia)
    {
        $dias = [
            '1' => 'Lunes',
            '2' => 'Martes',
            '3' => 'Miércoles',
            '4' => 'Jueves',
            '5' => 'Viernes',
            '6' => 'Sábado',
            '7' => 'Domingo'
        ];

        return $dias[$dia] ?? null;
    }




    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->back()->with([
            'mensaje' => 'Cita eliminada correctamente',
            'icono' => 'success'
        ]);
    }
    public function reportes()
    {
        return view('admin.reservas.reportes');
    }
    public function pdf()
    {
        $eventos = Event::all();
        $configuracion = Configuraciones::latest()->first();
        $pdf = PDF::loadView('admin.reservas.pdf', compact('configuracion', 'eventos'));

        //numeracion de las paginas y el pie
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->name, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Pagina: {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(400, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y') . " - " . \Carbon\Carbon::now()->format('H:m:s'), null, 10, array(0, 0, 0));

        return $pdf->stream();
    }

    public function pdf_fechas(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio') . ' 00:00:00';
        $fecha_fin = $request->input('fecha_fin') . ' 23:59:59';

        $eventos = Event::whereBetween('start', [$fecha_inicio, $fecha_fin])->get();

        $configuracion = Configuraciones::latest()->first();

        $pdf = PDF::loadView('admin.reservas.pdf_fechas', compact('configuracion', 'eventos', 'fecha_inicio', 'fecha_fin'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20, 800, "Impreso por: " . Auth::user()->name, null, 10, array(0, 0, 0));
        $canvas->page_text(270, 800, "Pagina: {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0, 0, 0));
        $canvas->page_text(400, 800, "Fecha: " . \Carbon\Carbon::now()->format('d/m/Y') . " - " . \Carbon\Carbon::now()->format('H:i:s'), null, 10, array(0, 0, 0));

        return $pdf->stream();
    }
}
