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
              <th >Fecha y Hora de Entrada</th>
              <th>Fecha y Hora de Salida</th>
              <th>Horas trabajadas</th>
            </thead>
            <tbody>
             @foreach ($horarios as $horario)
             <tr>
              <td>{{$horario->entrada}}</td>
              <td>{{$horario->salida}}</td>
              <td>
                <?php
                    $entrada = \Carbon\Carbon::parse($horario->entrada);
                    $salida = \Carbon\Carbon::parse($horario->salida);
                    $diferencia = $salida->diff($entrada);
                    echo $diferencia->format('%H:%I');
                ?>
              </td>
             </tr>


            @endforeach
            </tbody>
          </table>

          <div class="d-flex justify-content-center">
            {{ $horarios->links() }}
          </div>
    </div>

</div>


@endsection

