<?php

namespace App\Http\Controllers;

use App\Models\Historials;
use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class HistorialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historials = Historials::with('paciente', 'doctor')->get();
        return view('admin.historial.index', compact('historials'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();
        return view('admin.historial.create', compact('pacientes'));
        dd($pacientes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);

        $historial = new Historials();
        $historial->detalle  =  $request->detalle;
        $historial->fecha_visita  =  $request->fecha_visita;
        $historial->pacientes_id  =  $request->paciente_id;
        $historial->doctor_id  =  Auth::user()->doctor->id;
        $historial->save();
        return redirect()->route('admin.historial.index')->with('mensaje', 'cita guardada con exito')->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historials = Historials::find($id);

        return view('admin.historial.show', compact('historials'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $historials = Historials::find($id);
        $pacientes = Paciente::orderBy('apellidos', 'asc')->get();

        return view('admin.historial.edit', compact('historials', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historials $historials, $id)
    {
        $historials = Historials::find($id);
        $historials->detalle  =  $request->detalle;
        $historials->fecha_visita  =  $request->fecha_visita;
        $historials->pacientes_id  =  $request->paciente_id;
if (Auth::user()->doctor) {
    $historials->doctor_id = Auth::user()->doctor->id;
}        $historials->save();
        return redirect()->route('admin.historial.index')->with('mensaje', 'cita actualizada con exito')->with('icono', 'success');
    }
    //


    /**
     * Remove the specified resource from storage.
     */

    public function confirmDelete($id)
    {
        $historials = Historials::find($id);
        return view('admin.historial.delete', compact('historials'));
    }
    public function destroy($id)
    {
        $historials = Historials::find($id);
        $historials->delete();
        return redirect()->route('admin.historial.index')->with('mensaje', 'cita eliminada con exito')->with('icono', 'success');
    }
public function obtenerDatosPaciente($id)
{
    $paciente = Paciente::find($id);

    if (!$paciente) {
        return response()->json(['error' => 'Paciente no encontrado'], 404);
    }

    return response()->json($paciente);
}

}
