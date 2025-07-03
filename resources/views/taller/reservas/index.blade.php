@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Reservas Recibidas</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Estado</th>
                <th>Actualizar Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->cliente->name }}</td>
                    <td>{{ $reserva->servicio->nombre }}</td>
                    <td>{{ $reserva->fecha }}</td>
                    <td>{{ $reserva->hora }}</td>
                    <td>{{ ucfirst($reserva->estado) }}</td>
                    <td>
                        <form action="{{ route('taller.reservas.estado', $reserva->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="estado" class="form-select" onchange="this.form.submit()">
                                <option value="pendiente" {{ $reserva->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                <option value="confirmado" {{ $reserva->estado == 'confirmado' ? 'selected' : '' }}>Confirmado</option>
                                <option value="cancelado" {{ $reserva->estado == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
