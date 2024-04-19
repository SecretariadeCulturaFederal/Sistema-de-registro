@extends('partials.layout_plantilla')
@section('content')
	<div class="container">
		<div class="col-md-8 offset-md-2 mt-5 mb-5 text-center">
			<h2>Su registro al evento [Nombre del evento] concluyó correctamente.</h2>
			<h3>Su número de folio es: <strong class="c-rojo">{{$folio->folio}}</strong> </h3>
			<h3>[opción 2]Su número de folio es: <strong class="c-rojo">PREFIJO_00{{$folio->id}}</strong> </h3>
			<h4 class="mb-5"> Los resultados se publicarán en el sitio oficial <a href="#"> [sitioweb.com.mx]</a> </h4>
		</div>
	</div>
@endsection