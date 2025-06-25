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
        <label>Servicio:</label><br>
        <select name="servicio">
            <option>Mantenimiento</option>
            <option>Diagnóstico</option>
        </select><br><br>

        <label>Fecha:</label><br>
        <input type="date" name="fecha"><br><br>

        <label>Hora:</label><br>
        <input type="time" name="hora"><br><br>

        <button type="submit">Reservar</button>
    </form>
</body>
</html>