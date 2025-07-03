@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Reserva</h2>

    <form action="{{ route('reservas.update', $reserva->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Servicio</label>
            <select name="servicio_id" class="form-select" required>
                @foreach($servicios as $servicio)
                    <option value="{{ $servicio->id }}" {{ $reserva->servicio_id == $servicio->id ? 'selected' : '' }}>
                        {{ $servicio->nombre }} - Taller: {{ $servicio->taller->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" value="{{ $reserva->fecha }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Hora</label>
            <input type="time" name="hora" class="form-control" value="{{ $reserva->hora }}" required>
        </div>

        <button class="btn btn-primary" type="submit">Actualizar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
