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
    <h2>Perfil del Taller</h2>
    <p><strong>Nombre:</strong></p>
    <p><strong>Direccion:</strong></p>
    <p><strong>Telefono:</strong></p>
    <p><strong>Servicios:</strong></p>
  <ul>
    <li>Mantenimiento general</li>
    <li>Revisión de frenos</li>
  </ul>
  <a href="/reservar" class="btn btn-primary">Reservar Cita</a>
</body>
</html>
@endsection