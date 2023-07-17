<?php

namespace App\Http\Controllers;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        return view('employee.dashboard');
    }

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol:employee');
    }
}
