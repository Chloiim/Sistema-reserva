@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $taller->name }}</h2>
    <p><strong>Ubicación:</strong> {{ $taller->ubicacion }}</p>
    <p><strong>Email:</strong> {{ $taller->email }}</p>

    <h4>Servicios ofrecidos:</h4>
    @if($taller->servicios->count())
        <ul class="list-group mb-4">
            @foreach ($taller->servicios as $servicio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $servicio->nombre }}
                    <span class="badge bg-secondary">S/ {{ $servicio->precio }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <p>Este taller aún no ha registrado servicios.</p>
    @endif

    <a href="{{ route('reservas.create', ['taller_id' => $taller->id]) }}" class="btn btn-primary">
        Reservar con este taller
    </a>
</div>
@endsection
