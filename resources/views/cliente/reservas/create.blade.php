@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Reserva</h2>

    {{-- Formulario para seleccionar taller y cargar servicios (GET) --}}
    <form method="GET" action="{{ route('reservas.create') }}" class="mb-4">
        <div class="mb-3">
            <label for="taller_id" class="form-label">Seleccionar Taller</label>
            <select name="taller_id" id="taller_id" class="form-select" onchange="this.form.submit()">
                <option value="">Seleccione un taller</option>
                @foreach ($talleres as $taller)
                    <option value="{{ $taller->id }}" {{ (int) ($taller_id ?? 0) === $taller->id ? 'selected' : '' }}>
                        {{ $taller->name }} - {{ $taller->ubicacion }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    {{-- Formulario de reserva (POST) --}}
    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf
        <input type="hidden" name="taller_id" value="{{ $taller_id ?? '' }}">

        {{-- SELECCIONAR SERVICIO --}}
        <div class="mb-3">
            <label for="servicio_id" class="form-label">Servicio</label>
            <select name="servicio_id" id="servicio_id" class="form-select" required @if(empty($servicios) || $servicios->isEmpty()) disabled @endif>
                @if(!empty($servicios) && $servicios->count())
                    <option value="">-- Selecciona un servicio --</option>
                    @foreach ($servicios as $servicio)
                        <option value="{{ $servicio->id }}">{{ $servicio->nombre }} - S/ {{ $servicio->precio }}</option>
                    @endforeach
                @else
                    <option value="">No hay servicios cargados para el taller seleccionado</option>
                @endif
            </select>
        </div>

        {{-- FECHA --}}
        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>

        {{-- HORA --}}
        <div class="mb-3">
            <label class="form-label">Hora</label>
            <input type="time" name="hora" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success" @if(empty($servicios) || $servicios->isEmpty()) disabled @endif>Reservar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
@endsection
