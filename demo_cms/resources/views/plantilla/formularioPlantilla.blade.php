<?php

ini_set('display_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);
?>

<!doctype html>
<html lang="en">

<head>
    <!--  meta tags -->@include('partials.head_plantilla')
    <!-- Personalizar el título del sitio -->
    <title> Título del Sitio</title>
</head>


{{--MENÚ SECUNDARIO--}}

<body>
    <header class="container-fluid">
      <div class="row">
      <div class="col-md-5 logo-ci"><img src="{{ asset('public/img/logo-ejemplo.png') }}" alt=""></div>
			<div class="col-md-7 logo-bienal"><img src="{{ asset('public/img/logo-ejemplo.png') }}" alt=""></div>
    </header>  

    @include('partials.navBar_plantilla')


  {{--Titulo principal del sitio web --}}
  <section id="hero" class="d-flex align-items-center">
    <div class="container-fluid"> <!--Le indicamos a Bootstrap que la fila debe ocupar todo el ancho de su contenedo -->      
      <div class="position-relative aos-init aos-animate text-center" data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
          <div class="col-xl-7 col-lg-9 col-sm-8 col-xs-9 text-center pad">
            <h1>Título del sitio/convocatoria/evento</h1>
          </div>
        </div>
      </div>
    </div>
  </section>


  {{-- Formulario de registro --}}
  <main id="main">
    <!-- ======= Convocatoria texto Section ======= -->
    <section id="convocatoria" class="convocatoria">
      <div class="container" data-aos="fade-up">
        <div class="row content">
          <div>
           <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
              <div class="section-title">
                <p>Fecha del evento/fecha de recepcion de solicitudes </br>
                Dirección del evento (si es que hay)</p>
                
                <h2>FICHA DE REGISTRO</h2>
                <strong style="font-size: 20px; color:#124265;"></strong>
                <p class="anuncio"></p>
              </div>

              <div class="container" data-aos="fade-up">            

                <div class="row mt-5">
                  <div class="col-lg-12">
                    <div class="info">
                      <div class="address">
                        <h4>Datos de la persona participante</h4>
                        <p>* Estos campos son obligatorios</p>
                      </div>
                    </div>
                  </div>   

                  <!-- ======= Formuñlaro Section ======= -->
                  <div class="col-lg-12 mt-5 mb-5 mt-lg-0">
                    <form id="registroForm" role="form" action="{{route('p_n.store')}}" method="post" enctype="multipart/form-data" name="formulario">
                      @csrf                      
                        @include('partials.plantilla_datosPersonales')
                        @include('partials.plantilla_datosPersonaExtra')  
                        @include('partials.plantilla_datosProyecto')                     
                        @include('partials.plantilla_archivos')
                        @include('partials.plantilla_avisoPrivacidad')
                      <div class="text-center col-12">
                      <input type="submit" id="myBtn" class="btn btn-learn-more btn-lg" value="Enviar">
                      </div>                     
                    </form>
                  </div>
                  <!-- ======= Fin Formuñlaro Section ======= -->

                </div>
              </div>
              
            </section>
            <!-- ======= End Contact Section ======= -->
          </div>
        </div>
      </div>
    </section>
    <!-- ======= End Convocatoria texto Section ======= -->
  </main>






  <!-- ======= Pop Up Section ======= -->
  <!--
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <p>Ejemplo de Pop Up</br>
          <strong>ejempo</br> de pop-up</strong> </br> </p>
            <div class="convocatoria col-12 ">
              <div class="content text-center">
                <a href="#" class="btn btn-learn-more btn-lg">ejemplo de pop-up</a>
              </div>
            </div>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div> 
  -->
  <!-- ======= Fin Pop Up Section ======= -->





  <a href="#" id="to_the_top" style="display: inline;"></a>

   @include('partials.scripts')
   
   
  <style>
    .cRed {
      color: #FF0000;
      font-size: 14px;
      top: -.5rem;
    }
  </style>


</body>

</html>


