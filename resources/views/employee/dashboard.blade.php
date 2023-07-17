@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Empleado</title>
</head>
<body>


    @section('content')
    <div class="py-4 d-flex col-lg-9 gap-5 w-100">

        <div id="partialNav" class="d-flex flex-column  col-lg-2">
            @include('layouts._partials.nav')
        </div>

        <div class="col-lg-8 ">
            <h1>{{Auth::user()->name}}</h1>
        </div>

    </div>
    @endsection


</body>
</html>

