@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Productos</h1>

    <!-- Botón crear oculto en modo visual -->
    <!-- Botón crear eliminado en modo navegación -->

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive" style="max-height: 70vh; overflow-y: auto;">
        <table id="productos-table" class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Stock</th>
                <!-- <th>Acciones</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                    <!-- Columna de acciones eliminada en modo navegación -->
                    <td>
                        @if($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen" style="max-width: 60px; max-height: 60px;">
                        @else
                            <span class="text-muted">Sin imagen</span>
                        @endif
                    </td>
                    <td>{{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <!-- Acciones ocultas en modo visual -->
                        <!--
                        <!-- Acciones eliminadas en modo navegación -->
                        -->
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#productos-table').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                }
            });
        });
    </script>
</div>
@endsection
