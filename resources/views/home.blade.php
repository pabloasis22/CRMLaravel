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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="proveedores-tab" data-bs-toggle="tab" data-bs-target="#proveedores" type="button" role="tab" aria-controls="proveedores" aria-selected="false">
                                <i class="fas fa-truck"></i> Proveedores
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="puestos-tab" data-bs-toggle="tab" data-bs-target="#puestos" type="button" role="tab" aria-controls="puestos" aria-selected="false">
                                <i class="fas fa-briefcase"></i> Altos Cargos
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="empleados-tab" data-bs-toggle="tab" data-bs-target="#empleados" type="button" role="tab" aria-controls="empleados" aria-selected="false">
                                <i class="fas fa-user-tie"></i> Empleados
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

                        <!-- Pestaña Proveedores -->
                        <div class="tab-pane fade" id="proveedores" role="tabpanel" aria-labelledby="proveedores-tab">
                            <div class="mt-3">
                                <h5>Últimos Proveedores</h5>
                                @if ($proveedores->count())
                                    <table class="table table-striped">
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
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Ver todos los proveedores</a>
                                    <a href="{{ route('proveedores.create') }}" class="btn btn-success">Crear nuevo proveedor</a>
                                @else
                                    <p class="alert alert-info">No hay proveedores registrados</p>
                                    <a href="{{ route('proveedores.create') }}" class="btn btn-success">Crear primer proveedor</a>
                                @endif
                            </div>
                        </div>

                        <!-- Pestaña Puestos -->
                        <div class="tab-pane fade" id="puestos" role="tabpanel" aria-labelledby="puestos-tab">
                            <div class="mt-3">
                                <h5>Últimos Altos Cargos</h5>
                                @if ($puestos->count())
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
                                            @foreach ($puestos as $puesto)
                                                <tr>
                                                    <td>{{ $puesto->id }}</td>
                                                    <td>{{ $puesto->nombre }}</td>
                                                    <td>{{ $puesto->descripcion ? \Illuminate\Support\Str::limit($puesto->descripcion, 60) : 'N/A' }}</td>
                                                    <td>
                                                        <a href="{{ route('puestos.show', $puesto->id) }}" class="btn btn-sm btn-info">Ver</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{ route('puestos.index') }}" class="btn btn-primary">Ver todos los altos cargos</a>
                                    <a href="{{ route('puestos.create') }}" class="btn btn-success">Crear nuevo alto cargo</a>
                                @else
                                    <p class="alert alert-info">No hay altos cargos registrados</p>
                                    <a href="{{ route('puestos.create') }}" class="btn btn-success">Crear primer alto cargo</a>
                                @endif
                            </div>
                        </div>

                        <!-- Pestaña Empleados -->
                        <div class="tab-pane fade" id="empleados" role="tabpanel" aria-labelledby="empleados-tab">
                            <div class="mt-3">
                                <h5>Últimos Empleados</h5>
                                @if ($empleados->count())
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
                                            @foreach ($empleados as $empleado)
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
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <a href="{{ route('empleados.index') }}" class="btn btn-primary">Ver todos los empleados</a>
                                    <a href="{{ route('empleados.create') }}" class="btn btn-success">Crear nuevo empleado</a>
                                @else
                                    <p class="alert alert-info">No hay empleados registrados</p>
                                    <a href="{{ route('empleados.create') }}" class="btn btn-success">Crear primer empleado</a>
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
