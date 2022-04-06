<x-principal-layout>
    {{-- Recuperacion de publicaciones realizadas --}}
    <div class="container mb-5">
    <h3>Lista de publicaciones realizadas</h3>

    <a class="btn btn-primary mb-3" href="/publication/create" role="button" >Nuevo Artículo</a>

        <table class="table table-bordered border-primary">
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Puntuacion</th>
                <th>Fecha y Hora</th>
                <th>Acciones</th>
            </tr>
                    
            @foreach ($publications as $publication)
            <tr>
                <td>{{ $publication -> id }}</td>
                <td>{{ $publication -> titulo }}</td>
                <td align="center">
                    <img src="/imagen/{{ $publication -> imagen }}" width="80px" height="80px">
                </td>
                <td>{{ $publication -> puntuacion }}</td>
                <td>{{ $publication -> created_at }}</td>
                
                {{--Ver detalles de publicacion, editar la publicacion y eliminar publicacion--}}
                <td>
                    {{-- Ver detalles de publicacion --}}
                    <a href="publication/{{ $publication->id }}" class="btn btn-primary mb-3" role="button">Ver</a>
                    {{-- Editar publicacion--}}
                    <a href="publication/{{ $publication->id }}/edit" class="btn btn-info mb-3" role="button">Editar</a>
                    {{-- Borrar publicacion--}}
                    <form action="/publication/{{ $publication->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                        <button type="submit" class="btn btn-danger mb-3" type="button">Borrar</button>
                    </form>
                </td>
            </tr>   
            @endforeach
        </table>
    </div>
    {{-- Fin de Recuperacion de publicaciones realizadas --}}
</x-principal-layout>