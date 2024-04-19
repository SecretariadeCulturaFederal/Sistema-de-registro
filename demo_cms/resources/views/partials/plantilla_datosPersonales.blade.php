<h5>Datos personales</h5>
<div class="row gy-2 gx-md-3 mt-5">
  <!--Pregunta 1-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Nombre(s)</p>
    <input type="text" name="nombres"  class="form-control"  id="nombres" placeholder="Nombre(s)" value="{{old('nombres')}}">
    {!!$errors->first('nombres','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 2-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Apellido paterno </p>
    <input type="text" name="apellidoPaterno"  class="form-control"  id="apellidoPaterno" placeholder="Apellido paterno" value="{{old('apellidoPaterno')}}">
    {!!$errors->first('apellidoPaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 3-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Apellido materno</p>
    <input type="text" name="apellidoMaterno" class="form-control"  id="apellidoMaterno" placeholder="Apellido materno" value="{{old('apellidoMaterno')}}">
    {!!$errors->first('apellidoMaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 4-->
	<div class="col-md-4 form-group">
		<p> <sup class="cRed">*</sup> Fecha de nacimiento</p>
		<input type="date" name="fechaNacimiento"  id="fechaNacimiento" class="form-control" value="{{old('fechaNacimiento', $registroDatosPersonales->fechaNacimiento)}}">
		{!!$errors->first('fechaNacimiento','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

  <!--Pregunta 5-->
	<div class="col-md-4 form-group">
		<p> <sup class="cRed">*</sup> Nacionalidad</p>
		<select class="form-control" name="idNacionalidad"  id="idNacionalidad">
		<option value="" selected hidden>Seleccione una nacionalidad</option>
		    @foreach($nacionalidades as $n )
		      @if($n->id==old('idNacionalidad') || $n->id==$registroDatosPersonales->idNacionalidad)
		        <option selected value="{{$n->id}}">{{$n->gentilicio_nac}}</option>
		      @else
		        <option value="{{$n->id}}">{{$n->gentilicio_nac}}</option>
		      @endif
		    @endforeach
		</select>
		{!!$errors->first('idNacionalidad','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

  <!--Pregunta 6-->
	<div class="col-md-4 form-group">
		<p> <sup class="cRed">*</sup> CURP</p>
		<input type="text" name="curp"  id="curp" class="form-control" value="{{old('curp', $registroDatosPersonales->curp)}}">
		{!!$errors->first('curp','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

  <!--Pregunta 7-->
  <div class="col-md-4 form-group">
  <p> <sup class="cRed">*</sup> Género</p>
    <select class="form-control" name="genero"  id="genero">
		<option value="" selected hidden>Seleccione una opción</option>
		    @foreach($generos as $g )
		      @if($g->id==old('genero') || $g->id==$registroDatosPersonales->genero)
		        <option selected value="{{$g->id}}">{{$g->genero}}</option>
		      @else
		        <option value="{{$g->id}}">{{$g->genero}}</option>
		      @endif
		    @endforeach
		</select>
     {!!$errors->first('genero','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 8-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Seudónimo</p>
    <input type="text" class="form-control" name="seudonimo"  id="seudonimo" placeholder="Seudónimo" value="{{old('seudonimo')}}">
    {!!$errors->first('seudonimo','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 9-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Campo adicional</p>
    <input type="text" class="form-control" name="adicional_1"  id="adicional_1" placeholder="placeholder adicional" value="{{old('adicional_1')}}">
    {!!$errors->first('adicional_1','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <h5>Lugar de residencia / Datos de la localidad</h5>

  <!--Pregunta 10-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> Calle</p>                  
    <input type="text"  class="form-control" name="calleResidencia" id="calleResidencia"   placeholder="Escriba la calle"   value="{{old('calleResidencia')}}" >
    {!!$errors->first('calleResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>
             
  <!--Pregunta 11-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> Número </p>
    <input type="text"  class="form-control" name="numeroResidencia" id="numeroResidencia"   placeholder="Escriba  número"   value="{{old('numeroResidencia')}}" >
    {!!$errors->first('numeroResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 12-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> C.P.</p>
    <input type="text"   class="form-control" name="cpResidencia" id="cpResidencia"  placeholder="Escriba código postal"  maxlength="5"  value="{{old('cpResidencia')}}" >
    {!!$errors->first('cpResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

<!-- Pregunta 13 -->
<div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Estado</p>
    <select id="idEstado" name="idEstado"  class="form-control" onchange="filtrarMunicipios()">
        <option value="" selected disabled>Seleccione estado</option>
        @foreach($estados as $item)
            @if($item->id == old('idEstado') || $item->id == $registroDatosPersonales->idEstado)
                <option selected value="{{ $item->id }}">{{ $item->nombre }}</option>
            @else
                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
            @endif
        @endforeach
    </select>
</div>

<!-- Pregunta 14 -->
<div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> Municipio </p>
    <select id="idMunicipio" name="idMunicipio"  class="form-control">
        <option value="" selected disabled>Seleccione municipio</option>
        @foreach($municipios as $item)
            @if($item->id == old('idMunicipio') || $item->id == $registroDatosPersonales->idMunicipio)
                <option selected value="{{ $item->id }}" data-id-estado="{{ $item->id_estado }}">{{ $item->nombre }}</option>
            @else
                <option value="{{ $item->id }}" data-id-estado="{{ $item->id_estado }}">{{ $item->nombre }}</option>
            @endif
        @endforeach       
    </select>
</div>

<script>
    function filtrarMunicipios() {
        var idEstadoSeleccionado = document.getElementById('idEstado').value;
        var municipioSelect = document.getElementById('idMunicipio');

        for (var i = 0; i < municipioSelect.options.length; i++) {
            var option = municipioSelect.options[i];
            var idEstadoMunicipio = option.getAttribute('data-id-estado');

            if (idEstadoSeleccionado === '' || idEstadoSeleccionado === idEstadoMunicipio) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        }
    }
</script>


  <!--Pregunta 15-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> Localidad</p>
    <input type="text" class="form-control"  name="localidad"  placeholder="Escriba localidad"   value="{{old('localidad')}}" >
    {!!$errors->first('localidad','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>                     


  <h5>Datos de contacto</h5>

  <!--Pregunta 16-->
  <div class="col-md-6 form-group">
    <p><sup class="cRed">*</sup> Correo electrónico</p>
    <input type="email" name="email"    class="form-control" id="email" placeholder="Escriba correo electrónico"     value="{{old('email')}}" >
    {!!$errors->first('email','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}                  
  </div>

  <!--Pregunta 17-->
  <div class="col-md-6 form-group">
    <p> <sup class="cRed">*</sup> Confirmar correo electrónico</p>
    <input type="email" name="emailVerf"   class="form-control" id="emailVerf"   onchange="emailCheck()"  placeholder="Confirme correo electrónico" value="{{old('emailVerf')}}" >
    {!!$errors->first('emailVerf','<FONT COLOR="red"><strong>:message</strong></FONT>')!!} 
    <p id="demo"></p>
  </div>

  <!--Pregunta 18-->
  <div class="col-md-6 form-group">
    <p><sup class="cRed">*</sup> Tel. fijo</p>
    <input type="tel" name="telUno"   maxlength="10"    class="form-control" onkeypress="return valideKey(event);" id="telUno"  placeholder="Escriba teléfono fijo a 10 dígitos"  value="{{old('telUno')}}">
    {!!$errors->first('telUno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 19-->
  <div class="col-md-6 form-group">
    <p> <sup class="cRed">*</sup> Tel. móvil</p>
    <input type="tel" name="telDos"  maxlength="10"   class="form-control" id="telDos" onkeypress="return valideKey(event);" value="{{old('telDos')}}"placeholder="Escriba teléfono móvil a 10 dígitos">
    {!!$errors->first('telDos','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>
</div>






