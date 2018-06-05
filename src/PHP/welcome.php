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
    
    $string = '<!DOCTYPE html>

    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Eventgram, eventos">
        <meta name="author" content="Juan Carlos González Pascolo, Sergio del Pino Hernández y Pedro Antonio Lima A.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Bienvenido</title>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
        <link rel="stylesheet" href="../design.css">
        <script type="text/javascript" src="../dropdown.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>

    <body>
        <div class="row">
            <div class="row">
                <nav>
                    <div id="color_flama" class="nav-wrapper" >
                         <a id="main-content" href="#main"><img src="../../res/icono.png" alt="Logotipo de Eventgram" id="logo" class = "left" ></a>
                        <div class="col s7">
                        </div>
                        
                        <a href="#" class="sidenav-trigger right" data-target="mobile-nav">
                            <i class="material-icons">menu</i>
                        </a>
                        
                        <ul id="nav-mobile" class="right hide-on-med-and-down">
                            <li><a href="../../index.html">Inicio</a></li>
                            <li><a href="../log_in.html">Sign in</a></li>
                            <li><a href="../sign_up.html">Sign up</a></li>
                            <li><a href="../ayuda.html">Ayuda</a></li>
                            <li><a href="../nosotros.html">Nosotros</a></li>
                            <li><a href="../encuesta.html">Encuesta</a></li>

                        </ul>
                    </div>
                </nav>
                
                <ul id="mobile-nav" class="sidenav">
                    <li><a href="../../index.html">Inicio</a></li>
                    <li><a href="../log_in.html">Log in</a></li>
                    <li><a href="../sign_up.html">Sign in</a></li>
                    <li><a href="../ayuda.html">Ayuda</a></li>
                    <li><a href="../nosotros.html">Nosotros</a></li>
                    <li><a href="../encuesta.html">Encuesta</a></li>
                </ul>
            </div>
        </div>
        <div id="main" class="row container">
            <div class="col s12 m12 l12 center-align"> <h1>BIENVENIDO </h1>
                <p>Estamos muy contentos de que formes parte de nuestra comunidad.</p>
                <p>Por favor, entra en tu perfil y personalizalo a tu gusto</p>
                <br>
                <a href="Crear_perfil.php?id=' .$id. '">Pincha para entrar en tu cuenta</a>
            </div>
        </div>
        <br>
    </body>';

    echo $string;

?>