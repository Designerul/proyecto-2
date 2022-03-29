<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Detalles publicacion</h1>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Caracteristicas</th>
                        <th>Puntuacion</th>
                        <th>Fecha y Hora</th>
                    </tr>
            
                    <tr>
                        <td>{{ $publication -> id }}</td>
                        <td>{{ $publication -> titulo }}</td>
                        <td>
                            <img src="/imagen/{{ $publication -> imagen }}" width="60%" alt="">
                        </td>
                        <td>{{ $publication -> caraceristicas }}</td>
                        <td>{{ $publication -> puntuacion }}</td>
                        <td>{{ $publication -> created_at }}</td>
                    </tr>
            
                </table>   
            </div>
        </div>
    </div>
</x-app-layout>