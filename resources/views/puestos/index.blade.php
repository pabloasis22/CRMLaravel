@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Altos Cargos</h1>

    <a href="{{ route('puestos.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Crear Alto Cargo
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($puestos->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($puestos as $puesto)
                    <tr>
                        <td>{{ $puesto->id }}</td>
                        <td>{{ $puesto->nombre }}</td>
                        <td>{{ $puesto->descripcion ? \Illuminate\Support\Str::limit($puesto->descripcion, 60) : 'N/A' }}</td>
                        <td>
                            <a href="{{ route('puestos.show', $puesto->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('puestos.edit', $puesto->id) }}" class="btn btn-sm btn-primary">Editar</a>
                            <form action="{{ route('puestos.destroy', $puesto->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar puesto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="alert alert-info">No hay altos cargos registrados</p>
    @endif
</div>
@endsection
