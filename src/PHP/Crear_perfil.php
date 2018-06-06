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
        <meta charset="UTF-8">
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Eventgram, eventos">
        <meta name="author" content="Juan Carlos González Pascolo, Sergio del Pino Hernández y Pedro Antonio Lima A.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Perfil</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../design.css">
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
    </head>
    
    <body>
        <div class="row">
            <div class="col s12">
                <nav>
                    <div id="color_flama" class="nav-wrapper" >
                        <a id="main-content" href="#main"><img src="../../res/icono.png" alt="Logotipo de Eventgram" id="logo" class = "left" ></a>
                        <div class="col s4 push-s2">
                        </div>
                        
                        <a href="#" class="sidenav-trigger right" data-target="mobile-nav">
                            <i class="material-icons">menu</i>
                        </a>
                        
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a class="navlink" href="../../index.html">Inicio</a></li>
                            <li><a class="navlink" href="../log_in.html">Sign in</a></li>
                            <li><a class="navlink" href="../ayuda.html">Ayuda</a></li>
                            <li><a class="navlink" href="../nosotros.html">Nosotros</a></li>
                            <li><a class="navlink" href="../encuesta.html">Encuesta</a></li>

                        </ul>
                    </div>
                </nav>
                
                <ul id="mobile-nav" class="sidenav">
                    <li><a href="../../index.html">Inicio</a></li>
                    <li><a href="../log_in.html">Sign in</a></li>
                    <li><a href="../ayuda.html">Ayuda</a></li>
                    <li><a href="../nosotros.html">Nosotros</a></li>
                    <li><a href="../encuesta.html">Encuesta</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div id="main">
                <div class="col s12 center">
                    <div class="col s4 offset-s4">
                      <img class="circle responsive-img" src="../../res/p.png" alt="foto de perfil">
                      <h1 tabindex="0">'.$NOMBRE.'</h1>
                    </div> 
                    
                    <div class="row">
                        <div class="col s10 m4 l4 offset-s1 offset-m1 offset-l1">
                            <label tabindex="0" class="label_u">Eventos creados</label><br>';
                            
                            while($aux = mysqli_fetch_array($Resultado2)) {
                            
                                $N_EVENTO = $aux['Nombre'];
                                $FOTO = $aux['Foto'];
                			    $string .= '<a href= "https://infoevent.000webhostapp.com/src/PHP/Crear_evento.php?nom='.$FOTO.'" > '.$N_EVENTO.' </a><br>';
                		    }
                                
                                
                            $string .=' 
                        </div>
            
                        <div class="col s10 m4 l4 offset-s1 offset-m2 offset-l2">
                              <label tabindex="0" class="label_u">Datos personales</label>
                              <p tabindex="0"> Sexo: '.$SEXO.'</p>
                              <p tabindex="0"> Edad: '.$EDAD.'</p>
                              
                        </div>
                    </div>
                    <button id = "Crear_evento" class="btn waves-effect waves-light" type="submit" name="action">Crear Evento<i class="material-icons right">send</i></button>
                    <button id = "Cambiar_info" class="btn waves-effect waves-light" type="submit" name="action">Cambiar datos<i class="material-icons right">info</i></button>
                </div>
                <br>
                <div class="row container">
					<div class="col s12 m10 l8 offset-s1 offset-m1 offset-l1">	
						<div id="div_carta" class="card red darken-2">
							<div id="carta" class="card-content"><span class="white-text">Pronto estará disponible</span></div>
						</div>
					</div>
				</div>
				<br>
            </div>
        </div>
        <script type="text/javascript" src="../dropdown.js"></script>
    </body>
</html>';
}

    echo $string;
    



?>