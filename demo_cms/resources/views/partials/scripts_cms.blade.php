{{-- js --}}



<script src="{{ asset('public/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('public/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('public/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('public/vendor/swiper/swiper-bundle.min.js') }}"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Vendor JQUERY -->
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>


<script src="{{ asset('public/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>

<script type="text/javascript">
    $( document ).ready(function() {
    $('#exampleModalCenter').modal('toggle')
});
</script>
<script type="text/javascript">
    $(function () {
    $(".custom-close").on('click', function() {
        $('#exampleModalCenter').modal('hide');
    });
});
</script>

<script>
function activarcasilla(){
if(document.getElementById("terminos").checked==true && document.getElementById("avisos").checked==true){

document.getElementById("myBtn").disabled = false;
}else{
document.getElementById("myBtn").disabled = true;
}
}

</script>

<script type="text/javascript">
    function verificar_telefono() {
    var textotelefono = document.getElementById("tel_uno").value;
    var numerocaracterestextotelefono = textotelefono.replace(" ", "");
    numerocaracterestextotelefono = numerocaracterestextotelefono.length;
          
    if (numerocaracterestextotelefono < 10) {
        alert("El número de teléfono uno debe tener 10 dígitos, no se permite espacios en blanco. Ejemplo: 5511223344");
        document.getElementById("tel_uno").value = "";
    }
}
</script>

<script type="text/javascript">
    function verificar_telefono_dos() {
    var textotelefono = document.getElementById("tel_dos").value;
    var numerocaracterestextotelefono = textotelefono.replace(" ", "");
    numerocaracterestextotelefono = numerocaracterestextotelefono.length;
          
    if (numerocaracterestextotelefono < 10) {
        alert("El número de teléfono dos debe tener 10 dígitos, no se permite espacios en blanco. Ejemplo: 5511223344");
        document.getElementById("tel_dos").value = "";
    }
}
</script>

<script type="text/javascript">
    function validarCorreo(elemento){
      var correo = document.getElementById('email_uno').value;
      arroba = correo.indexOf("@");
      punto =  correo.lastIndexOf(".");
      extension= correo.split(".")[1];
      
      if (arroba < 1 || ( punto - arroba < 2 )||correo===""){
         alert("El correo es invalido");
          document.getElementById("email_uno").value = "";
      }else{
        if(extension.length >3){
          alert("El correo es invalido");
          document.getElementById("email_uno").value = "";
          return;
        }
      //  alert("correo valido");
      }

            if (document.formulario.email.value == document.formulario.email_dos.value){
          
   }else{
          alert('Los campos de correo electrónico son obligatorios y deben coincidir');

   }

 }
</script>

<script type="text/javascript">
    function validarCorreo_dos(elemento){
      var correo = document.getElementById('email_dos').value;
      arroba = correo.indexOf("@");
      punto =  correo.lastIndexOf(".");
      extension= correo.split(".")[1];
      
      if (arroba < 1 || ( punto - arroba < 2 )||correo===""){
         alert("El correo es invalido");
         document.getElementById("email_dos").value = "";
      }else{
        if(extension.length >3){
          alert("El correo es invalido");
          document.getElementById("email_dos").value = "";
          return;
        }
       // alert("correo valido");
      }

        if (document.formulario.email.value == document.formulario.email_dos.value){
          
   }else{
          alert('Los campos de correo electrónico son obligatorios y deben coincidir');
          document.getElementById("email_dos").value = "";
   }

 }
</script>

<script type="text/javascript">









	function valideKey(evt){
    
    // code is the decimal ASCII representation of the pressed key.
    var code = (evt.which) ? evt.which : evt.keyCode;
    
    if(code==8) { // backspace.
      return true;
    } else if(code>=48 && code<=57) { // is a number.
      return true;
    } else{ // other keys.
      return false;
    }
}


//valida texto lengua mexicana


$('#texto_lm').on("change",function () {
    //var id=$(this).attr('id');

    id="#texto_lm";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.pdf'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>5000) {
                    alert("El archivo excede los 5Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});


//valida texto español


$('#texto_es').on("change",function () {
    //var id=$(this).attr('id');

    id="#texto_es";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.pdf'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>5000) {
                    alert("El archivo excede los 5Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});


// valida identificacion vigente


$('#ident_vi').on("change",function () {
    //var id=$(this).attr('id');

    id="#ident_vi";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.pdf'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>5000) {
                    alert("El archivo excede los 5Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});



// valida hoja_datos


$('#hoja_datos').on("change",function () {
    //var id=$(this).attr('id');

    id="#hoja_datos";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['pdf'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.pdf'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>5000) {
                    alert("El archivo excede los 5Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});





// valida mp3


$('#a_mptres').on("change",function () {
    //var id=$(this).attr('id');

    id="#a_mptres";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['mp3'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.mp3'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>5000) {
                    alert("El archivo excede los 5Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});


//valida wav

$('#a_wav').on("change",function () {
    //var id=$(this).attr('id');

    id="#a_wav";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['wav'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.wav'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>5000) {
                    alert("El archivo excede los 5Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});




//valida wav

$('#a_jpg').on("change",function () {
    //var id=$(this).attr('id');

    id="#a_wav";
    console.log(id);
    var archivo=$(id).val();

    var fileExtension = ['jpg'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Solo se permiten archivos '.jpg'!");
        this.value = '';
        $(id).focus();
        return false;
        //$('#spanFileName').html("Solo se aceptan archivos '.pdf'!");
    }
    else {
        //$('#spanFileName').html(this.value);


        //do what ever you want
        if (this.files.length > 0) {
            $.each(this.files, function (index, value) {
                var tamanio=Math.round((value.size / 1024));
                if(tamanio>5000) {
                    alert("El archivo excede los 5Mb, por favor verifique.");
                    $(id).val('');
                    $(id).value = '';
                    $(id).focus();
                    return false;
                }
            })
        }
    }
});




</script>

<script type="text/javascript">
    (function(){var backTop=document.getElementsByClassName('js-cd-top')[0],offset=300,offsetOpacity=1200,scrollDuration=700,scrolling=false;if(backTop){window.addEventListener("scroll",function(event){if(!scrolling){scrolling=true;(!window.requestAnimationFrame)?setTimeout(checkBackToTop,250):window.requestAnimationFrame(checkBackToTop);}});backTop.addEventListener('click',function(event){event.preventDefault();(!window.requestAnimationFrame)?window.scrollTo(0,0):Util.scrollTo(0,scrollDuration);});}
function checkBackToTop(){var windowTop=window.scrollY||document.documentElement.scrollTop;(windowTop>offset)?Util.addClass(backTop,'cd-top--is-visible'):Util.removeClass(backTop,'cd-top--is-visible cd-top--fade-out');(windowTop>offsetOpacity)&&Util.addClass(backTop,'cd-top--fade-out');scrolling=false;}})();
</script>

<script type="text/javascript">
function efectos(){
		
		//console.log(aSeccion);
		if(aSeccion != "slider"){
			altSeccion = $("#"+aSeccion).offset().top;
			altMenu = $("header").outerHeight();
			altFinal = altSeccion - altMenu;
			//console.log("altura"+altMenu);
			$('html,body').animate({ scrollTop: altFinal}, 'slow');
			
		}
		
		$("#to_the_top").on("click",function(e){
			e.preventDefault();
			$('html,body').animate({ scrollTop: 0 }, 'slow');
		});
		
		$("#menu a").on("click",function(e){
			e.preventDefault();
			if($(this).attr('href') == "#red"){
					$('html,body').animate({ scrollTop: 0}, 'slow');
			}
			else{
				
				nomSeccion = $(this).attr('href');
				altSeccion = $(nomSeccion).offset().top;
				altMenu = $("header").outerHeight();
				altFinal = altSeccion - altMenu;
				//console.log("altura"+altMenu);
				$('html,body').animate({ scrollTop: altFinal}, 'slow');
			}
		});
		$(".slicknav_menu").prepend("<img src='images/logo.png' width='98%' />");
		
		
		
		
	}
	function detectarScroll()
	{
		var scrollVertical = $(window).scrollTop();
	
		return (scrollVertical>300)?$("#to_the_top").fadeIn():$("#to_the_top").fadeOut();
	}
	$(window).on("scroll",detectarScroll);
	$(document).on("ready", efectos);
	
</script>


