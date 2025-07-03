@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Taller</h2>

    <form action="{{ route('crud-talleres.update', ['crud_tallere' => $taller->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Taller</label>
            <input type="text" name="nombre" class="form-control" value="{{ $taller->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ $taller->direccion }}" required>
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $taller->telefono }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('crud-talleres.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
