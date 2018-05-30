<?php


    $string = '<!DOCTYPE html>

<html lang="es">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../design.css">
        <script type="text/javascript" src="../dropdown.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
       
         
        <meta charset="UTF-8">
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Eventgram, eventos">
        <meta name="author" content="Juan Carlos González Pascolo, Sergio del Pino Hernández y Pedro Antonio Lima A.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Eventgram</title>
        
        
    </head>
    
    <body>
        <div class="row">
            <div class="col s12">
                <nav>
                    <div id="color_flama" class="nav-wrapper" >
                        <img src="../../res/icono.png" alt="Logotipo de Eventgram" class="left" height="75px" width="75px">
                        <div class="col s4 push-s2">
                            <form>
                                <div class="input-field">
                                    <input id="search" type="search" required name="barra_busqueda" onKeyUp="buscar();">
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    <i class="material-icons">close</i></input>
                                </div>
                            </form>
                        </div>
                        
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="src/log_in.html">Sign in</a></li>
                            <li><a href="src/sign_up.html">Sign up</a></li>
                            <li><a href="src/ayuda.html">Ayuda</a></li>
                            <li><a href="src/nosotros.html">Nosotros</a></li>
                            <li><a href="src/encuesta.html">Encuesta</a></li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        
        <div class="row" aria-label="Contenido principal">
            <div class="col s10 offset-s1 z-depth-4" id="main">
                <div>
                    <form action="Filtrar.php" method ="POST">
                        <br>
                        <div class="row">
                            <div id="type_div" class="input-field col s2 offset-s1 div_desplegable" tabindex="-1" aria-expanded="false">
                                <i class="material-icons prefix">description</i>

                                <select multiple id="type_select" name = "eventos[]" value="">
                                    <option class="type_option" tabindex="-1" value="MUSICA" aria-checked="false">Música</option>
                                    <option class="type_option" tabindex="-1" value="TEATRO" aria-checked="false" onKeyUp="ch_check(event)">Teatro</option>
                                    <option class="type_option" value="DEPORTE" aria-checked="false" onKeyUp="ch_check(event)">Deporte</option>
                                    <option class="type_option" value="CINE" aria-checked="false" onKeyUp="ch_check(event)">Cine</option>
                                    <option class="type_option" value="PINTURA" aria-checked="false" onKeyUp="ch_check(event)">Pintura</option>
                                </select> 
                                <label for="eventos[]">Tipo de evento</label>

                            </div>
                            
                      
                            
                            <div class="input-field col s2">
                                <i class="material-icons prefix">date_range</i>

                                <input type="text" name="fecha" class="datepicker">                                  
                                <label for="fecha" class="active">Fecha</label>
                            </div>
                            
                      
                            <div id="state_div" class="input-field col s2 div_desplegable" aria-expanded="false">
                                <i class="material-icons prefix">schedule</i>

                                <select id ="estado" name = "estado[]">
                                    <option value="" disabled selected></option>
                                    <option value="PROXIMAMENTE">Proximamente</option>
                                    <option value="DISPONIBLE">Disponible</option>
                                    <option value="FINALIZADO">Finalizado</option>
                                </select>
                                <label for="estado[]">Estado</label>

                            </div>
                            
                      
                            <div class="input-field col s2">
            
                                  
                                  <i class="material-icons prefix">location_on</i>
                                  <input id="Ciudad" type="text" class="validate">
                                  <label for="Ciudad">Ciudad</label>
                            </div>
                            <div class="col s2 input-field center">
                                <button id="filter" class="btn waves-effect waves-light " name="action" type="submit"
                                >Filtrar<i class="material-icons right">search</i></button>
                            </div>
                        </div>
                    </form
                </div>
                <div id="resultadoBusqueda"  class="carousel" aria-live="assertive">';
        
        
        
$servidor="localhost";
$usuario = "id4906591_admin";
$clave = "12345";
$basedatos= "id4906591_eventgram";



$conexion = new mysqli ($servidor,$usuario,$clave,$basedatos);

if($conexion->connect_errno) die("fallo" . $conexion->connect_error);

    $tipo = NULL;
    $fecha = NULL;
    $estado = NULL;
    $ciudad = NULL;
    $consulta = NULL;
    
    if (isset($_POST['eventos'])) {
    $tipo = $_POST['eventos'];
    }
    
    if (isset($_POST['fecha'])) {
    $fecha= $_POST['fecha'];
    }
    
    if (isset($_POST['estado'])) {
    $estado = $_POST['estado'];
    }
    
    if (isset($_POST['ciudad'])) {
    $tipo = $_POST['ciudad'];
    }


    if($tipo != NULL){
        if($consulta != NULL){
            $consulta .= " AND ( Tipo = '$tipo[0]')";
        }
        else{
            $consulta .= "(Tipo = '$tipo[0]')";
        }
    }  
    
    if($fecha != NULL){
        if($consulta != NULL){
            $consulta .= " AND (Fecha = '$fecha')";
        }
        else{
            $consulta .= "(Fecha = '$fecha')";
        }
    } 
    
    if($estado != NULL){
        if($consulta != NULL){
            $consulta .= " AND (Estado = '$estado[0]')";
        }
        else{
            $consulta .= "(Estado = '$estado[0]')";
        }
    } 
    
    if($ciudad != NULL){
        if($consulta != NULL){
            $consulta .= " AND (Ciudad = '$ciudad')";
        }
        else{
            $consulta .= "(Ciudad = '$ciudad')";
        }
    }
    
    if($consulta === NULL)
        $SQL = "select * from Eventos";
    
    else
        $SQL = "select * from Eventos where $consulta";
        

    $Resultado = mysqli_query($conexion,$SQL);
    $mensaje = NULL;
    $contador = NULL;

    while($tupla = mysqli_fetch_array($Resultado)) {
		    
    $ID_EVENTO =  $tupla["ID_Evento"];
    
    $NOMBRE =  $tupla["Nombre"];
    $FOTO =  $tupla["Foto"];
    $DESCRIPCION =  $tupla["Descripcion"];
    $CREADOR =  $tupla["Creador"];
    $TIPO =  $tupla["Tipo"];
    $FECHA =  $tupla["Fecha"];
    $CIUDAD =  $tupla["Ciudad"];
    $ESTADO =  $tupla["Estado"];

    $string.= '<span class="carousel-item" tabindex="0"><img alt="" src="../../res/eventos/'.$FOTO.'"> 
                '.$NOMBRE.' </span>';
                
			$contador = $contador + 1;
		}//Fin while $resultados


$string .='
            </div>
            
            <script>
            $(\'.div_desplegable\').keyup(\'click\', function(key_pressed) {
                if(key_pressed.which == 13 || key_pressed.keyCode == 13){
                    var id_this = "#";
                    id_this += $(this).attr("id");
                    console.log(id_this);
                    $(id_this).attr(\'aria-expanded\', \'true\');
                }
            });
            
            
            
            $(\'.div_desplegable\').keyup(\'click\', function(key_pressed) {
                if(key_pressed.which == 9| key_pressed.keyCode == 9){
                    var id_this = "#";
                    id_this += $(this).attr("id");
                    console.log(id_this);
                    $(id_this).attr(\'aria-expanded\', \'false\');
                }
            });
            
            
            $(\'.selected\').keyup(function(key_pressed){
                console.log("entro en option");
                var state = $(this).attr(\'aria-checked\').toLowerCase();
                if(key_pressed.which == 13 || key_pressed.keyCode == 13){
                    if (state === \'true\') {
                        $(this).attr(\'aria-checked\', \'false\');
                    }
                    else {
                        $(this).attr(\'aria-checked\', \'false\');
                    }
                }
            });
            
            $(\'.carousel-item\').click(function(){
                console.log("Pasando el foco");
                if($(this).attr("class") == "carousel-item active"){
                    var aux = $(\'img\', $(this)).attr(\'src\');
                    var arr_aux = aux.split("/");
                    var long = arr_aux.length;
                    var new_url = "Crear_evento.php?nom=" + arr_aux[long-1];
                    window.location.replace(new_url);
                }
                else{
                    $(this).focus();
                }
            });
            
            
            
            $(\'.carousel-item\').keyup(\'click\', function(key_pressed) {
                console.log("entra");
                if(key_pressed.which == 37 || key_pressed.keyCode == 37){
                    var elem = $(this);
                    console.log(elem);
                    $(\'.carousel\').carousel(\'prev\');
                }
                
                if(key_pressed.which == 39 || key_pressed.keyCode == 39){
                    var elem = $(this);
                    console.log(elem);
                    $(\'.carousel\').carousel(\'next\');
                }
            });
        </script>
        </div>
        </div>
    </body>
    </html>
';   
    echo $string;
?>


