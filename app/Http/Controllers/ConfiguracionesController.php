<?php

namespace App\Http\Controllers;

use App\Models\Configuraciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = Configuraciones::all();
        return view('admin.configuraciones.index',compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuraciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = $request->all();
        // return response()->json($datos);

        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $configuraciones = new Configuraciones();
        $configuraciones->nombre = $request->nombre;
        $configuraciones->direccion = $request->direccion;
        $configuraciones->telefono = $request->telefono;
        $configuraciones->correo = $request->correo;
        $configuraciones->logo = $request->file('logo')->store('logos', 'public');
        $configuraciones->save();
        return redirect()->route('admin.configuraciones.index')->with('mensaje', 'Configuración creada con éxito.')->with('icono', 'success.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Configuraciones $configuraciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuraciones = Configuraciones::find($id);
        return view('admin.configuraciones.edit', compact('configuraciones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Configuraciones $configuraciones,$id)
    {

        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'correo' => 'required|email',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $configuraciones = Configuraciones::find($id);

        $configuraciones->nombre = $request->nombre;
        $configuraciones->direccion = $request->direccion;
        $configuraciones->telefono = $request->telefono;
        $configuraciones->correo = $request->correo;

        if ($request->hasFile('logo')) {
            $configuraciones->logo = $request->file('logo')->store('logos', 'public');
        }

        $configuraciones->save();
        return redirect()->route('admin.configuraciones.index')->with('mensaje', 'Configuración actualizada con éxito.')->with('icono', 'success.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $configuraciones = Configuraciones::findOrFail($id);

        if ($configuraciones->logo) {
            Storage::disk('public')->delete($configuraciones->logo);
        }

        $configuraciones->delete();

        return redirect()->route('admin.configuraciones.index')
            ->with('mensaje', 'Configuración eliminada con éxito.')
            ->with('icono', 'success');
    }

}
