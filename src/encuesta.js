/*function cambiar_valor (){
    if ($(".with-gap").val() == "off"){
        $(".with-gap").attr("value", "on");
    }
}

function validacion () {
    var respuesta = false;
    var radio = $("#vez1").val();
    var checkbox = false;
    
    
    if(radio == "on") respuesta = true;
    


    return respuesta;
}*/

function validacion(){
    var sex_select = false;
    var edad_select = false;
    var nota_select = false;
    
    $("#select_edad option:selected").each(function(){
        if($(this).attr("class") == "default_value"){
            console.log("tiene el valor por defecto");
        }
        else{
            sex_select = true;
            console.log("Hay uno seleccionado");
            console.log($("#select_edad option:selected"));
        }
    });
    
    
    $("#select_sexo option:selected").each(function(){
        if($(this).attr("class") == "default_value"){
            console.log("tiene el valor por defecto");
        }
        else{
            edad_select = true;
            console.log("Hay uno seleccionado");
            console.log($("#select_sexo option:selected"));
        }
    });
    
    
    $("#select_nota option:selected").each(function(){
        if($(this).attr("class") == "default_value"){
            console.log("tiene el valor por defecto");
        }
        else{
            nota_select = true;
            console.log("Hay uno seleccionado");
            console.log($("#select_nota option:selected"));
        }
    });
    
    
    if((sex_select==false) || (edad_select==false) || (nota_select==false)){
        console.log("FALSE");
        return false;
    }
    else{
        console.log("TRUE");
        return true;
    }
    
}