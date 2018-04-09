<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<header >
	<?php function activarmenu($url){
		return request()->is($url) ? 'active' : '';
	}?><!-- funcion usada para ver que url esta ctivada llamando un style .active -->

<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      			<li class="{{ activarmenu('/')  }}" >
      				<a href="{{ route('inicio') }}">INICIO</a></li>      	
				<li class="{{ activarmenu('mensajes/create')  }}">
					<a  href="{{ route('mensajes.create')}}">Contactos</a></li>
				<li class="{{ activarmenu('Saludo/*')}}" >
					<a href="{{ route('saludo','AndresCamilo')}}">Saludo</a></li>
				
				 <!-- Saludo/* url que llama cualquier nombre -->		
      
      </ul>
      <ul class="nav navbar-nav navbar-right">
         		@guest
				 	<li class="{{ activarmenu('login')  }}""> 
				 		<a " href="{{ route('login') }}"">Login</a></li>
				 	<li class="{{ activarmenu('mensajes')  }}"> 
				 		<a  href="{{ route('register') }}">Register</a></li>
				  
				 @else
         @if (auth()->user()->hasroles(['admin']))
         <li class="{{ activarmenu('usuarios')  }}"> 
              <a  href="{{ route('usuarios.index')}}">Usuarios</a></li>
          @endif
{{-- if para validar si es rol que muestre las direcciones de usuarios --}}
          {{--  @if (auth()->user()->hasRoles(['1'])) --}}
           {{--    <li class="{{ activarmenu('usuarios')  }}"> 
              <a  href="{{ route('usuarios.index')}}">Usuarios</a></li> --}}
           {{--  @endif --}}
            
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->email }}<span class="caret"></span></a>
          <ul class="dropdown-menu">
                        
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
            
          </ul>
        </li> 
				 
					
                                                              
	                        @endguest
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<H1>{{ request()->is('/') ? 'Estas en el home' : 'No estas en el home' }}</H1>

		
	</header><!-- /header -->
	<div class="container">
		@yield('Contenido')
	<footer>
		Coopryght ° {{ date('Y') }}
	</footer>
	</div>
	<<script src="/js/app.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>