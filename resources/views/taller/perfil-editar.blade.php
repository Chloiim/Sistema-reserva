@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Completar Perfil del Taller</h2>

    <form action="{{ route('taller.mi-perfil.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre del Taller</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $taller->name) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Ubicación</label>
            <input type="text" name="ubicacion" class="form-control" value="{{ old('ubicacion', $taller->ubicacion) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Dirección</label>
            <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $taller->direccion) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $taller->telefono) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control" rows="4">{{ old('descripcion', $taller->descripcion) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Guardar cambios</button>
        <a href="{{ route('taller.mi-perfil') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection