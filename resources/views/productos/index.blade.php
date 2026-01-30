@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Productos</h1>

    <a href="{{ route('productos.create') }}" class="btn btn-success mb-3">Crear Producto</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ number_format($producto->precio, 2) }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-info">Ver</a>
                        <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar producto?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
