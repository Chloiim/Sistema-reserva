@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-12">
            <h2>Mi Perfil de Taller</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ $taller->name }}</p>
            <p><strong>Ubicación:</strong> {{ $taller->ubicacion ?? 'No registrada' }}</p>
            <p><strong>Dirección:</strong> {{ $taller->direccion ?? 'No registrada' }}</p>
            <p><strong>Teléfono:</strong> {{ $taller->telefono ?? 'No registrado' }}</p>
            <p><strong>Descripción:</strong> {{ $taller->descripcion ?? 'Sin descripción' }}</p>

            <a href="{{ route('taller.mi-perfil.edit') }}" class="btn btn-primary">Editar perfil</a>
        </div>
    </div>
</div>
@endsection