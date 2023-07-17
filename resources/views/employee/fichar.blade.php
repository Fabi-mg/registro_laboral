@extends('layouts.app')

@section('content')
<h1 class="text-center">Panel de control del Empleado</h1>
<div class="py-4 d-flex col-lg-9 gap-5 w-100">
    <div class="d-flex flex-column h-5 col-lg-2">
        @include('layouts._partials.nav')
    </div>

    <div class="col-lg-8" style="height: 25rem;">
        <h2 class="text-center">Registrar Horarios</h2>
        <div class="container d-flex flex-column gap-3 align-items-center ">

            @if (Auth::user()->activo===1)
            <form action="{{ route('registrar-entrada-salida') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary" name="accion" value="entrada">Registrar Salida</button>
            </form>
            @else
            <form action="{{ route('registrar-entrada-salida') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary" name="accion" value="entrada">Registrar Entrada</button>
            </form>
            @endif

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>

    </div>
</div>

@endsection
