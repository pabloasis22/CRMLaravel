@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Editar Proveedor</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('proveedores.update', $proveedor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proveedor->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="contacto">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" value="{{ $proveedor->contacto }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $proveedor->email }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $proveedor->telefono }}">
        </div>

        <div class="form-group">
            <label for="direccion">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $proveedor->direccion }}">
        </div>

        <div class="form-group">
            <label for="ciudad">Ciudad</label>
            <input type="text" class="form-control" id="ciudad" name="ciudad" value="{{ $proveedor->ciudad }}">
        </div>

        <div class="form-group">
            <label for="pais">País</label>
            <input type="text" class="form-control" id="pais" name="pais" value="{{ $proveedor->pais }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
        <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
