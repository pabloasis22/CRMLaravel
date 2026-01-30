@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Detalles del Proveedor</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información del Proveedor</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9">{{ $proveedor->id }}</dd>

                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9">{{ $proveedor->nombre }}</dd>

                        <dt class="col-sm-3">Contacto:</dt>
                        <dd class="col-sm-9">{{ $proveedor->contacto ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">{{ $proveedor->email }}</dd>

                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9">{{ $proveedor->telefono ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Dirección:</dt>
                        <dd class="col-sm-9">{{ $proveedor->direccion ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Ciudad:</dt>
                        <dd class="col-sm-9">{{ $proveedor->ciudad ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">País:</dt>
                        <dd class="col-sm-9">{{ $proveedor->pais ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Fecha Creación:</dt>
                        <dd class="col-sm-9">{{ $proveedor->created_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
