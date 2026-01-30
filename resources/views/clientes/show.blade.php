@extends('adminlte::page')

@section('title', 'Detalles del Cliente')

@section('content_header')
    <h1>Detalles del Cliente</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información del Cliente</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9">{{ $cliente->id }}</dd>

                        <dt class="col-sm-3">Nombre:</dt>
                        <dd class="col-sm-9">{{ $cliente->nombre }}</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">{{ $cliente->email }}</dd>

                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9">{{ $cliente->telefono }}</dd>

                        <dt class="col-sm-3">Dirección:</dt>
                        <dd class="col-sm-9">{{ $cliente->direccion }}</dd>

                        <dt class="col-sm-3">Ciudad:</dt>
                        <dd class="col-sm-9">{{ $cliente->ciudad }}</dd>

                        <dt class="col-sm-3">Fecha Creación:</dt>
                        <dd class="col-sm-9">{{ $cliente->created_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop