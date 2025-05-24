<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }
    public function create()
    {
        return view('admin.usuarios.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();
        $usuario->assignRole('usuario');
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'El usuario se creó con éxito')
            ->with('icono', 'success');
    }

    public function show($id)
    {
        $usuario = User::findOrFail($id);
        return view("admin.usuarios.show", compact('usuario'));
    }
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        return view("admin.usuarios.edit", compact('usuario'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|max:250',
            'password' => 'nullable|max:250|confirmed'
        ]);
        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if ($request->filled('password')) {
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();
        return redirect()->route('admin.usuarios.index')
            ->with('mensaje', 'El usuario se actualizo de manera exitosa')
            ->with('icono', 'success');
    }
    public function confirmDelete($id)
    {
        $usuario = User::findOrFail($id);
        return view("admin.usuarios.delete", compact('usuario'));
    }
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.usuarios.index')->with('mensaje', 'El usuario se eliminado de manera exitosa')->with('icono', 'success');;
    }

    public function indexApi()
    {
        $this->authorize('admin.usuarios.index');
        $usuarios = User::all(); // Ajusta según tu modelo
        return response()->json($usuarios);
    }

    public function showApi($id)
    {
        $this->authorize('admin.usuarios.show');
        $usuario = User::findOrFail($id);
        return response()->json($usuario);
    }

    public function loginApi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales son incorrectas'],
            ]);
        }

        // Verifica si el usuario tiene el rol necesario (ajusta según tus necesidades)
        // if (!$user->hasRole('user')) { // Cambia 'user' por tu rol requerido
        //     return response()->json(['message' => 'Acceso no autorizado'], 403);
        // }

        return response()->json([
            'token' => $user->createToken('api-token')->plainTextToken,
            'user' => $user
        ]);
    }

    public function logoutApi(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Sesión cerrada']);
    }
}
