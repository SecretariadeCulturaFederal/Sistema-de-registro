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

<body class="home">
<main id="main">
    <header class="container-fluid">
      <div class="row">
      <div class="col-md-5 logo-ci"><img src="{{ asset('public/img/logo-ejemplo.png') }}" alt=""></div>
			<div class="col-md-7 logo-bienal"><img src="{{ asset('public/img/logo-ejemplo.png') }}" alt=""></div>
    </header> 

    @include('partials.navBar_plantilla')
   

    <div class="bg-fff cont-m5">
      <!-- Presentación de la convocatoria-->
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Convocatoria</h2>
              <div class="col-md-10 offset-md-2">
                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <p class="tt-verde">NOMBRE DEL EVENTO</p>
                <p style="text-align: justify;"> Descripción del evento: "Este evento es una celebración anual que destaca y promueve la excelencia en [campo o tema]. 
                  A través de esta exhibición, se exploran las últimas tendencias, el desarrollo y la creatividad en [campo o tema] a nivel 
                  [nacional/internacional/regional]. También sirve como una plataforma para reconocer y premiar a los líderes y contribuyentes destacados en esta área.
                  El evento es una oportunidad única para aprender, conectarse y compartir experiencias con profesionales y entusiastas de [campo o tema]. 
                  Durante [número de días/semanas], los asistentes pueden disfrutar de conferencias inspiradoras, talleres interactivos y una variedad de actividades relacionadas con [campo o tema].
                </p>                        
              </div>
          </div><!--?-->
          <div class="col-md-6 foto"><img src="{{ asset('public/img/foto-02.jpg') }}" alt=""></div>
        </div>
      </div> 
      
      <!--Bases de la convocatoria-->
      <div class="bases">
        <div class="container">
<!--====================== INICIO BASES SECTION ======================-->
          <div class="row">
            <div class="col-md-12 pt-5">
              <h2>Bases</h2>
            </div>

            <div class="col-md-8">
              <ol>
                <li>EJEMPLO: Podrán participar personas interesadas en [campo o categoría], sin importar su trayectoria o nacionalidad.</li>
              </ol>
              <ol start="2">
                <li>No podrán participar:
                  <ol>
                    <li>EJEMPLO: Personas empleadas en cualquier unidad administrativa relacionada al evento.</li>
                    <li>EJEMPLO: Parientes en primer grado de las personas que forman parte del jurado.</li>
                  </ol>
                </li>
              </ol>

              <h3>SECCION 1 DE BASES</h3>
              <ol start="3">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
                  <ol>
                     <li> Lorem ipsum dolor sit amet</li>
                      <li> Lorem ipsum dolor sit amet</li>
                  </ol>
                </li>
              </ol>
              <ol start="4">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit
                  <ol>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                         exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>
                    <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                         exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>
                    <li>Se regir&aacute; por el <a target="_blank" href="{{ asset('public/anexos/codigo_etica_ejemplo.pdf') }}"> C&oacute;digo de &Eacute;tica y Procedimientos</a>, publicado en: <a
                                        href="#">sitioweb.com.mx</a>.
                    </li>                                
                  </ol>
                </li>
              </ol>                     

              <h3>SECCIÓN 2 DE BASES</h3>
              <ol start="5">
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore
                  <ol>
                    <li><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit</strong>
                                , sed do eiusmod tempor incididunt ut labore
                      <ul>
                        <li> Lorem ipsum</li>
                        <li> Lorem ipsum</li>
                      </ul>
                    </li>
                    <li><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit</strong>
                                , sed do eiusmod tempor incididunt ut labore
                      <ul>
                        <li> Lorem ipsum</li>
                        <li> Lorem ipsum</li>
                      </ul>
                    </li>
                  </ol>
                </li>
              </ol>

              <ol start="6">.
                <li>El resultado de la selección de obras que formarán parte de la exhibición será anunciado 
                    <strong>en la fecha [FECHA] </strong>, a través del sitio web <a
                    href="#">sitioweb.com.mx</a>, y las redes sociales del [NOMBRE DE LA ORGANIZACIÓN O EVENTO]. 
                    Las personas cuyas obras sean seleccionadas también recibirán una notificación por correo electrónico.
                </li>
              </ol>

              <h3>SECCIÓN 3 DE BASES</h3>
                <ol start="7">
                  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                      exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>
                </ol>
                <ol start="8">
                  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                      incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud 
                      exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </li>
                </ol>                   
            </div>
<!--====================== FIN BASES SECTION ======================-->
            
<!--====================== INICIO CAJA INFORMTIVA SECTION ======================-->
            <div class="col-md-4">
              <div class="fechas-importantes bg-morado ">
                <h4>FECHAS IMPORTANTES [EJEMPLO]</h4>
                  <p><strong>Apertura de la convocatoria:</strong>
                     <br> 8 de octubre de 2025.
                  </p>
                  <p><strong>Periodo de registro: </strong>
                     <br> 15 de octubre al 3 de noviembre de 2025.
                  </p>
                  <p><strong>Publicación de resultados: </strong>
                      <br>15 de diciembre de 2025.
                  </p>
                  <p><strong>Anuncio de la premiación: </strong>
                      <br> 20 de enero de 2026.
                  </p>

                  <h4 class="mt-5">INFORMES</h4>
                    <a href="#">sitioweb.com.mx</a><br>
                    <a href="mailto:correoelectronico@ejemplo.com">correoelectronico@ejemplo.com</a>

            </div>
                    <div class="col-12 botonera bt-vertical"><a target="_blank" href="{{ asset('public/anexos/convocatoria_ejemplo.pdf') }}"><i
                                class="fas fa-file-download"></i> Descargar la Convocatoria</a> </div>
<!--====================== FIN CAJA INFORMTIVA SECTION ======================-->        
            </div>
          </div>


            
        </div> 
      </div>
    </div>
  </main>
  
  
  



  <a href="#" id="to_the_top" style="display: inline;"></a>

   @include('partials.scripts')
</body>

</html>





