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


    $string = '<head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../design_php.css">
        <script type="text/javascript" src="../dropdown.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">



        <meta charset="UTF-8">
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Eventgram, eventos">
        <meta name="author" content="Juan Carlos González Pascolo, Sergio del Pino Hernández y Pedro Antonio Lima A.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title>Evento</title>
        
        
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
                            <li><a href="../../index.html>Inicio</a></li>
                            <li><a href="../log_in.html">Sign in</a></li>
                            <li><a href="../sign_up.html">Sign up</a></li>
                            <li><a href="../ayuda.html">Ayuda</a></li>
                            <li><a href="../nosotros.html">Nosotros</a></li>
                            <li><a href="../encuesta.html">Encuesta</a></li>
                        </ul>
                    </div>
                </nav>
                
                <ul id="mobile-nav" class="sidenav">
                    <li><a href="../../index.html>Inicio</a></li>
                    <li><a href="src/log_in.html">Log in</a></li>
                    <li><a href="src/sign_in.html">Sign in</a></li>
                    <li><a href="src/ayuda.html">Ayuda</a></li>
                    <li><a href="src/nosotros.html">Nosotros</a></li>
                    <li><a href="src/encuesta.html">Encuesta</a></li>
                </ul>
            </div>
        </div>

        <div class="row container center-align" id="main">
            <div class="col s10 m5 l4 offset-s1 offset-l1 fondo z-depth-4">
              <div class="col s5 m2 l2 offset-s4 offset-m1 offset-l1">
                <i class="medium material-icons">people</i> <br> <a href="https://infoevent.000webhostapp.com/src/PHP/Crear_perfil.php?id='.$CREADOR.'"> '.$USER.' </a>
              </div>
              <div class="col s5 m2 l2 offset-s4 offset-m3 offset-l2">
                <i class="medium material-icons">mail</i><p>'.$CORREO.'  </p>
              </div>
              

              <h3>Puntuación</h3>
              <div class = "clasificacion">
                   ★★★★★★
              </div>
              <div>
              <p> Comentarios </p>
              </div>
            </div>



            <div class="col s10 m7 l6 offset-s1 fondo z-depth-4">
              <h2> <strong>'.$NOMBRE.' </strong> </h2>
              <img class="responsive-img z-depth-3" src="../../res/eventos/'.$FOTO.'" alt="foto del evento">
              <div>
              <br>
              '.$DESCRIPCION.'
              </div>
              <br></br>
              <h5 class="black-text">Enlaces de interés</h5>
              <div class="col s5 m6 l3">
                  <i class="medium material-icons">home</i>
                  <br>
                  <a href="../../index.html"> Home </a>
              </div>
              <div class="col s5 m6 l3 offset-s1">
                  <i class="medium material-icons">cloud</i>
                  <br>
                  <a href="../nosotros.html"> About us </a>
              </div>
              <div class="col s5 m6 l3">
                  <i class="medium material-icons"> computer </i>
                  <br>
                  <a href="../encuesta.html"> Encuesta</a>
              </div>
              <div class="col s5 m6 l3 offset-s1">
                  <i class="medium material-icons">create</i>
                  <br>
                  <a href="../log_in.html"> Log In </a>
              </div>
              </div>
       
            </div>
        </div>
    </body>';

    echo $string;
  }


?>
