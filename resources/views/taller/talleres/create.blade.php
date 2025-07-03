@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Registrar Nuevo Taller</h2>

    <form action="{{ route('crud-talleres.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Taller</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('crud-talleres.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
