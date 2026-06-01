@extends('layouts.app')

@section('content')
<div class="container">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Buscar Talleres</h2>
        <form class="mb-4">
        @csrf
        <input type="text" class=" form-control" name="busqueda" placeholder="Buscar por ubicación o nombre">
        </form>
    <table class="table table-bordered">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Ubicación</th>
        <th>Servicios</th>
        <th>Acción</th>
      </tr>
    </thead>
    <tbody>
    @foreach($talleres as $taller)
      <tr>
        <td>{{ $taller->name }}</td>
        <td>{{ $taller->ubicacion }}</td>
        <td>
          @if($taller->servicios->count())
            {{ implode(', ', $taller->servicios->pluck('nombre')->toArray()) }}
          @else
            Sin servicios
          @endif
        </td>
        <td>
          <a href="{{ route('cliente.perfilTaller', $taller->id) }}" class="btn btn-primary btn-sm">Ver perfil</a>
        </td>
      </tr>
    @endforeach
    </tbody>
  </table>
</body>
</html>
</div>
@endsection
