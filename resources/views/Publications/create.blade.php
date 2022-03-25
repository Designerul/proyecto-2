<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crear nueva publicación</title>
</head>
<body>
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
    <form action="/publication" method="POST"> 
       @csrf
            {{-- Agregar titulo--}}
            <label for="titulo">Titulo de Publicacion</label><br>
            <input type="text" name="titulo" value={{ isset($publication) ? $publication->titulo : old('titulo') }}><br>
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror<br>

            {{-- Agregar descripcion--}}
            <label for="descripcion">Descripcion</label><br>
            <textarea name="descripcion" id="descripcion" cols="30" rows="10">
            {{ isset($publication) ? $publication->descripcion : old('descripcion') }} 
            </textarea><br>

            {{-- Agregar puntuacion--}}
            <label for="puntuacion">Puntuacion</label><br>
            <input type="number" minlength="1" maxlength="2" min="0" max="10" name="puntuacion" value={{ isset($publication) ? $publication->puntuacion : old('puntuacion') }}><br>

            {{-- Boton de guardado--}}
            <input type="submit" value="Guardar">
    </form>
</body>
</html>