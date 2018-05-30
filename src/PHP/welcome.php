<?php

    
    $servidor="localhost";
    $usuario = "id4906591_admin";
    $clave = "12345";
    $basedatos= "id4906591_eventgram";
    
    $conexion = new mysqli ($servidor,$usuario,$clave,$basedatos);
    if($conexion->connect_errno) die("fallo" . $conexion->connect_error);
    
    
    $nombre = ($_REQUEST['nam']);
    $email = ($_REQUEST['email']);
    $edad = ($_REQUEST['age']);
    $sexo = ($_REQUEST['sex']);
    $id = $_REQUEST['id'];
    
    $SQL = "insert into Usuarios values ('$id', '$nombre', '$email', '$edad', '$sexo')";
    
    $Resultado = mysqli_query($conexion,$SQL);
    
    $string = '<head>
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

        <title>Evento</title>


    </head>

    <body>
        <div class="row">
            <div class="row">
                <nav>
                    <div id="color_flama" class="nav-wrapper" >
                        <img src="../../res/icono.png" alt="Logotipo de Eventgram" class="left" height="75px" width="75px">
                        <div class="col s7">
                            <form>
                                <div class="input-field">
                                    <input id="search" type="search" required name="barra_busqueda" onKeyUp="buscar();">
                                    <label class="label-icon" for="search"><i class="material-icons">search</i></label>
                                    <i class="material-icons">close</i></input>
                                </div>
                            </form>
                        </div>
                        
                        <a href="#" class="sidenav-trigger right" data-target="mobile-nav">
                            <i class="material-icons">menu</i>
                        </a>
                        
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="src/log_in.html">Sign in</a></li>
                            <li><a href="src/sign_up.html">Sign up</a></li>
                            <li><a href="src/ayuda.html">Ayuda</a></li>
                            <li><a href="src/nosotros.html">Nosotros</a></li>
                            <li><a href="src/encuesta.html">Encuesta</a></li>

                        </ul>
                    </div>
                </nav>
                
                <ul id="mobile-nav" class="sidenav">
                    <li><a href="src/log_in.html">Log in</a></li>
                    <li><a href="src/sign_in.html">Sign in</a></li>
                    <li><a href="src/ayuda.html">Ayuda</a></li>
                    <li><a href="src/nosotros.html">Nosotros</a></li>
                    <li><a href="src/encuesta.html">Encuesta</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12 l12 center-align">BIENVENIDO
                <p>Estamos muy contentos de que formes parte de nuestra comunidad.</p>
                <p>Por favor, entra en tu perfil y personalizalo a tu gusto</p>
                <a href="Crear_perfil.php?id=' .$id. '">Entra en tu cuenta</a>
            </div>
        </div>
    </body>';

    echo $string;

?>