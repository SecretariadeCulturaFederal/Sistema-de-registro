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
          <div class="col-lg-12">
            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
              <div class="section-title">
                <p>Fecha del evento/fecha de recepcion de solicitudes </br>
                  Dirección del evento (si es que hay)</p>
                <h2>FICHA DE REGISTRO</h2>
                <strong style="font-size: 20px; color:#124265;">Información adicional.Cupo limitado (máximo 110 personas)</strong>
                <p class="anuncio">Lugares disponibles: <span>0</span></p>

              </div>

              <div class="container" data-aos="fade-up">
                <div class="row mt-5">
                  <div class="col-lg-12">
                    <div class="info">
                      <div class="address">
                        
                      </div>
                    </div>
                  </div>



                  <!-- ======= Formulario Section ======= -->

                    <form id="registroForm" role="form" action="{{route('p_n.store')}}" method="post" enctype="multipart/form-data" name="formulario">
                      @csrf
                      <div class="container">
<div class="accordion" id="accordionExample">
<div class="steps">
    <progress id="progress" value=0 max=100 ></progress>
    <div class="step-item">
        <button class="step-button text-center" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            1
        </button>
        <div class="step-title">
            Datos personales
        </div>
    </div>
    <div class="step-item">
        <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            2
        </button>
        <div class="step-title">
            Datos persona extra
        </div>
    </div>
    <div class="step-item">
        <button class="step-button text-center collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            3
        </button>
        <div class="step-title">
            Proyecto
        </div>
    </div>
</div>

<div class="card">
    <div  id="headingOne">
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
        data-bs-parent="#accordionExample">
        <div class="card-body">
        @include('partials.datosPersonales')  
                     
        </div>
    </div>
</div>
<div class="card">
    <div  id="headingTwo">

    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="card-body">
        @include('partials.datosPersonaExtra')  
                     
        </div>
    </div>
</div>
<div class="card">
    <div  id="headingThree">

    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
        data-bs-parent="#accordionExample">
        <div class="card-body">
        @include('partials.datosProyecto') 
        @include('partials.archivos')
        </div>
    </div>
</div>
</div>
</div>


                    


                      <div class="text-center col-12">
                        <button class="btn-learn-more" type="submit">Enviar</button>
                        @if($total==$limite)
                        @else
                          <input type="submit" id="myBtn" class="btn btn-learn-more btn-lg" value="Enviar">
                        @endif
                      </div>
                    </form>
                  
                  <!-- ======= Fin Formulario Section ======= -->
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



  <script>
     //DOM Elements
const circles = document.querySelectorAll(".circle"),
  progressBar = document.querySelector(".indicator"),
  buttons = document.querySelectorAll("button");

let currentStep = 1;

// function that updates the current step and updates the DOM
const updateSteps = (e) => {
  // update current step based on the button clicked
  currentStep = e.target.id === "next" ? ++currentStep : --currentStep;

  // loop through all circles and add/remove "active" class based on their index and current step
  circles.forEach((circle, index) => {
    circle.classList[`${index < currentStep ? "add" : "remove"}`]("active");
  });

  // update progress bar width based on current step
  progressBar.style.width = `${((currentStep - 1) / (circles.length - 1)) * 100}%`;

  // check if current step is last step or first step and disable corresponding buttons
  if (currentStep === circles.length) {
    buttons[1].disabled = true;
  } else if (currentStep === 1) {
    buttons[0].disabled = true;
  } else {
    buttons.forEach((button) => (button.disabled = false));
  }
};

// add click event listeners to all buttons
buttons.forEach((button) => {
  button.addEventListener("click", updateSteps);
});
  </script>





<script>
  // Función para mostrar una sección específica
  function showSection(sectionId) {
    const sections = document.querySelectorAll('.form-section');
    sections.forEach((section) => {
      section.classList.remove('active');
    });
    const currentSection = document.getElementById(sectionId);
    currentSection.classList.add('active');
  }

  // Listener para los botones "Siguiente" y "Anterior"
  document.querySelectorAll('.btn-next').forEach((button) => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const nextSection = button.getAttribute('data-next');
      showSection(nextSection);
    });
  });

  document.querySelectorAll('.btn-prev').forEach((button) => {
    button.addEventListener('click', (e) => {
      e.preventDefault();
      const prevSection = button.getAttribute('data-prev');
      showSection(prevSection);
    });
  });

  // Mostrar la primera sección al cargar la página
  showSection('datosPersonales');
</script>

<script>
  const menuItems = document.querySelectorAll('.wizardbar-i');
  const sections = document.querySelectorAll('.form-section');

  menuItems.forEach((item) => {
    item.addEventListener('click', () => {
      const sectionId = item.getAttribute('data-section');
      showSection(sectionId);
    });
  });

  function highlightActiveSection() {
    sections.forEach((section, index) => {
      if (section.classList.contains('active')) {
        menuItems[index].classList.add('active');
      } else {
        menuItems[index].classList.remove('active');
      }
    });
  }

  // Resaltar la sección activa al cargar la página
  highlightActiveSection();
</script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<!-- Bootstrap 5 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<!-- Stepper JavaScript -->
<script>
const stepButtons = document.querySelectorAll('.step-button');
const progress = document.querySelector('#progress');

Array.from(stepButtons).forEach((button,index) => {
    button.addEventListener('click', () => {
        progress.setAttribute('value', index * 100 /(stepButtons.length - 1) );//there are 3 buttons. 2 spaces.

        stepButtons.forEach((item, secindex)=>{
            if(index > secindex){
                item.classList.add('done');
            }
            if(index < secindex){
                item.classList.remove('done');
            }
        })
    })
})
</script>

<script>
 
const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

nextBtnFirst.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
nextBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
nextBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-75%";
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});
submitBtn.addEventListener("click", function(){
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
  setTimeout(function(){
    alert("Your Form Successfully Signed up");
    location.reload();
  },800);
});

prevBtnSec.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFourth.addEventListener("click", function(event){
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
  </script>



<style>
  .steps {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    position: relative;
}
.step-button {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    border: none;
    background-color: #fff;
    transition: .4s;
}
.step-button[aria-expanded="true"] {
    width: 60px;
    height: 60px;
    background-color: gray;
    color: #fff;
}
.done {
    background-color: #DB2021;
    color: #fff;
}
.step-item {
    z-index: 10;
    text-align: center;
}
#progress {
  -webkit-appearance:none;
    position: absolute;
    width: 95%;
    z-index: 5;
    height: 10px;
    margin-left: 18px;
    margin-bottom: 18px;
}
/* to customize progress bar */
#progress::-webkit-progress-value {
    background-color: #DB2021;
    transition: .5s ease;
}
#progress::-webkit-progress-bar {
    background-color: #fff;

}
</style>




</body>

</html>


