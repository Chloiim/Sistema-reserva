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
    <h2>Configurar Horarios</h2>
    <form>
        <label>Día:</label><br>
        <select name="dia" class="btn btn-secondary">
            <option>Lunes</option>
            <option>Martes</option>
            <option>Miércoles</option>
            <option>Jueves</option>
            <option>Viernes</option>
            <option>Sábado</option>
        </select><br><br>

        <label>Hora de inicio:</label><br>
        <input type="time" class="btn btn-secondary" name="inicio"><br><br>

        <label>Hora de fin:</label><br>
        <input type="time" class="btn btn-secondary" name="fin"><br><br>

        <button type="submit" class="btn btn-primary" >Guardar</button>
    </form>
</body>
</html>
@endsection