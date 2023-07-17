<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class GestionEmpleadosController extends Controller
{
    public function gestion()
    {
        $usuarios = User::all();
        return view('admin.empleados', compact('usuarios'));
    }

    public function desactivar(User $usuario)
    {
        $usuario->habilitado = false;
        $usuario->save();
        return redirect()->route('admin.usuarios');
    }

    public function reactivar(User $usuario)
    {
        $usuario->habilitado = true;
        $usuario->save();
        return redirect()->route('admin.usuarios');
    }
}
