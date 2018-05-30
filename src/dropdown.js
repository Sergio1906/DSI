
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
});



$('span .carousel-item').click(function(){
    console.log("Dentro de la funcion focus");
    var new_url = "/public_html/src/PHP/Crear_evento.php?nom=" + $(this).attr("src");
    window.location.replace(new_url);
});


function buscar() {
  var textoBusqueda = $("#search").val();
  console.log(textoBusqueda);
                
  if (textoBusqueda != "") {
    $.post("./src/PHP/buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
      console.log(mensaje);
                        
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
    //estado_ = $("#estado").val();
    //console.log(estado_);
    
    $.post("./src/PHP/Filtro.php", {valorBusqueda: estado}, function(mensaje) {
      //console.log(estado_);
      //console.log(mensaje);
      console.log("hola anaaa");
      console.log(mensaje);
      $("body").html("HOLA");
     });
      
     //console.log("adios");
}

