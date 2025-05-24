<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Doctor;
use App\Models\Consultorio;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();

        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.index', compact('horarios', 'consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.create', compact('doctores', 'consultorios', 'horarios'));
    }

    public function cargar_datos_consultorios($id){

        try{
        $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
        // print_r($horarios);
        return view('admin.horarios.cargar_datos_consultorios', compact('horarios'));
    }catch(\Exception $exception){
            return response()->json([
                'mensaje' => $exception->getMessage(),
                'icono' => 'error'
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dia' => 'required',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'consultorio_id' => 'required',
            'doctor_id' => 'required',
        ]);

        // Validación 1: verificar que el horario no esté ocupado en ese consultorio
        $horaExistente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_fin', '>', $request->hora_inicio)
                        ->where('hora_fin', '<=', $request->hora_fin);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_inicio)
                        ->where('hora_fin', '>', $request->hora_fin);
                });
            })
            ->exists();

        if ($horaExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ese horario ya está ocupado en este consultorio.')
                ->with('icono', 'error');
        }

        // Validación 2: verificar que el mismo doctor no tenga traslape en otro consultorio
        $doctorConCruce = Horario::where('dia', $request->dia)
            ->where('doctor_id', $request->doctor_id)
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_fin', '>', $request->hora_inicio)
                        ->where('hora_fin', '<=', $request->hora_fin);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('hora_inicio', '<', $request->hora_inicio)
                        ->where('hora_fin', '>', $request->hora_fin);
                });
            })
            ->exists();

        if ($doctorConCruce) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Este doctor ya tiene un horario asignado en otro consultorio a esta hora.')
                ->with('icono', 'error');
        }

        // Guardar el horario
        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Horario creado correctamente')
            ->with('icono', 'success');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::with('doctor', 'consultorio')->find($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();

        return view('admin.horarios.edit', compact('horario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
