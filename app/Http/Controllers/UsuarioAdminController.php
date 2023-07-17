<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsuarioAdminController extends Controller
{
    public function crearUsuarioAdminPorDefecto()
    {
        // Verificar si ya existe un usuario con el rol de administrador
    $adminUser = User::where('rol', 'admin')->first();

    // Si no existe, crear un nuevo usuario
    if (!$adminUser) {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => bcrypt('contraseña'), // Recuerda cambiar 'contraseña' por la contraseña real
            'rol' => 'admin',
            'activo' => true,
        ]);
    }

        return redirect()->back()->with('success', 'Usuario administrador creado con éxito.');
    }
}