<!DOCTYPE html>
<head>
	@include('partials.head_plantilla')	
</head>
<body>
	<noscript>
  <p>Bienvenido a Mi Sitio</p>
  <p>La página que estás viendo requiere para su funcionamiento el uso de JavaScript.
Si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
</noscript>
	@include('partials.header_plantilla')
	@include('partials.navBar_plantilla')	
	<div class="container container-fluid">
	@yield('content')		
	</div>

	@include('partials.scripts')
</body>
</html>