<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;


class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'curp' => 'required|size:18|regex:/^[A-Z0-9]+$/|unique:pacientes',
            'nss' => 'required|digits:11|unique:pacientes',
            'fecha_nacimiento' => 'required|date|before:today',
            'genero' => 'required|in:Masculino,Femenino,Otro',
            'telefono' => 'required|digits:10',
            'correo' => 'required|email|unique:pacientes|max:255',
            'direccion' => 'required|string|max:255',
            'grupo_sanguineo' => 'nullable|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'alergias' => 'nullable|string|max:255',
            'contacto_emergencia' => 'nullable|digits:10',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $pacientes = new Paciente();
        $pacientes->nombres = $request->nombre;
        $pacientes->apellidos = $request->apellidos;
        $pacientes->curp = $request->curp;
        $pacientes->nss = $request->nss;
        $pacientes->fecha_nacimiento = $request->fecha_nacimiento;
        $pacientes->genero = $request->genero;
        $pacientes->telefono = $request->telefono;
        $pacientes->correo = $request->correo;
        $pacientes->direccion = $request->direccion;
        $pacientes->grupo_sanguineo = $request->grupo_sanguineo;
        $pacientes->alergias = $request->alergias;
        $pacientes->contacto_emergencia = $request->contacto_emergencia;
        $pacientes->observaciones = $request->observaciones;
        $pacientes->save();

        // Asignar el rol de paciente al usuario
        //$pacientes->syncRoles('paciente');
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'El pacientes se creó con éxito')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        // dd($paciente); Detener ejecución y mostrar datos
        return view('admin.pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);

        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $request->validate([
            'nombre' => 'required|string|max:100', // Solo letras, máximo 100 caracteres
            'apellidos' => 'required|string|max:100', // Solo letras, máximo 100 caracteres
            'curp' => 'required|size:18|regex:/^[A-Z0-9]+$/|unique:pacientes,curp,' . $paciente->id, // CURP debe ser alfanumérico y en mayúsculas
            'nss' => 'required|digits:11|unique:pacientes,nss,' . $paciente->id, // Solo números y debe ser de 11 dígitos
            'fecha_nacimiento' => 'required|date|before:today', // Debe ser una fecha válida y antes de hoy
            'genero' => 'required|in:Masculino,Femenino,Otro', // Solo valores predefinidos
            'telefono' => 'required|digits:10', // Solo números y debe ser de 10 dígitos
            'correo' => 'required|email|unique:pacientes,correo,' . $paciente->id, // Formato de correo válido
            'direccion' => 'required|string|max:255', // Texto obligatorio, hasta 255 caracteres
            'grupo_sanguineo' => 'nullable|in:A+,A-,B+,B-,O+,O-,AB+,AB-', // Solo valores válidos
            'alergias' => 'nullable|string|max:255', // Texto opcional, hasta 255 caracteres
            'contacto_emergencia' => 'nullable|digits:10', // Solo números, 10 dígitos
            'observaciones' => 'nullable|string|max:500', // Texto opcional, hasta 500 caracteres
        ]);

        $paciente->nombres = $request->nombre;
        $paciente->apellidos = $request->apellidos;
        $paciente->curp = $request->curp;
        $paciente->nss = $request->nss;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->telefono = $request->telefono;
        $paciente->correo = $request->correo;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->alergias = $request->alergias;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;
        $paciente->save();



        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'El paciente se actualizo de manera exitosa')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view("admin.pacientes.delete", compact('paciente'));
    }
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('admin.pacientes.index')->with('mensaje', 'El paciente se eliminado de manera exitosa')->with('icono', 'success');;
    }
}
