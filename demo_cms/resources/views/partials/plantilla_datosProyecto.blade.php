<h4>Datos del proyecto|organización | obra</h4>
<h5>Información referente</h5>
<div class="row gy-2 gx-md-3 mt-5">
  <!--Pregunta 1-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Nombre del proyecto | Nombre de la iniciativa | Nombre de la obra | Nombre de la organización </p>
    <input type="text" name="nombreProyecto"  class="form-control"  id="nombreProyecto" placeholder="Nombre del proyecto" value="{{old('nombreProyecto')}}">
    {!!$errors->first('nombreProyecto','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 2-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Forma de participación</p>
    <input type="text" name="participacion"  class="form-control"  id="participacion" placeholder="Forma de participación" value="{{old('participacion')}}">
    {!!$errors->first('participacion','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 3-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Número de integrantes</p>
    <input type="text" name="integrantes"  class="form-control"  id="integrantes" placeholder="Ingrese el número de integrantes" value="{{old('integrantes')}}">
    {!!$errors->first('integrantes','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 4-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Categoría de participación | Áreas en las que se desarrolla | Ramas en las que se desarrollan</p>
    <select name="catProyecto" required  class="form-control" >
      <option value="" selected disabled>Seleccione categoría</option>
        @foreach($categoriaEjemplo1 as $item)
          @if($item->id==old('catProyecto') || $item->id==$registroProyecto->catProyecto)
            <option selected value="{{$item->id}}">{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}">{{$item->nombre}}</option>
          @endif
        @endforeach
      </select>
    {!!$errors->first('catProyecto','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 5-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> Etapa del proyecto</p>
      <select name="catEtapa" required  class="form-control" >
      <option value="" selected disabled>Seleccione etapa</option>
        @foreach($categoriaEjemplo2 as $item)
          @if($item->id==old('catEtapa') || $item->id==$registroProyecto->catEtapa)
            <option selected value="{{$item->id}}">{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}">{{$item->nombre}}</option>
          @endif
        @endforeach
      </select>
      {!!$errors->first('catEtapa','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 6-->
  <div class="col-md-4 form-group">
		<label> <sup class="cRed">*</sup> Breve semblanza | descripción | propuesta | justificación | motivo</label>
		<textarea name="semblanza" id="semblanza" class="form-control" maxlength="3500">{{old('semblanza')}}</textarea>		
		Máximo 1000 caracteres. <span id="rchars">1000</span> Caracter(es) restante(s)
    {!!$errors->first('semblanza','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

  <!--Pregunta 7-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup>Duración del proyecto</p>
      <select name="catDuracion" required  class="form-control" >
      <option value="" selected disabled>Seleccione duracion</option>
        @foreach($categoriaEjemplo3 as $item)
          @if($item->id==old('catDuracion') || $item->id==$registroProyecto->catDuracion)
            <option selected value="{{$item->id}}">{{$item->nombre}}</option>
          @else
            <option value="{{$item->id}}">{{$item->nombre}}</option>
          @endif
        @endforeach
      </select>
  </div> 
  
  <!--Pregunta 8-->
  <div class="col-md-4 form-group">
    <label> <sup class="cRed">*</sup> Justificación | Descripción | motivo </label>
    <textarea  name="justificacion_1"    id="justificacion_1"  class="form-control" maxlength="3500"  >{{old('justificacion_1')}}</textarea>
    Máximo 3500 caracteres. <span id="rchars">3500</span> Caracter(es) restante(s)
    {!!$errors->first('justificacion_1','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <div class="col-md-4 form-group">
    <label> <sup class="cRed">*</sup> Justificación | Descripción | motivo </label>
    <textarea  name="justificacion_2"    id="justificacion_2"  class="form-control" maxlength="1000"  >{{old('justificacion_2')}}</textarea>
    Máximo 1000 caracteres. <span id="rchars">1000</span> Caracter(es) restante(s)
    {!!$errors->first('justificacion_2','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <div class="col-md-4 form-group">
    <label> <sup class="cRed">*</sup> Justificación | Descripción | motivo </label>
    <textarea  name="justificacion_3"    id="justificacion_3"  class="form-control" maxlength="500"  >{{old('justificacion_3')}}</textarea>
    Máximo 500 caracteres. <span id="rchars">500</span> Caracter(es) restante(s)
    {!!$errors->first('justificacion_3','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 9-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Campo adicional</p>
    <input type="text" class="form-control" name="pr_adicional_1" required id="pr_adicional_1" placeholder="placeholder adicional" value="{{old('pr_adicional_1')}}">
    {!!$errors->first('pr_adicional_1','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <h5>Lugar de residencia | Datos de la localidad</h5>

  <!--Pregunta 10-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> Calle</p>                  
    <input type="text"  class="form-control" name="calleResidencia" id="calleResidencia" required  placeholder="Escriba la calle"   value="{{old('calleResidencia')}}" >
    {!!$errors->first('calleResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>
            
  <!--Pregunta 11-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> Número </p>
    <input type="text"  class="form-control" name="numeroResidencia" id="numeroResidencia" required  placeholder="Escriba  número"   value="{{old('numeroResidencia')}}" >
    {!!$errors->first('numeroResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 12-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> C.P.</p>
    <input type="text"   class="form-control" name="cpResidencia" id="cpResidencia" required placeholder="Escriba código postal"  maxlength="5"   onchange="verificar_cp()" value="{{old('cpResidencia')}}" >
    {!!$errors->first('cpResidencia','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

<!-- Pregunta 13 -->
<div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Estado</p>
    <select id="idEstadoProyecto" name="idEstado" required class="form-control" onchange="filtrarMunicipiosProyecto()">
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
    <select id="idMunicipioProyecto" name="idMunicipio" required class="form-control">
        <option value="" selected disabled>Seleccione municipio</option>
        @foreach($municipios as $item)
            @if($item->id == old('idMunicipio') || $item->id == $registroDatosPersonales->idMunicipio)
                <option selected value="{{ $item->id }}" data-id-estado-pro="{{ $item->id_estado }}">{{ $item->nombre }}</option>
            @else
                <option value="{{ $item->id }}" data-id-estado-pro="{{ $item->id_estado }}">{{ $item->nombre }}</option>
            @endif
        @endforeach       
    </select>
</div>


  <!--Pregunta 15-->
  <div class="col-md-4 form-group">
    <p><sup class="cRed">*</sup> Localidad</p>
    <input type="text" class="form-control"  name="localidad" required placeholder="Escriba localidad"   value="{{old('localidad')}}" >
    {!!$errors->first('localidad','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>                     


  
</div>

<script>
    function filtrarMunicipiosProyecto() {
        var idEstadoSeleccionado = document.getElementById('idEstadoProyecto').value;
        var municipioSelect = document.getElementById('idMunicipioProyecto');

        for (var i = 0; i < municipioSelect.options.length; i++) {
            var option = municipioSelect.options[i];
            var idEstadoMunicipio = option.getAttribute('data-id-estado-pro');

            if (idEstadoSeleccionado === '' || idEstadoSeleccionado === idEstadoMunicipio) {
                option.style.display = '';
            } else {
                option.style.display = 'none';
            }
        }
    }
</script>
