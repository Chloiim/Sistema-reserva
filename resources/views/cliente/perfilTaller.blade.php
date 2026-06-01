@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Perfil del Taller</h2>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $taller->name }}</h4>
                    <p><strong>Ubicación:</strong> {{ $taller->ubicacion ?? 'No registrada' }}</p>
                    <p><strong>Dirección:</strong> {{ $taller->direccion ?? 'No registrada' }}</p>
                    <p><strong>Teléfono:</strong> {{ $taller->telefono ?? 'No registrado' }}</p>
                    <p><strong>Descripción:</strong> {{ $taller->descripcion ?? 'Sin descripción' }}</p>

                    <h5 class="mt-4">Servicios</h5>
                    @if($taller->servicios->count())
                        <ul>
                            @foreach($taller->servicios as $servicio)
                                <li>{{ $servicio->nombre }} - S/ {{ number_format($servicio->precio, 2) }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Este taller aún no ha registrado servicios.</p>
                    @endif

                    <a href="{{ route('reservas.create', ['taller_id' => $taller->id]) }}" class="btn btn-primary mt-3">Reservar Cita</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection