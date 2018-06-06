
$(document).ready(function(){
  $('.datepicker').datepicker();
  $('select').formSelect();
  $('.carousel').carousel();
  M.updateTextFields();
    
  var instance = M.Carousel.init({
    fullWidth: true,
    indicators: true
  });
  
  $('.sidenav').sidenav();
  $("#carta").hide();
  $("#carta_video1").hide();
  $("#carta_video2").hide();

});


  	$("#enviar_form").click(function(){
        $("#carta").show();
    });
 	$("#forgetPass").click(function(){
        $("#carta").show();
    });
    $("#Crear_evento").click(function(){
        $("#carta").show();
    });
    $("#Cambiar_info").click(function(){
        $("#carta").show();
    });
    $("#boton_video1").click(function(){
        $("#carta_video1").show();
    });
    $("#boton_video2").click(function(){
        $("#carta_video2").show();
    });
	$("#carta").click(function(){
        $("#carta").hide();
    });
    $("#carta_video1").click(function(){
        $("#carta_video1").hide();
    });
    $("#carta_video2").click(function(){
        $("#carta_video2").hide();
    });


            $('.div_desplegable').keyup('click', function(key_pressed) {
                if(key_pressed.which == 13 || key_pressed.keyCode == 13){
                    var id_this = "#";
                    id_this += $(this).attr("id");
                    $(id_this).attr('aria-expanded', 'true');
                }
            });
            
            
            $('.div_desplegable').keyup('click', function(key_pressed) {
                if(key_pressed.which == 9| key_pressed.keyCode == 9){
                    var id_this = "#";
                    id_this += $(this).attr("id");
                    $(id_this).attr('aria-expanded', 'false');
                }
            });

            $('.selected').keyup(function(key_pressed){
                var state = $(this).attr('aria-checked').toLowerCase();
                if(key_pressed.which == 13 || key_pressed.keyCode == 13){
                    if (state === 'true') {
                        $(this).attr('aria-checked', 'false');
                    }
                    else {
                        $(this).attr('aria-checked', 'false');
                    }
                }
            });
            
            $('.carousel-item').click(function(){
                if($(this).attr("class") == "carousel-item active"){
                    var aux = $('img', $(this)).attr('src');
                    var arr_aux = aux.split("/");
                    var long = arr_aux.length;
                    var new_url = "https://infoevent.000webhostapp.com/src/PHP/Crear_evento.php?nom=" + arr_aux[long-1];
                    window.location.replace(new_url);
                }
                else{
                    $(this).focus();
                }
                
            });
            
            $('.carousel-item').keyup('click', function(key_pressed) {
                if(key_pressed.which == 37 || key_pressed.keyCode == 37){
                    var elem = $(this);
                    $('.carousel').carousel('prev');
                }
                
                if(key_pressed.which == 39 || key_pressed.keyCode == 39){
                    var elem = $(this);
                    $('.carousel').carousel('next');
                }
            });

$('span .carousel-item').click(function(){
    var new_url = "https://infoevent.000webhostapp.com/src/PHP/Crear_evento.php?nom=" + $(this).attr("src");
    window.location.replace(new_url);
});


$('#last_elem_sidenav').focusout(function() {
    $('#mobile-nav').sidenav('close');
});

function buscar() {
  var textoBusqueda = $("#search").val();
  if (textoBusqueda != "") {
    $.post("https://infoevent.000webhostapp.com/src/PHP/buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
      $("#resultadoBusqueda").html(mensaje);
      $('.carousel').carousel();
      M.updateTextFields();
      var instance = M.Carousel.init({
        fullWidth: true,
        indicators: true
      });
    }); 
  } 
  else { 
    $("#resultadoBusqueda").html('Sin resultados');
	}
}

function filtrar(){
    var estado = "hola";
    $.post("./src/PHP/Filtro.php", {valorBusqueda: estado}, function(mensaje) {
      $("body").html("HOLA");
     });
}

