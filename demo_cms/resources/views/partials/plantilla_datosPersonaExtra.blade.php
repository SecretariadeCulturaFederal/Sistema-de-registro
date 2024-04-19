<h4>Datos del representante / Datos de la persona acompañante / Datos del tutor </h4>
<h5>Datos personales</h5>
<div class="row gy-2 gx-md-3 mt-5">
  <!--Pregunta 1-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Nombre(s)</p>
    <input type="text" name="pe_nombres"  class="form-control"  id="pe_nombres" placeholder="Nombre(s)" value="{{old('pe_nombres')}}">
    {!!$errors->first('pe_nombres','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 2-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Apellido paterno </p>
    <input type="text" name="pe_aPaterno"  class="form-control"  id="pe_aPaterno" placeholder="Primer apellido" value="{{old('pe_aPaterno')}}">
    {!!$errors->first('pe_aPaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 3-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Apellido materno</p>
    <input type="text" name="pe_aMaterno" class="form-control"  id="pe_aMaterno" placeholder="Segundo apellido" value="{{old('pe_aMaterno')}}">
    {!!$errors->first('pe_aMaterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 4-->
	<div class="col-md-4 form-group">
		<label> <sup class="cRed">*</sup> Nacionalidad</label>
		<select class="form-control" name="pe_idNacionalidad" id="pe_idNacionalidad">
		<option value="" selected hidden>Seleccione una nacionalidad</option>
		    @foreach($nacionalidades as $n )
		      @if($n->id==old('pe_idNacionalidad') || $n->id==$registroPersonaExtra->pe_idNacionalidad)
		        <option selected value="{{$n->id}}">{{$n->gentilicio_nac}}</option>
		      @else
		        <option value="{{$n->id}}">{{$n->gentilicio_nac}}</option>
		      @endif
		    @endforeach
		</select>
		{!!$errors->first('pe_idNacionalidad','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

  <!--Pregunta 5-->
	<div class="col-md-4 form-group">
		<label> <sup class="cRed">*</sup> CURP</label>
		<input type="text" name="pe_curp" id="pe_curp" class="form-control" value="{{old('pe_curp', $registroPersonaExtra->pe_curp)}}">
		{!!$errors->first('pe_curp','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
	</div>

  <!--Pregunta 6-->
  <div class="col-md-4 form-group">
  <p> <sup class="cRed">*</sup> Género</p>
    <select class="form-control" name="pe_genero" id="pe_genero">
		<option value="" selected hidden>Seleccione una opción</option>
		    @foreach($generos as $g )
		      @if($g->id==old('pe_genero') || $g->id==$registroPersonaExtra->pe_genero)
		        <option selected value="{{$g->id}}">{{$g->genero}}</option>
		      @else
		        <option value="{{$g->id}}">{{$g->genero}}</option>
		      @endif
		    @endforeach
		</select>
     {!!$errors->first('pe_genero','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 7-->
  <div class="col-md-4 form-group">
    <p> <sup class="cRed">*</sup> Seudónimo</p>
    <input type="text" class="form-control" name="pe_seudonimo" required id="pe_seudonimo" placeholder="Seudónimo" value="{{old('pe_seudonimo')}}">
    {!!$errors->first('pe_seudonimo','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

<h5>Datos de contacto</h5>
<!--Pregunta 8-->
  <div class="col-md-6 form-group">
    <p><sup class="cRed">*</sup> Correo electrónico</p>
    <input type="email" name="pe_email" required   class="form-control" id="pe_email" placeholder="Escriba correo electrónico"     value="{{old('pe_email')}}" >
    {!!$errors->first('pe_email','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}                  
  </div>

  <!--Pregunta 9-->
  <div class="col-md-6 form-group">
    <p> <sup class="cRed">*</sup> Confirmar correo electrónico</p>
    <input type="email" name="pe_emailVerf" required  class="form-control" id="pe_emailVerf"   onchange="emailCheck()"  placeholder="Confirme correo electrónico" value="{{old('pe_emailVerf')}}" >
    {!!$errors->first('pe_emailVerf','<FONT COLOR="red"><strong>:message</strong></FONT>')!!} 
    <p id="demo"></p>
  </div>

  <!--Pregunta 10-->
  <div class="col-md-6 form-group">
    <p><sup class="cRed">*</sup> Tel. fijo</p>
    <input type="tel" name="pe_telUno"   maxlength="10" required   class="form-control" onkeypress="return valideKey(event);" id="pe_telUno"  placeholder="Escriba teléfono fijo a 10 dígitos"  value="{{old('pe_telUno')}}">
    {!!$errors->first('pe_telUno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <!--Pregunta 11-->
  <div class="col-md-6 form-group">
    <p> <sup class="cRed">*</sup> Tel. móvil</p>
    <input type="tel" name="pe_telDos"  maxlength="10" required  class="form-control" id="pe_telDos" onkeypress="return valideKey(event);" value="{{old('pe_telDos')}}"placeholder="Escriba teléfono móvil a 10 dígitos">
    {!!$errors->first('pe_telDos','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>

  <h5>Con respecto al proyecto / obra / organización</h5>
  <!--Pregunta 12-->
  <div class="col-md-6 form-group">
    <p> <sup class="cRed">*</sup> Semblanza</p>
    <input type="text" name="pe_semblanza"  class="form-control"  id="pe_semblanza" placeholder="Semblanza" value="{{old('pe_semblanza')}}">
    {!!$errors->first('a_paterno','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
  </div>
  

</div>

