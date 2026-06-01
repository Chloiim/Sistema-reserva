@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buscar Talleres</h1>
<form action="{{ route('busqueda.resultados') }}" method="GET">
    <div class="row mb-3">
        <div class="col">
            <input type="text" name="busqueda" class="form-control" placeholder="Buscar por nombre, ubicación o servicio" value="{{ request('busqueda') }}">
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Buscar Talleres</button>
        </div>
    </div>
</form>

@if($talleres->count())
    <div class="list-group">
        @foreach ($talleres as $taller)
            <a href="{{ route('taller.perfil', $taller->id) }}" class="list-group-item list-group-item-action">
                <h5>{{ $taller->name }} ({{ $taller->ubicacion }})</h5>
                <p><strong>Servicios:</strong> {{ implode(', ', $taller->servicios->pluck('nombre')->toArray()) }}</p>
            </a>
        @endforeach
    </div>
@else
    <p>No se encontraron talleres.</p>
@endif
@endsection