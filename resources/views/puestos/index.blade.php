@extends('layouts.app')

@section('content_body')
<div class="container">
    <h1>Altos Cargos</h1>

    <a href="{{ route('puestos.create') }}" class="btn btn-success mb-3">
        <!-- Botón crear oculto en modo visual -->
        <!-- <i class="fas fa-plus"></i> Crear Alto Cargo -->
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($puestos->count())
        <table id="puestos-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <!-- <th>Acciones</th> -->
                </tr>
            </thead>
                        <!-- Columna de acciones eliminada en modo navegación -->
                            <form action="{{ route('puestos.destroy', $puesto->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar puesto?')">Eliminar</button>
                            </form>
                            -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            $(document).ready(function() {
                $('#puestos-table').DataTable({
                    language: {
                        url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json'
                    }
                });
            });
        </script>
    @else
        <p class="alert alert-info">No hay altos cargos registrados</p>
    @endif
</div>
@endsection
