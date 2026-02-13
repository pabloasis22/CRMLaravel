@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Proveedores</h1>

    <a href="{{ route('proveedores.create') }}" class="btn btn-success mb-3">
        <i class="fas fa-plus"></i> Crear Proveedor
    </a>

    @if ($proveedores->count())
        <table id="proveedores-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->contacto ?? 'N/A' }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->telefono ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#proveedores-table').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                    }
                });
            });
        </script>
    @else
        <p class="alert alert-info">No hay proveedores registrados</p>
    @endif
</div>
@endsection
