@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
    <h1>Gestión de Clientes</h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Nuevo Cliente
                    </a>
                </div>
                <div class="card-body">
                    @if($clientes->count())
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clientes as $cliente)
                                    <tr>
                                        <td>{{ $cliente->id }}</td>
                                        <td>{{ $cliente->nombre }}</td>
                                        <td>{{ $cliente->email }}</td>
                                        <td>{{ $cliente->telefono }}</td>
                                        <td>
                                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-muted">No hay clientes registrados</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection