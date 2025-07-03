@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mis Reservas</h2>
    <a href="{{ route('reservas.create') }}" class="btn btn-primary mb-3">+ Nueva Reserva</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Taller</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->servicio->taller->name }}</td>
                    <td>{{ $reserva->servicio->nombre }}</td>
                    <td>{{ $reserva->fecha }}</td>
                    <td>{{ $reserva->hora }}</td>
                    <td>{{ ucfirst($reserva->estado) }}</td>
                    <td>
                        <a href="{{ route('reservas.edit', $reserva->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('reservas.destroy', $reserva->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Cancelar esta reserva?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
