<x-principal-layout>
    <!-- Vista de articulos para usuarios en general -->
    <div class="container mb-5">
        <h3>Análisis</h3>
        <p class="lead">Tecnología y entretenimiento</p>
        <hr>

        <!-- Articulo -->
        @foreach ($publications as $publication)
        <div class="row">
            <div class="col-12 col-md-9">
                <div class="row mb-5">

                    <!-- Imagen y Fecha de creacion de articulo -->
                    <div class="col-2">         
                        <img src="/imagen/{{ $publication -> imagen }}"  class="img-fluid">
                        <p>Fecha: {{ $publication -> created_at }}</p>
                    </div>
                    <!--Fin de Imagen y Fecha de creacion de articulo -->

                    <!-- Titulo y caracteristicas del articulo limitado a 400 caracteres -->
                    <div class="col-9">
                        <h3>{{ $publication -> titulo }}</h3>
                        <p>
                            {{ Str::limit($publication -> caraceristicas,400,'(...)') }}

                        </p>
                        <a href="publication/{{ $publication->id }}" class="btn btn-warning btn-sm">Leer mas..</a>
                    </div>
                    <!-- Fin de Titulo y caracteristicas del articulo limitado a 400 caracteres -->

                </div>
            </div>
        </div>
        <hr>
        @endforeach
        <!-- Fin Artculos -->
    </div>
    <!-- Fin de vista de articulos para usuarios en general -->
</x-principal-layout>