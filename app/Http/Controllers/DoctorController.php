<?php

namespace App\Http\Controllers;

use App\Models\Configuraciones;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores = Doctor::with('user')->get();
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombres' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'telefono' => 'required|digits:10',
                'licencia_medica' => 'required|string|max:20',
                'especialidad' => 'required|string|max:255',
                'email' => 'required|email|max:250|unique:users',
                'password' => 'required|min:8|confirmed',
            ]);

            $usuario = new User();
            $usuario->name = $request->nombres;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->save();

            $doctor = new Doctor();
            $doctor->user_id = $usuario->id;
            $doctor->nombre = $request->nombres;
            $doctor->apellido = $request->apellidos;
            $doctor->telefono = $request->telefono;
            $doctor->licencia_medica = $request->licencia_medica;
            $doctor->especialidad = $request->especialidad;
            $doctor->save();
            // Asignar el rol de doctor al usuario
            $usuario->syncRoles('doctor');

            return redirect()->route('admin.doctores.index')
                ->with('mensaje', 'El doctor se registró correctamente')
                ->with('icono', 'success');
        } catch (Exception $e) {
            Log::error('Error al guardar doctor: ' . $e->getMessage());
            return back()->withErrors('Ocurrió un error al guardar el doctor. Verifica los datos.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);

        return view("admin.doctores.show", compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.edit', compact('doctor'));
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|digits:10',
            'licencia_medica' => 'required|digits:10',
            'especialidad' => 'required|string|max:255',
            'email' => 'required|email|max:250|unique:users,email,' . $doctor->user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);
        $usuario = User::find($doctor->user->id);
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }
        $usuario->save();
        $doctor->nombre = $request->nombres;
        $doctor->apellido = $request->apellidos;
        $doctor->telefono = $request->telefono;
        $doctor->licencia_medica = $request->licencia_medica;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();



        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'El doctor se actualizó de manera exitosa')
            ->with('icono', 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function confirmDelete($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.delete', compact('doctor'));
    }
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        //eliminacion del doctor asociado
        $user = $doctor->user;
        $user->delete();
        $doctor->delete();
        return redirect()->route('admin.doctores.index')
            ->with('mensaje', 'El doctor se elimino de manera exitosa')
            ->with('icono', 'success');
    }

    public function reportes()
    {
        return view('admin.doctores.reportes');
    }
    public function pdf()
    {
        $doctores = Doctor::all();
        $configuracion = Configuraciones::latest()->first();
        $pdf = PDF::loadView('admin.doctores.pdf',compact('configuracion', 'doctores'));

        //numeracion de las paginas y el pie
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800,"Impreso por: ".Auth::user()->name, null, 10, array(0,0,0));
        $canvas->page_text(270,800,"Pagina: {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(400,800,"Fecha: ".\Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:m:s'), null, 10, array(0,0,0));

        return $pdf->stream();
    }
}
