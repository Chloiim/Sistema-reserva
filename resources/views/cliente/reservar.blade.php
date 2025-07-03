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
    <h2>Reservar Cita</h2>
    <form>
        <div class="mb-3">
            <label>Servicio:</label><br>
            <select class="btn btn-secondary" name="servicio">
                <option>Mantenimiento</option>
                <option>Diagnóstico</option>
            </select><br><br>
        </div>
        <div class="mb-3">
            <label>Fecha:</label><br>
            <input type="date" class="btn btn-secondary" name="fecha"><br><br>
        </div>
        <div class="mb-3">
            <label>Hora:</label><br>
            <input type="time" class="btn btn-secondary" name="hora"><br><br>
        </div>
        <button class="btn btn-primary">Reservar</button>
    </form>
</body>
</html>
</div>
@endsection