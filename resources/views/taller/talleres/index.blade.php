@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Lista de Talleres</h2>
    <a href="{{ route('crud-talleres.create') }}" class="btn btn-primary mb-3">+ Nuevo Taller</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($talleres as $taller)
                <tr>
                    <td>{{ $taller->nombre }}</td>
                    <td>{{ $taller->direccion }}</td>
                    <td>{{ $taller->telefono }}</td>
                    <td>
                        <a href="{{ route('crud-talleres.edit', ['crud_tallere' => $taller->id]) }}" class="btn btn-sm btn-warning">Editar</a>

                        <form action="{{ route('crud-talleres.destroy', ['crud_tallere' => $taller->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
