<x-principal-layout>
    <!-- Vista de publicacion -->
    <div class="container mb-5">
        <h1>Análisis:</h1>
        <hr>
        <div class="row">
            <div class="col-12 col-md-9">

                <!-- Vista de Parte principal de articulo (Titulo,Fecha e Imagen) -->
                <div class="row mb-5">
                    <div class="col-9">
                        <h3>{{ $publication -> titulo }}</h3>
                        <hr>
                        <p class="lead">Fecha: {{ $publication -> created_at }}</p>

                        <div class="row">
                            <div class="col-6">
                                <img src="/imagen/{{ $publication -> imagen }}"  class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin de vista de Parte principal de articulo (Titulo,Fecha e Imagen) -->

                <!-- Vista secundaria de articulo (Caracteristicas,Puntuacion) -->
                <div class="row">
                    <div class="col-9">
                        <hr>
                        <h3>Características:</h3>
                        <hr>

                        <p>{{ $publication -> caraceristicas }}</p>
                    </div>
                </div>
                <!-- Fin de vista secundaria de articulo (Caracteristicas,Puntuacion) -->

            </div>
        </div>
        <hr>
    </div>
    <!-- Fin de vista de publicacion -->
</x-principal-layout>
