<x-principal-layout>
    {{-- Formulario de edicion de articulo --}}
    <div class="container mb-5">
        <h3>Editar Artículo</h3>
        <hr>

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

        {{-- Editar publicacion --}}
        <form action="/publication/{{ $publication->id }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group">
                {{-- Editar titulo--}}
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título del Artículo</label>
                    <input type="text" class="form-control" name="titulo" value={{ isset($publication) ? $publication->titulo : old('titulo') }}><br>
                    @error('titulo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Editar imagen --}}
                <div class="mb-3">
                    <label for="formFile" name="imagen" class="form-label">Seleccionar Imagen del Artículo</label>
                    <input class="form-control" name="imagen" type="file" id="formFile">
                </div>

                {{-- Editar caracteristicas --}}
                <div class="mb-3">
                    <label for="caraceristicas" class="form-label">Características del Artículo</label>
                    <textarea class="form-control" name="caraceristicas" id="caraceristicas" rows="10">
                    {{ isset($publication) ? $publication->caraceristicas : old('caraceristicas') }} 
                    </textarea>
                </div>

                {{-- Editar puntuacion--}}
                <div class="mb-3">
                    <label for="puntuacion" class="form-label">Puntuación del Artículo</label>
                    <input  class="form-control" type="number" minlength="1" maxlength="2" min="0" max="10" name="puntuacion" value={{ isset($publication) ? $publication->puntuacion : old('puntuacion') }}>
                </div>

                {{-- Boton de guardado y cancelar--}}
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                    <button class="btn btn-primary me-md-2" type="submit">Guardar</button>
                    <a class="btn btn-primary" href="/publication" role="button">Cancelar</a>
                </div>
                
            </div>
        </form>
    </div>
    {{-- Fin de Formulario de edicion de articulo --}}
</x-principal-layout>

