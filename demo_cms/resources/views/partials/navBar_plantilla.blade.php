

<nav class=" navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="mmenu collapse navbar-collapse" id="navbarTogglerDemo01">
	<div class="container">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/') }}">Convocatoria</a>
      </li>
     
      @if (Carbon\Carbon::now() < date('2023-12-31 23:59:59'))
          <li class="nav-item {{ Request::path() == 'prueba/registro' ? 'active' : '' }}">
              <a class="nav-link" href="{{ route('p_n.create') }}">Ficha de registro</a>
          </li>
      @else
          <li class="nav-item none disabled">
              <a class="nav-link" href="#">Ficha de registro</a>
          </li>
      @endif


    
      <li class="nav-item {{ Request::path() == 'preguntas-frecuentes' ? 'active' : '' }}">
        <a class="nav-link " href="{{route('preguntasFrecuentes')}}" tabindex="-1" aria-disabled="true">Preguntas frecuentes</a>
      </li>
      
      
      <li class="nav-item {{ Request::path() == 'contacto' ? 'active' : '' }}">
        <a class="nav-link" href="{{route('contacto')}}" tabindex="-1" aria-disabled="true">Contacto</a>
      </li>
      
      <li class="nav-item none">
        <a class="nav-link" href="{{route('login')}}" tabindex="-1" aria-disabled="true">Iniciar sesión</a>
      </li>
    </ul>
	</div>  
  </div>
</nav>
