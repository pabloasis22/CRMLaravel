@extends('adminlte::page')

@section('title', 'Detalles del Producto')

@section('content_header')
    <h1>Detalles del Producto</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información del Producto</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Imagen:</dt>
                        <dd class="col-sm-9">
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen" style="max-width: 200px;">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </dd>
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9">{{ $producto->id }}</dd>

                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9">{{ $producto->nombre }}</dd>

                        <dt class="col-sm-3">Descripción:</dt>
                        <dd class="col-sm-9">{{ $producto->descripcion }}</dd>

                        <dt class="col-sm-3">Precio:</dt>
                        <dd class="col-sm-9">{{ number_format($producto->precio, 2) }}</dd>

                        <dt class="col-sm-3">Stock:</dt>
                        <dd class="col-sm-9">{{ $producto->stock }}</dd>

                        <dt class="col-sm-3">Fecha Creación:</dt>
                        <dd class="col-sm-9">{{ $producto->created_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
