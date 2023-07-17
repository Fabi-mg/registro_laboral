<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class RegistroController extends Controller
{
    public function index(){
        $userId=Auth::user()->id;

        $horarios=Registro::where('id_user', $userId)->paginate(10);
        return view('admin.horarios',compact('horarios'));
    }
}
