@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h2>Inicio del Taller</h2>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Reservas</h5>
                    <p class="card-text h3">{{ $reservasCount ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Servicios Activos</h5>
                    <p class="card-text h3">{{ $serviciosCount ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <h4>Próximas reservas</h4>
            @if(isset($proximasReservas) && $proximasReservas->count())
                <table class="table">
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Servicio</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proximasReservas as $res)
                            <tr>
                                <td>{{ optional($res->cliente)->name ?? 'Cliente' }}</td>
                                <td>{{ optional($res->servicio)->nombre ?? 'Servicio' }}</td>
                                <td>{{ $res->fecha }}</td>
                                <td>{{ $res->hora }}</td>
                                <td>{{ $res->estado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No hay reservas próximas.</p>
            @endif
        </div>
    </div>
</div>
@endsection