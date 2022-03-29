<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('create') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1>Crear nueva publicación</h1>

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
                <form action="/publication" method="POST" enctype="multipart/form-data"> 
                @csrf
                    {{-- Agregar titulo--}}
                    <label for="titulo">Titulo de Publicacion</label><br>
                    <input type="text" name="titulo" value={{ isset($publication) ? $publication->titulo : old('titulo') }}><br>
                    @error('titulo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror<br>

                    {{-- Agregar imagen --}}
                    <div class="grid grid-cols-1 mt-5 mx-7">
                    <label class="uppercas md:text-sm text-xs text-black-500 font-semibold mb-1">Subir Imagen</label>
                        <div class="flex items-center justify-center w-full">
                            <label class="flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group">
                                    <div class="flex flex-col items-center justify-center pt-7">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-400 group-hover:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">Seleccionar imagen</p>
                                    </div>
                                <input type="file"  name="imagen" class="hidden">
                             </label>
                        </div>
                    </div> 

            <!--        <label for="imagen">Subir imagen</label><br>
                    <div class="custom-file">
                        <input type="file" name="imagen" class="custom-file-input" id="customFileLang" lang="es">
                        <label class="custom-file-label" for="customFileLang">Seleccionar imagen</label>
                    </div> -->

                    {{-- Agregar caracteristicas --}}
                    <label for="caraceristicas">Caracteristicas</label><br>
                    <textarea name="caraceristicas" id="caraceristicas" cols="30" rows="10">
                    {{ isset($publication) ? $publication->caraceristicas : old('caraceristicas') }} 
                    </textarea><br>

                    {{-- Agregar puntuacion--}}
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

