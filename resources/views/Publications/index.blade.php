<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('index') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Lista de publicaciones realizadas</h1>

                <a type="button" href="/publication/create" >Crear nueva publicación</a>
            
                {{-- Recuperacion de publicaciones realizadas por el editor --}}
                <table class="table-dixed w-full">
                    <tr>
                        <th class="border px-4 py-2">ID</th>
                        <th class="border px-4 py-2">Titulo</th>
                        <th class="border px-4 py-2">Imagen</th>
                        <th class="border px-4 py-2">Puntuacion</th>
                        <th class="border px-4 py-2">Fecha y Hora</th>
                    </tr>
                
                    @foreach ($publications as $publication)
                    <tr class="bg-gray-800 text-white">
                        <td>{{ $publication -> id }}</td>
                        <td>{{ $publication -> titulo }}</td>
                        <td>
                            <img src="/imagen/{{ $publication -> imagen }}" width="60%" alt="">
                        </td>
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
            </div>
        </div>
    </div>
</x-app-layout>