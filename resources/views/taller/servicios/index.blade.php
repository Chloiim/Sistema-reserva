@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Servicios del Taller</h2>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">+ Nuevo Servicio</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio (S/)</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
                <tr>
                    <td>{{ $servicio->nombre }}</td>
                    <td>{{ $servicio->descripcion }}</td>
                    <td>{{ number_format($servicio->precio, 2) }}</td>
                    <td>
                        <a href="{{ route('servicios.edit', $servicio->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('servicios.destroy', $servicio->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este servicio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
