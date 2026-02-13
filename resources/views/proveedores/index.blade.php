@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Proveedores</h1>

        <!-- Botón crear eliminado en modo navegación -->

    @if ($proveedores->count())
        <table id="proveedores-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Contacto</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                        <!-- Columna de acciones eliminada en modo navegación -->
                        <td>{{ $proveedor->contacto ?? 'N/A' }}</td>
                        <td>{{ $proveedor->email }}</td>
                        <td>{{ $proveedor->telefono ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-sm btn-info">Ver</a>
                                <!-- Acciones ocultas en modo visual -->
                                <!--
                                <!-- Acciones eliminadas en modo navegación -->
                                -->
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
