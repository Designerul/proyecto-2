@extends('adminlte::page')

@section('title', 'Dashboard')

@section('plugins.')

@section('content_header')
    <h1>Lista de publicaciones realizadas</h1>
@stop

@section('content')

    {{-- Agregar componente de posts index --}}
   {{-- @livewire('admin.posts-index') --}}

    {{-- Alerta de creacion de publicacion --}}
    @if (session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
    @endif
    {{-- Fin de Alerta de creacion de publicacion --}}

    {{-- Alerta de borrado --}}
    @if (session('delete'))
    <div class="alert alert-danger">
        <strong>{{ session('delete') }}</strong>
    </div>
    @endif
    {{-- Fin de Alerta de borrado --}}

    {{-- Recuperacion de publicaciones realizadas --}}
    <div class="container mb-5">

    <a class="btn btn-primary mb-3" href="publication/create" role="button" >Nuevo Artículo</a>

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
                    <form action="publication/{{ $publication->id }}" method="POST">
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
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
