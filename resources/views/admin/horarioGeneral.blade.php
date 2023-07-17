@extends('layouts.app')

@section('content')
<h1 class="text-center">Panel de control del Administrador</h1>

<div class="py-4 d-flex col-lg-9 gap-5 w-100">

    <div class="d-flex col-lg-2">
        @include('layouts._partials.nav')
    </div>

    <form action="{{ route('admin.horarioGeneral') }}" method="GET" class="mb-4">
      <div class="row">
          <div class="col-md-6">
              <label for="mes">Seleccionar:</label>
              <!-- Desplegable de Mes -->
<select name="mes" id="mes" class="form-control">
  @php
      $meses = [
          1 => 'Enero',
          2 => 'Febrero',
          3 => 'Marzo',
          4 => 'Abril',
          5 => 'Mayo',
          6 => 'Junio',
          7 => 'Julio',
          8 => 'Agosto',
          9 => 'Septiembre',
          10 => 'Octubre',
          11 => 'Noviembre',
          12 => 'Diciembre',
      ];
  @endphp

<option value="" @if(!$mes) selected @endif>Seleccionar Mes</option>
@foreach ($meses as $key => $nombreMes)
    <option value="{{ $key }}" @if($mes == $key) selected @endif>{{ $nombreMes }}</option>
@endforeach
</select> 
          </div>
          <div class="col-md-6">
              <label for="anio">Seleccionar:</label>
              <!-- Desplegable de Año -->
@php
$yearRange = range(date('Y') - 10, date('Y') + 10);
@endphp

<select name="anio" id="anio" class="form-control">
<option value="" @if(!$anio) selected @endif>Seleccionar Año</option>
@foreach ($yearRange as $year)
    <option value="{{ $year }}" @if($anio == $year) selected @endif>{{ $year }}</option>
@endforeach
</select>
          </div>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Filtrar</button>
  </form>

    <div class="col-lg-8 ">

        <table class="table mx-5 text-center w-75">
            <thead class="table-primary">
              <th>Nombre</th>
              <th >Fecha y Hora de Entrada</th>
              <th>Fecha y Hora de Salida</th>
              <th>Horas trabajadas</th>
            </thead>
            <tbody>
             @foreach ($horarioGeneral as $horario)
             <tr>
                <td>{{ $horario->user->name }}</td>
                <td>{{ $horario->entrada }}</td>
                <td>{{ $horario->salida }}</td>
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
            {{ $horarioGeneral->withQueryString()->links() }}
          </div>
    </div>

</div>


@endsection

