<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registro;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FicharController extends Controller
{
    public function registrarEntradaSalida(Request $request)
    {
        $userId = Auth::id();
        $user = User::find($userId);

        if ($user->activo) {
            // El empleado ya ha registrado su entrada, se registra la salida
            $registro = Registro::where('id_user', $userId)
                ->orderBy('id', 'desc')
                ->first();


            $registro->salida = Carbon::now();
            $registro->save();

            $user->activo = false;
            $user->save();

            if($user->rol==='admin'){
                return redirect()->route('fichar-admin')->with('success', 'Salida registrada');
            }else{
                return redirect()->route('fichar-employee')->with('success', 'Salida registrada');
            }

        } else {
            // El empleado no ha registrado su entrada, se registra la entrada
            $registro = new Registro;

            $registro->id_user = $userId;
            $registro->entrada = Carbon::now();
            $registro->save();

            $user->activo = true;
            $user->save();

            if($user->rol==='admin'){
                return redirect()->route('fichar-admin')->with('success', 'Entrada registrada');
            }else{
                return redirect()->route('fichar-employee')->with('success', 'Entrada registrada');
            }
        }
    }
}
