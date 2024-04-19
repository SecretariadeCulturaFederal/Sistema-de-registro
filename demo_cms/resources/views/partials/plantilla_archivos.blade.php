<h4>Archivos | anexos</h4>

<div class="row gy-2 gx-md-3 mt-5">
  <!--Pregunta 1-->
  <div class="col-md-6 form-group">

    <div class="card">
      <div class="card-body">
        <p>* Archivo PDF 1</p>
        Subir un archivo en formato .PDF (peso máximo 5 Mb)
        <input type="file" name="pdf_1" id="pdf_1"  required class="form-control" value="{{old('pdf_1', $registroArchivos->pdf_1)}}">
        {!!$errors->first('pdf_1','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
      </div>
     </div>
    </div>
                      
    <!--Pregunta 2-->          
    <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body">     
          <p>* Archivo PDF 2</p>
          Subir un archivo en formato .PDF (peso máximo 5 Mb)
          <input type="file" name="pdf_2" id="pdf_2"  required class="form-control"  value="{{old('pdf_2', $registroArchivos->pdf_2)}}">
          {!!$errors->first('pdf_2','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>    
    </div>

    <!--Pregunta 3-->
    <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body">   
          <p>* Archivo PDF 3</p>
          Subir un archivo en formato .PDF (peso máximo 5 Mb)
          <input type="file" name="pdf_3" id="pdf_3"  required class="form-control"  value="{{old('pdf_3', $registroArchivos->pdf_3)}}">
          {!!$errors->first('pdf_3','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>
    </div>

   <!-- Pregunta 4-->
   <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body">   
          <p>* Archivo PDF 4</p>
          Subir un archivo en formato .PDF (peso máximo 5 Mb)
          <input type="file" name="pdf_4" id="pdf_4" required class="form-control"  value="{{old('pdf_4', $registroArchivos->pdf_4)}}">
          {!!$errors->first('pdf_4','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>
    </div>

    <!-- Pregunta 5-->
    <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body"> 
          <p>* Archivo de imagen 1</p>                   
          Subir un archivo en formato (.PDF, .JPG, .JPEG, .PNG) (peso máximo 5 Mb)
          <input type="file" name="img_1" id="img_1" required    class="form-control"  value="{{old('img_1', $registroArchivos->img_1)}}">
          {!!$errors->first('img_1','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>
    </div>
    
    <!-- Pregunta 6-->
    <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body"> 
          <p>* Archivo de imagen 2</p>                   
          Subir un archivo en formato (.PDF, .JPG, .JPEG, .PNG) (peso máximo 5 Mb)
          <input type="file" name="img_2" id="img_2" required    class="form-control"  value="{{old('img_2', $registroArchivos->img_2)}}">
          {!!$errors->first('img_2','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>
    </div>

    <!-- Pregunta 7-->
    <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body"> 
          <p>* Archivo de imagen 3</p>                   
          Subir un archivo en formato (.PDF, .JPG, .JPEG, .PNG) (peso máximo 5 Mb)
          <input type="file" name="img_3" id="img_3" required    class="form-control"  value="{{old('img_3', $registroArchivos->img_3)}}">
          {!!$errors->first('img_3','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>
    </div>

    <!-- Pregunta 8-->
    <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body"> 
          <p>* Archivo de imagen 4</p>                   
          Subir un archivo en formato (.PDF, .JPG, .JPEG, .PNG) (peso máximo 5 Mb)
          <input type="file" name="img_4" id="img_4" required    class="form-control"  value="{{old('img_4', $registroArchivos->img_4)}}">
          {!!$errors->first('img_4','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>
    </div>

    <!-- Pregunta 9-->
    <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body"> 
          <p>* Archivo 1</p>                   
          Subir un archivo en formato .mp3 (peso máximo de 5 Mb)
          <input type="file" name="archivo_1" id="archivo_1" class="form-control" value="{{old('archivo_1')}}">
          {!!$errors->first('archivo_1','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>
    </div>

    <!-- Pregunta 10-->
    <div class="col-md-6 form-group">
      <div class="card">
        <div class="card-body"> 
          <p>* Archivo 2</p>                   
          Subir un archivo en formato .wav (peso máximo de 5 Mb)
          <input type="file" name="archivo_2" id="archivo_2" class="form-control" value="{{old('archivo_2')}}">
          {!!$errors->first('archivo_2','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
        </div>
      </div>
    </div>




<!--
    <div id="prueba">
      <b>Si cuenta con redes sociales, especifíquelas:</b> <input type="checkbox" id="redes_check">  
    </div>
    <div id="redes_sociales" style="display:none; ">
      <div class="col-md-2 form-group">
        <p>Twitter / X</p>
        <input type="text" class="form-control" name="u_twitter" onChange="valida_url_t();"  id="u_twitter" placeholder="Ingrese link de su perfil"  value="{{old('u_twitter')}}" >
        {!!$errors->first('u_twitter','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
      </div>

      <div class="col-md-2 form-group">
        <p>Facebook</p>
        <input type="text" class="form-control" name="u_facebook" onChange="valida_url_f();" id="u_facebook" placeholder="Ingrese link de su perfil"  value="{{old('u_facebook')}}" >
        {!!$errors->first('u_facebook','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
      </div>

      <div class="col-md-2 form-group">
        <p>Instagram</p>
        <input type="text" class="form-control" name="u_instagram"  onChange="valida_url_i();" id="u_instagram" placeholder="Ingrese link de su perfil"  value="{{old('u_instagram')}}" >
        {!!$errors->first('u_instagram','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
      </div>

      <div class="col-md-2 form-group">
        <p>Tik tok</p>
        <input type="text" class="form-control" name="u_tiktok"  onChange="valida_url_tt();" id="u_tiktok" placeholder="Ingrese link de su perfil"  value="{{old('u_tiktok')}}" >
        {!!$errors->first('u_tiktok','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
      </div>

      <div class="col-md-2 form-group">
        <p>Otra</p>
        <input type="text" class="form-control" name="u_otrared"  onChange="valida_url_o();"  id="u_otrared" placeholder="Ingrese link de su perfil"  value="{{old('u_otrared')}}" >
        {!!$errors->first('u_otrared','<FONT COLOR="red"><strong>:message</strong></FONT>')!!}
      </div>
-->


</div>

