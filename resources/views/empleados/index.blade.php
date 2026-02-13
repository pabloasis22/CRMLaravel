@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Empleados</h1>

    <a href="{{ route('empleados.create') }}" class="btn btn-success mb-3">
        <!-- Botón crear oculto en modo visual -->
        <!-- <i class="fas fa-plus"></i> Crear Empleado -->
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($empleados->count())
        <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
            <table id="empleados-table" class="table table-striped">
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
                        <td>{{ $empleado->puesto }}</td>
                        <td>${{ number_format($empleado->salario, 2) }}</td>
                        <td>
                            <span class="badge badge-{{ $empleado->estado == 'activo' ? 'success' : 'secondary' }}">
                                {{ ucfirst($empleado->estado) }}
                            </span>
                        </td>
                        <td>
                                <!-- Acciones eliminadas en modo navegación -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
        <script>
            $(document).ready(function() {
                $('#empleados-table').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                    }
                });
            });
        </script>
    @else
        <p class="alert alert-info">No hay empleados registrados</p>
    @endif
</div>
@endsection
