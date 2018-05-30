<?php

$servidor="localhost";
$usuario = "id4906591_admin";
$clave = "12345";
$basedatos= "id4906591_eventgram";


$conexion = new mysqli ($servidor,$usuario,$clave,$basedatos);

if($conexion->connect_errno) die("fallo" . $conexion->connect_error);
    
    
else{ 
    
    $USER = ($_REQUEST['id']);
    
    $SQL = "select * from Usuarios Where ID = '$USER'";
    
    $Resultado = mysqli_query($conexion,$SQL);
    
    $tupla = mysqli_fetch_array($Resultado,MYSQLI_ASSOC);
    
    $ID =  $tupla["ID"];
    $NOMBRE =  $tupla["Nombre"];
    $SEXO =  $tupla["Sexo"];
    $EDAD =  $tupla["Edad"];
    
    $SQL2 = "select * from Eventos Where Creador = '$USER'";
    
    $Resultado2 = mysqli_query($conexion,$SQL2);
    
    $string = '<!DOCTYPE html>

<html lang="es">
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../design.css">
        <script type="text/javascript" src="../src/dropdown.js"></script>
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
                        <a href="../../index.html"> <img src="../../res/icono.png" alt="Logo" class="left" height="75px" width="75px"></a>
                        <div class="col s4 push-s2">
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
                            <li><a href="../log_in.html">Log in</a></li>
                            <li><a href="../sign_in.html">Sign in</a></li>
                            <li><a href="../ayuda.html">Ayuda</a></li>
                            <li><a href="../nosotros.html">Nosotros</a></li>
                            <li><a href="../encuesta.html">Encuesta</a></li>

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
         <div class="row">
          <div class="col s12 center">
            <div class="col s4 offset-s4">
              <img class="circle responsive-img" src="../../res/p.png" alt="foto de perfil">
              <h3>'.$NOMBRE.'</h3>
            </div> <div class="col s4 offset-s1">
                <label>eventos creados</label>';
                
            while($aux = mysqli_fetch_array($Resultado2)) {
            
                $N_EVENTO = $aux['Nombre'];
                $FOTO = $aux['Foto'];
			    $string .= '<a href= "https://infoevent.000webhostapp.com/src/PHP/Crear_evento.php?nom='.$FOTO.'" > '.$N_EVENTO.' </a>';
		    }
                
                
            $string .=' </div>

            <div class="col s4 offset-s2">
                  <label>datos personales</label>
                  <p> '.$SEXO.'</p>
                  <p> '.$EDAD.'</p>
                  
            </div>
            </div>
            </div>
        </body>
    </html>';
}

    echo $string;
    



?>