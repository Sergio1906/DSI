<?php


$servidor="localhost";
$usuario = "id4906591_admin";
$clave = "12345";
$basedatos= "id4906591_eventgram";


$conexion = new mysqli ($servidor,$usuario,$clave,$basedatos);

if($conexion->connect_errno) die("fallo" . $conexion->connect_error);


else{
    

    $ID = ($_REQUEST['nom']);

    $SQL = "select * from Eventos where Foto = '$ID' ";

    $Resultado = mysqli_query($conexion,$SQL);

    $tupla = mysqli_fetch_array($Resultado,MYSQLI_ASSOC);

    $ID_EVENTO =  $tupla["ID_Evento"];
    $NOMBRE =  $tupla["Nombre"];
    $FOTO =  $tupla["Foto"];
    $DESCRIPCION =  $tupla["Descripcion"];
    $CREADOR =  $tupla["Creador"];
    $TIPO =  $tupla["Tipo"];
    $FECHA =  $tupla["Fecha"];
    $CIUDAD =  $tupla["Ciudad"];
    $ESTADO =  $tupla["Estado"];
    
    $SQL2 = "select * from Usuarios where ID = '$CREADOR' ";
    $Resultado2 = mysqli_query($conexion,$SQL2);
    $tupla2 = mysqli_fetch_array($Resultado2,MYSQLI_ASSOC);
    
    $USER = $tupla2["Nombre"];
    $CORREO = $tupla2["Correo"];


    $string = ' <!DOCTYPE html> <html lang=es>
        <head>
        <meta charset="UTF-8">
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Eventgram, eventos">
        <meta name="author" content="Juan Carlos González Pascolo, Sergio del Pino Hernández y Pedro Antonio Lima A.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Evento</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../design.css">
        <script type="text/javascript" src="../dropdown.js"></script>
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
                            <li><a class="navlink" href="../sign_up.html"> Sign up </a></li>
                            <li><a class="navlink" href="../ayuda.html">Ayuda</a></li>
                            <li><a class="navlink" href="../nosotros.html">Nosotros</a></li>
                            <li><a class="navlink" href="../encuesta.html">Encuesta</a></li>
                        </ul>
                    </div>
                </nav>
                
                <ul id="mobile-nav" class="sidenav">
                    <li><a href="../../index.html">Inicio</a></li>
                    <li><a href="../log_in.html"> Sign in</a></li>
                    <li><a href="../sign_up.html">Sign up</a></li>
                    <li><a href="../ayuda.html">Ayuda</a></li>
                    <li><a href="../nosotros.html">Nosotros</a></li>
                    <li><a href="../encuesta.html">Encuesta</a></li>
                </ul>
            </div>
        </div>

        <div class="row container center-align" id="main">
            <div class="col s10 m5 l4 offset-s1 offset-l1 fondo ">
              <div class="col s12 m2 l2 offset-m1 offset-l1 center-align">
                <i class="medium material-icons">people</i> <a href="https://infoevent.000webhostapp.com/src/PHP/Crear_perfil.php?id='.$CREADOR.'"><p>'.$USER.'</p></a>
              </div>
              <div class="col s12 m2 l2 offset-m3 offset-l2 center-align">
                <i class="medium material-icons">mail</i><p tabindex="0">'.$CORREO.'</p><br>
              </div>
              
              
              <br><br><br><br><br><br>
              <h3  tabindex="0">Puntuación</h3>
              <div class = "clasificacion">
                <span tabindex="0">★★★★★★  <br> 5 ESTRELLAS </span>
              </div>
              <div>
              <p> Comentarios </p>
              </div>
            </div>



            <div class="col s10 m7 l6 offset-s1 fondo ">
              <h1 tabindex="0" id="title_event"><strong>'.$NOMBRE.'</strong></h1>
              <img class="responsive-img z-depth-3" src="../../res/eventos/'.$FOTO.'" alt="foto del evento">
              <div tabindex="0">
              <br>
              '.$DESCRIPCION.'
              </div>
              <br>
              <h3 tabindex="0" class="black-text">Enlaces de interés</h3>
              <div class="col s5 m6 l3">
                  <i class="medium material-icons">home</i>
                  <br>
                  <a href="../../index.html"> Home </a>
              </div>
              <div class="col s5 m6 l3 offset-s1">
                  <i class="medium material-icons">cloud</i>
                  <br>
                  <a href="../nosotros.html"> Nosotros </a>
              </div>
              <div class="col s5 m6 l3">
                  <i class="medium material-icons"> computer </i>
                  <br>
                  <a href="../encuesta.html"> Encuesta</a>
              </div>
              <div class="col s5 m6 l3 offset-s1">
                  <i class="medium material-icons">create</i>
                  <br>
                  <a href="../log_in.html"> Sign in </a>
              </div>
              </div>
       
        </div>
        
    </body>
    </html>';

    echo $string;
  }


?>
