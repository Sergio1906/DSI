function validacion(){
    var sex_select = false;
    var edad_select = false;
    var nota_select = false;
    var event_checkbox = false;
    var frec_radiob = false;
    
    $("#select_edad option:selected").each(function(){
        if($(this).attr("class") == "default_value"){
            if($("#div_edad_id p").length == 0){  //para que no aparezca el mensaje de error más de una vez
                $("#select_edad").before("<p class=\"error_class\">Por favor, introduzca una edad</p>");
            }
        }
        else{
            $("#div_edad_id .error_class").remove();
            edad_select = true;
        }
    });

    $("#select_sexo option:selected").each(function(){
        if($(this).attr("class") == "default_value"){
            if($("#div_sexo_id p").length == 0){  //para que no aparezca el mensaje de error más de una vez
                $("#select_sexo").before("<p class=\"error_class\">Por favor, introduzca un sexo válido</p>");
            }
        }
        else{
            $("#div_sexo_id .error_class").remove();
            sex_select = true;
        }
    });
    
    $("#select_nota option:selected").each(function(){
        if($(this).attr("class") == "default_value"){
            if($("#div_nota_id p").length == 0){  //para que no aparezca el mensaje de error más de una vez
                $("#select_nota").before("<p class=\"error_class\">Por favor, introduzca una nota válido</p>");
            }
        }
        else{
            $("#div_nota_id .error_class").remove();
            nota_select = true;
        }
    });
    
    var atLeastOneIsChecked = $('input[name="frecuencia"]:checked').length ;
    if(atLeastOneIsChecked > 0){
        $("#div_event_id .error_class").remove();
        event_checkbox = true;
    }
    else{
        if($("#div_event_id p").length == 5){  //para que no aparezca el mensaje de error más de una vez
            $("#event_label_id").after("<br/><p class=\"error_class\">Por favor, seleccione al menos una opción</p>");
        }
    }

    if (!$('input[name="group1"]:checked').val()) {
        if($("#div_frec_id p").length == 3){  //para que no aparezca el mensaje de error más de una vez
            $("#frec_label_id").after("<br/><p class=\"error_class\">Por favor, seleccione al menos una opción</p>");
        }
    }
    else {
        $("#div_frec_id .error_class").remove();
        frec_radiob = true;
    }

    if((sex_select==false) || (edad_select==false) || (nota_select==false) || (event_checkbox==false) || (frec_radiob==false)){
        return false;
    }
    else{
        return true;
    }
    
}