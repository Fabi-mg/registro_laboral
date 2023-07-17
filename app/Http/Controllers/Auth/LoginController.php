<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
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
    }
    //SIRVE PARA CREAR UN USUARIO DEFAULT
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function authenticated(Request $request, $user)
    {
        if ($user->habilitado === 1) {
            if ($user->rol === 'admin') {
                return redirect()->route('fichar-admin');
            } else {
                return redirect()->route('fichar-employee');
            }
        } else {
            Auth::logout();
            throw ValidationException::withMessages([
                'email' => __('Tu cuenta ha sido deshabilitada. Contacta al administrador.'),
            ]);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}