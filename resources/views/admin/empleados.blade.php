@extends('layouts.app')

@section('content')
<h1 class="text-center">Panel de control del Administrador</h1>

<div class="py-4 d-flex col-lg-9 gap-5 w-100">

    <div class="d-flex col-lg-2">
        @include('layouts._partials.nav')
    </div>

    <div class="col-lg-8 ">

        <table class="table mx-5 text-center w-75">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Actividad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>
                            @if ($usuario->activo === 0)
                                Inactivo
                            @else
                                Activo
                            @endif
                        </td>
                        <td>{{ $usuario->habilitado ? 'Habilitado' : 'Deshabilitado' }}</td>
                        <td>
                            @if ($usuario->habilitado)
                                <form action="{{ route('usuarios.desactivar', $usuario) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Desactivar</button>
                                </form>
                            @else
                                <form action="{{ route('usuarios.reactivar', $usuario) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-info">Reactivar</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

</div>


@endsection

