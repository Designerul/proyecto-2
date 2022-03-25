<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publicacion</title>
</head>

<body>
    <h1>Detalles publicacion</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Puntuacion</th>
            <th>Fecha y Hora</th>
        </tr>

        <tr>
            <td>{{ $publication -> id }}</td>
            <td>{{ $publication -> titulo }}</td>
            <td>{{ $publication -> descripcion }}</td>
            <td>{{ $publication -> puntuacion }}</td>
            <td>{{ $publication -> created_at }}</td>
        </tr>

    </table>   
</body>
</html>