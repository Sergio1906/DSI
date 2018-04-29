
$(document).ready(function(){
    $('select').formSelect();
    $('.carousel').carousel();
    M.updateTextFields();
    
  var instance = M.Carousel.init({
    fullWidth: true,
    indicators: true
  });

  /*$('.carousel-item').keyup('click', function(key_pressed) {
    console.log("entra");
    if(key_pressed.which == 37 || key_pressed.keyCode == 37){
      var elem = $(this);
      console.log(elem);
      var instance = M.Carousel.getInstance(elem);
      instance.next(1);
      console.log("funcuiona");
            
    }
  });*/
  
  

  
});
 
  
  
     