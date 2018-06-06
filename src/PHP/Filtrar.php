<?php


    $string = '<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Eventgram, eventos">
        <meta name="author" content="Juan Carlos González Pascolo, Sergio del Pino Hernández y Pedro Antonio Lima A.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Eventgram</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../design.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Bangers" rel="stylesheet">
        
    </head>
    
    <body>
        <div class="row">
            <div class="col s12">
                <nav>
                    <div id="color_flama" class="nav-wrapper" >
                        <div class="col s1">
                            <a id="main-content" href="#main"><img src="../../res/icono.png" alt="Logotipo de Eventgram" id="logo" class = "left" ></a>
                        </div>
                        <div class="col s6 m8 l4 offset-s2 offset-m1 offset-l1">
                            <form>
                                <div class="input-field">
                                    <input id="search" type="search" required name="barra_busqueda" onKeyUp="buscar();">
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </form>
                        </div>
                        
                        <a href="#" class="sidenav-trigger right" data-target="mobile-nav">
                            <i class="material-icons">menu</i>
                        </a>
                        
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a class="navlink" href="../log_in.html">Sign in</a></li>
                            <li><a class="navlink" href="../sign_up.html">Sign up</a></li>
                            <li><a class="navlink" href="../ayuda.html">Ayuda</a></li>
                            <li><a class="navlink" href="../nosotros.html">Nosotros</a></li>
                            <li><a class="navlink" href="../encuesta.html">Encuesta</a></li>

                        </ul>
                    </div>
                </nav>
                
                <ul id="mobile-nav" class="sidenav">
                    <li><a href="../log_in.html">Sign in</a></li>
                    <li><a href="../sign_up.html">Sign up</a></li>
                    <li><a href="../ayuda.html">Ayuda</a></li>
                    <li><a href="../nosotros.html">Nosotros</a></li>
                    <li><a href="../encuesta.html">Encuesta</a></li>
                </ul>
            </div>
        </div>
        
        <div class="row" aria-label="Contenido principal">
            
            <div class="col s10 offset-s1 z-depth-2" id="main">
                
                <div id="titulo" class="col s12 center-align">EVENTGRAM</div>
                <br>
                
                <div>
                    <form action="./Filtrar.php" method="POST" >
                        <br>
                        <div class="row">
                            <div id="type_div" class="input-field col s10 m4 l2 offset-l1 offset-s1 div_desplegable" tabindex="-1" aria-expanded="false">
                                <i class="material-icons prefix">description</i>

                                <select multiple id="type_select" name = "eventos[]" >
                                    <option class="type_option" tabindex="-1" value="MUSICA" aria-checked="false">Música</option>
                                    <option class="type_option" tabindex="-1" value="TEATRO" aria-checked="false" onKeyUp="ch_check(event)">Teatro</option>
                                    <option class="type_option" value="DEPORTE" aria-checked="false" onKeyUp="ch_check(event)">Deporte</option>
                                    <option class="type_option" value="CINE" aria-checked="false" onKeyUp="ch_check(event)">Cine</option>
                                    <option class="type_option" value="PINTURA" aria-checked="false" onKeyUp="ch_check(event)">Pintura</option>
                                </select> 
                                <label for="eventos[]" id="label_filtro">Tipo de evento</label>
                            </div>
                            
                      
                            
                            <div class="input-field col s10 m4 l2 offset-s1">
                                <i class="material-icons prefix">date_range</i>

                                <input id ="fecha" type="text" name="fecha" class="datepicker">                                  
                                <label for="fecha" class="active" id="label_filtro">Fecha</label>
                            </div>
                            
                      
                            <div id="state_div" class="input-field col s10 m4 l2 offset-s1 div_desplegable" aria-expanded="false">
                                <i class="material-icons prefix">schedule</i>

                                <select id ="estado" name = "estado[]">
                                    <option value="" disabled selected></option>
                                    <option value="PROXIMAMENTE">Proximamente</option>
                                    <option value="DISPONIBLE">Disponible</option>
                                    <option value="FINALIZADO">Finalizado</option>
                                </select>
                                <label for="estado[]" id="label_filtro">Estado</label>
                            </div>
                            
                      
                            <div class="input-field col s10 m4 l2 offset-s1">
                                  <i class="material-icons prefix">location_on</i>
                                  
                                  <input id="Ciudad" type="text" name = "ciudad" class="validate">
                                  <label for="Ciudad" id="label_filtro">Ciudad</label>
                            </div>
                            
                            
                            <div class="col s10 m4 l2 offset-s1 input-field center">
                                <button id="filter" class="btn waves-effect waves-light " type="submit" action="src/PHP/Filtar.php" method="POST" > Filtrar <i class="material-icons right">search</i></button>
                            </div>
                        </div>
                    </form>
                  
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
    $ciudad= $_POST['ciudad'];
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
    <script type="text/javascript" src="../dropdown.js"></script>
        </div>
        </div>
    </body>
    </html>
';   
    echo $string;
?>


