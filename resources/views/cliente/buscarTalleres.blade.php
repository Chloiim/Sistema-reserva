<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Buscar Talleres</h2>
    <form>
        @csrf
        <label for="busqueda">Buscar Talleres por Ubicación o Servicio:</label>
        <input type="text" name="busqueda">
        <button type="submit">Buscar</button>
    </form>
</body>
</html>
