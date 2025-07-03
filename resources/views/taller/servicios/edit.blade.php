@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Servicio</h2>

    <form action="{{ route('servicios.update', $servicio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del servicio</label>
            <input type="text" name="nombre" class="form-control" value="{{ $servicio->nombre }}" required>
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $servicio->descripcion }}</textarea>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio (S/)</label>
            <input type="number" name="precio" step="0.01" class="form-control" value="{{ $servicio->precio }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
