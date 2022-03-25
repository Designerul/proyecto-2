<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Publicaciones realizadas</title>
</head>
<body>
    <h1>Lista de publicaciones realizadas</h1>

    <a href="/publication/create">Crear nueva publicación</a>

    {{-- Recuperacion de publicaciones realizadas por el editor --}}
    <table>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Puntuacion</th>
            <th>Fecha y Hora</th>
        </tr>
    
        @foreach ($publications as $publication)
        <tr>
            <td>{{ $publication -> id }}</td>
            <td>{{ $publication -> titulo }}</td>
            <td>{{ $publication -> puntuacion }}</td>
            <td>{{ $publication -> created_at }}</td>

        {{--Ver detalles de publicacion, editar la publicacion y eliminar publicacion--}}
            <td>
                <a href="publication/{{ $publication->id }}">Ver publicacion</a><br>
    
                <a href="publication/{{ $publication->id }}/edit">Editar</a><br>
    
                <form action="/publication/{{ $publication->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Borrar">
                </form>
            </td>
        </tr>   
        @endforeach
    </table>    
</body>
</html>