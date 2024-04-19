<nav class="nav-admin navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="mmenu collapse navbar-collapse" id="navbarTogglerDemo01">
	<div class="container">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">	

    <li class="nav-item">
         <a class="nav-link" tabindex="-1" aria-disabled="true"><i class="fas fa-user"></i>  {{auth()->user()->username}}</a>
    </li> 


		
     {{--}} @if(auth()->user()->hasRoles([1,2,4]))
    
	
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.listaContactos')}}" tabindex="-1" aria-disabled="true">Contactos</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.listafaq')}}" tabindex="-1" aria-disabled="true">Preguntas frecuentes  </a>
      </li>
 
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.listaPrensa')}}" tabindex="-1" aria-disabled="true">Prensa</a>
      </li> 

      @endif
      {{--}}
    
    
      @if(auth()->user()->hasRoles([1,2]))
    

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.listaRegistros')}}" tabindex="-1" aria-disabled="true">Listado de registros</a>
      </li>


    
      @endif



    
    
      @if(auth()->user()->hasRoles([1]))
    
 
      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.listarUsuarios')}}" tabindex="-1" aria-disabled="true">Listado de usuarios</a>
      </li>     

      <li class="nav-item">
        <a class="nav-link" href="{{route('admin.listarRoles')}}" tabindex="-1" aria-disabled="true">Listado de roles</a>
      </li>

  @endif


         @if(auth()->user()->hasRoles([1,2,3,4,6]))
    


    <li class="nav-item">

        <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"  tabindex="-1" aria-disabled="true"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión </a>

      </li>     
         <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
      @endif


    </ul>
    
    

 
  
    
    
	</div>  
  </div>
</nav>
