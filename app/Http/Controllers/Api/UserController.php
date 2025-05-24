<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        // Obtener solo usuarios con rol "usuario"
        $usuarios = User::role('usuario')->get();

        return response()->json($usuarios);
    }
}
