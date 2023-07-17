<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FicharController;
use App\Http\Controllers\GestionEmpleadosController;
use App\Http\Controllers\HorarioGeneralController;
use App\Http\Controllers\UsuarioAdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    if(Auth::check() && Auth::user()->rol==='admin'){
        return view('admin.dashboard');
    }else if(Auth::check() && Auth::user()->rol==='employee'){
        return view('employee.dashboard');
    }else{
        return view('auth.login');
    };

});

Route::match(['get', 'post'],'/registrar-entrada-salida', [FicharController::class, 'registrarEntradaSalida'])->name('registrar-entrada-salida');

Route::middleware(['rol:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/horarios',[RegistroController::class, 'index'])->name('admin.horarios');
    Route::get('/addEmployee-form' , function(){ return view('auth.register'); })->name('add.employee.form');
    Route::post('/addEmployee', [UserController::class, 'create'] )->name('add.employee');
    Route::get('/admin-fichar', function(){return view('admin.fichar');})->name('fichar-admin');
    Route::get('/mostrar-horario-general', [HorarioGeneralController::class, 'horarioGeneral'])->name('mostrar.horario.general');
    Route::get('/admin/usuarios', [GestionEmpleadosController::class, 'gestion'])->name('admin.usuarios');
    Route::put('/usuarios/{usuario}/desactivar', [GestionEmpleadosController::class, 'desactivar'])->name('usuarios.desactivar');
    Route::put('/usuarios/{usuario}/reactivar', [GestionEmpleadosController::class, 'reactivar'])->name('usuarios.reactivar');
});

// Rutas para el empleado
Route::middleware(['rol:employee'])->group(function () {
    Route::get('/employee/dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard');
    Route::get('/employee/dashboard/horarios',[RegistroController::class, 'index'])->name('employee.horarios');
    Route::get('/employee-fichar', function(){return view('employee.fichar');})->name('fichar-employee');
    // Otras rutas del empleado
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/crear-usuario-admin', [UsuarioAdminController::class, 'crearUsuarioAdminPorDefecto'])->name('crearUsuarioAdmin');

Route::get('/admin/horarios/filtrar', [HorarioGeneralController::class, 'filtrar'])->name('admin.horarioGeneral');

