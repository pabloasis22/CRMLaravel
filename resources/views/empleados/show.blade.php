@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Detalles del Empleado</h1>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Información del Empleado</h3>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">ID:</dt>
                        <dd class="col-sm-9">{{ $empleado->id }}</dd>

                        <dt class="col-sm-3">Nombre Completo:</dt>
                        <dd class="col-sm-9">{{ $empleado->nombre }} {{ $empleado->apellido }}</dd>

                        <dt class="col-sm-3">Email:</dt>
                        <dd class="col-sm-9">{{ $empleado->email }}</dd>

                        <dt class="col-sm-3">Teléfono:</dt>
                        <dd class="col-sm-9">{{ $empleado->telefono ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Puesto:</dt>
                        <dd class="col-sm-9">{{ $empleado->puesto->nombre ?? 'N/A' }}</dd>

                        <dt class="col-sm-3">Fecha de Contratación:</dt>
                        <dd class="col-sm-9">{{ $empleado->fecha_contratacion->format('d/m/Y') }}</dd>

                        <dt class="col-sm-3">Salario:</dt>
                        <dd class="col-sm-9">${{ number_format($empleado->salario, 2) }}</dd>

                        <dt class="col-sm-3">Estado:</dt>
                        <dd class="col-sm-9">
                            <span class="badge badge-{{ $empleado->estado == 'activo' ? 'success' : 'secondary' }}">
                                {{ ucfirst($empleado->estado) }}
                            </span>
                        </dd>

                        <dt class="col-sm-3">Fecha Creación:</dt>
                        <dd class="col-sm-9">{{ $empleado->created_at->format('d/m/Y H:i') }}</dd>
                    </dl>
                </div>
                <div class="card-footer">
                    <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
