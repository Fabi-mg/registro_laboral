<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function __construct()
    {
    $this->middleware('auth');
    $this->middleware('rol:admin'); // Middleware para el rol de "admin" en AdminController
    }

    // Otros métodos y lógica para el rol de administrador
}
