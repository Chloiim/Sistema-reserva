@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Crear Reserva</h2>

    <form action="{{ route('reservas.store') }}" method="POST">
        @csrf

        {{-- SELECCIONAR TALLER --}}
        <div class="mb-3">
            <label for="taller_id" class="form-label">Taller</label>
            <select name="taller_id" id="taller_id" class="form-select" required>
                <option value="">Seleccione un taller</option>
                @foreach ($talleres as $taller)
                    <option value="{{ $taller->id }}" {{ request('taller_id') == $taller->id ? 'selected' : '' }}>
                        {{ $taller->name }} - {{ $taller->ubicacion }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- SELECCIONAR SERVICIO --}}
        <div class="mb-3">
            <label for="servicio_id" class="form-label">Servicio</label>
            <select name="servicio_id" id="servicio_id" class="form-select" required>
                <option value="">-- Selecciona un servicio --</option>
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

        <button type="submit" class="btn btn-success">Reservar</button>
        <a href="{{ route('reservas.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function cargarServicios(tallerId, servicioId = null) {
        if (!tallerId) {
            $('#servicio_id').html('<option value="">Seleccione un servicio</option>');
            return;
        }

        $.get(`/api/taller/${tallerId}/servicios`, function(servicios) {
            let opciones = '<option value="">Seleccione un servicio</option>';
            servicios.forEach(function(servicio) {
                let selected = (servicioId == servicio.id) ? 'selected' : '';
                opciones += `<option value="${servicio.id}" ${selected}>${servicio.nombre} - S/ ${servicio.precio}</option>`;
            });
            $('#servicio_id').html(opciones);
        });
    }

    $(document).ready(function () {
        let tallerInicial = $('#taller_id').val();
        cargarServicios(tallerInicial);

        $('#taller_id').on('change', function () {
            cargarServicios(this.value);
        });
    });
</script>
@endsection
