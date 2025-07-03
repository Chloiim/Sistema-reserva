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
    <h2>Servicios del Taller</h2>
    <button class="btn btn-primary">Agregar Servicio</button>
    <br><br>
    <table class="table">
        <tr>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <tr>
            
            <td>
                <!-- <button class="btn btn-warning btn-sm">Editar</button>
                <button class="btn btn-danger btn-sm">Eliminar</button> -->
            </td>
        </tr>
    </table>
</body>
</html>
@endsection