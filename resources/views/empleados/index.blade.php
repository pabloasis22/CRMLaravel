@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Empleados</h1>

    <a href="{{ route('empleados.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Crear Empleado
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($empleados->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Puesto</th>
                    <th>Salario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                        <td>{{ $empleado->email }}</td>
                        <td>{{ $empleado->puesto->nombre ?? 'N/A' }}</td>
                        <td>${{ number_format($empleado->salario, 2) }}</td>
                        <td>
                            <span class="badge badge-{{ $empleado->estado == 'activo' ? 'success' : 'secondary' }}">
                                {{ ucfirst($empleado->estado) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('empleados.show', $empleado->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar empleado?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="alert alert-info">No hay empleados registrados</p>
    @endif
</div>
@endsection
