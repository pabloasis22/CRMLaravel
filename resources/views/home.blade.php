@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="clientes-tab" data-bs-toggle="tab" data-bs-target="#clientes" type="button" role="tab" aria-controls="clientes" aria-selected="true">
                                <i class="fas fa-users"></i> Clientes
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="productos-tab" data-bs-toggle="tab" data-bs-target="#productos" type="button" role="tab" aria-controls="productos" aria-selected="false">
                                <i class="fas fa-box"></i> Productos
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!-- Pestaña Clientes -->
                        <div class="tab-pane fade show active" id="clientes" role="tabpanel" aria-labelledby="clientes-tab">
                            <div class="mt-3">
                                <h5>Últimos Clientes</h5>
                                @if ($clientes->count())
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th>Email</th>
                                                <th>Teléfono</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($clientes as $cliente)
                                                <tr>
                                                    <td>{{ $cliente->id }}</td>
                                                    <td>{{ $cliente->nombre }}</td>
                                                    <td>{{ $cliente->apellido }}</td>
                                                    <td>{{ $cliente->email }}</td>
                                                    <td>{{ $cliente->telefono ?? 'N/A' }}</td>
                                                    <td>
                                                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info">Ver</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{ route('clientes.index') }}" class="btn btn-primary">Ver todos los clientes</a>
                                    <a href="{{ route('clientes.create') }}" class="btn btn-success">Crear nuevo cliente</a>
                                @else
                                    <p class="alert alert-info">No hay clientes registrados</p>
                                    <a href="{{ route('clientes.create') }}" class="btn btn-success">Crear primer cliente</a>
                                @endif
                            </div>
                        </div>

                        <!-- Pestaña Productos -->
                        <div class="tab-pane fade" id="productos" role="tabpanel" aria-labelledby="productos-tab">
                            <div class="mt-3">
                                <h5>Últimos Productos</h5>
                                @if ($productos->count())
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
                                                <th>Precio</th>
                                                <th>Stock</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productos as $producto)
                                                <tr>
                                                    <td>{{ $producto->id }}</td>
                                                    <td>{{ $producto->nombre }}</td>
                                                    <td>{{ substr($producto->descripcion ?? '', 0, 50) }}{{ strlen($producto->descripcion ?? '') > 50 ? '...' : '' }}</td>
                                                    <td>${{ number_format($producto->precio, 2) }}</td>
                                                    <td>{{ $producto->stock }}</td>
                                                    <td>
                                                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-info">Ver</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{ route('productos.index') }}" class="btn btn-primary">Ver todos los productos</a>
                                    <a href="{{ route('productos.create') }}" class="btn btn-success">Crear nuevo producto</a>
                                @else
                                    <p class="alert alert-info">No hay productos registrados</p>
                                    <a href="{{ route('productos.create') }}" class="btn btn-success">Crear primer producto</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
