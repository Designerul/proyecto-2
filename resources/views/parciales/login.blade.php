<div class="navbar-nav">
    @auth
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
        this.closest('form').submit(); " class="btn btn-outline-danger btn-sm" style="margin: 4px" role="button" aria-pressed="true"">Cerrar sesion</a>
    </form>

    <a href="{{ route('admin.home') }}" class="btn btn-outline-primary btn-sm" style="margin: 4px" role="button" aria-pressed="true">Panel Control</a>

    @else
      <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm" style="margin: 4px" role="button" aria-pressed="true">Ingresar</a>

      @if (Route::has('register'))
          <a href="{{ route('register') }}" class="btn btn-outline-warning btn-sm" style="margin: 4px" role="button" aria-pressed="true">Registrarse</a>
      @endif
    @endauth
  </div>