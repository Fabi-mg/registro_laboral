<nav class="position-fixed">
    <ul class="d-flex flex-column gap-2 ">
        @if (Auth::user()->rol==='admin')
            <li class="nav-item btn btn-primary">
                <a class="text-white text-decoration-none" href="{{route('fichar-admin')}}" >Fichar</a>
            </li>
            <li class="nav-item btn btn-primary">
                <a href="{{route('admin.horarios')}}" class="text-white text-decoration-none">Mis Horarios</a>
            </li>
            <li class="nav-item btn btn-primary">
                <a href="{{route('admin.usuarios')}}" class="text-white text-decoration-none">Gestionar Empleados</a>
            </li>
            <a href="{{ route('mostrar.horario.general') }}" class="btn btn-primary">Consultar Horario General</a>
        @else
            <li class="nav-item btn btn-primary">
                <a href="{{route('fichar-employee')}}" class="text-white text-decoration-none">Fichar</a>
            </li>
            <li class="nav-item btn btn-primary">
                <a href="{{route('employee.horarios')}}" class="text-white text-decoration-none">Mis Horarios</a>
            </li>
        @endif

        {{-- <li><a href="{{route()}}">Listado de empleados</a></li>

        <li><a href="{{route()}}">Horarios de Empleados</a></li> --}}

        {{-- @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif --}}
        @if (Auth::user()->rol==='admin')
        <li class="nav-item btn btn-primary">
            <a class="text-white text-decoration-none" href="{{route('add.employee.form')}}" >Añadir Empleados</a>
        </li>
        @endif
    </ul>
</nav>
