<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Editar publicación</h1>

                {{-- Validar campos introducidos --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                {{--Crear nueva publicacion --}}
                <form action="/publication/{{ $publication->id }}" method="POST">
                    @method('PATCH')
                    @csrf
                    {{-- Editar titulo--}}
                    <label for="titulo">Titulo de Publicacion</label><br>
                    <input type="text" name="titulo" value={{ isset($publication) ? $publication->titulo : old('titulo') }}><br>
                    @error('titulo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror<br>

                    {{-- Editar imagen --}}
                    <label for="imagen">Subir imagen</label><br>
                    <div class="custom-file">
                        <input type="file" name="imagen" class="custom-file-input" id="customFileLang" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar imagen</label>
                    </div>

                    {{-- Editar caracteristicas --}}
                    <label for="caraceristicas">Caracteristicas</label><br>
                    <textarea name="caraceristicas" id="caraceristicas" cols="30" rows="10">
                    {{ isset($publication) ? $publication->caraceristicas : old('caraceristicas') }} 
                    </textarea><br>

                    {{-- Editar puntuacion--}}
                    <label for="puntuacion">Puntuacion</label><br>
                    <input type="number" minlength="1" maxlength="2" min="0" max="10" name="puntuacion" value={{ isset($publication) ? $publication->puntuacion : old('puntuacion') }}><br>

                    {{-- Boton de guardado y cancelar--}}
                    <input type="submit" value="Guardar">
                    <a href="/publication">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

