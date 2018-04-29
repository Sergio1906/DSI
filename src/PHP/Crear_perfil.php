<?php
$pepe = "aaaaaaaaaaaaaaaaaa";
//echo "<p>" . $pepe . "</p>";

$servidor="localhost";
$usuario = "id4906591_admin";
$clave = "12345";
$basedatos= "id4906591_eventgram";

 



$conexion = new mysqli ($servidor,$usuario,$clave,$basedatos);

if($conexion->connect_errno) die("fallo" . $conexion->connect_error);
    
    
else{ 
    echo "<p>" . $pepe . "</p>";
    
    $SQL = "select * from Usuarios";
    
    $Resultado = mysqli_query($conexion,$SQL);
    
    $tupla = mysqli_fetch_array($Resultado,MYSQLI_ASSOC);
    
    $ID =  $tupla["ID"];

    
    $string = '<head>
        <meta charset="UTF-8">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
         <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
        
        <link rel="stylesheet" href="design.css">
        <script type="text/javascript" src="dropdown.js"></script>
        
        <script src="https://cdn.firebase.com/libs/firebaseui/2.6.3/firebaseui.js"></script>
        <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/2.6.3/firebaseui.css" />
        
        <script src="https://www.gstatic.com/firebasejs/ui/2.6.3/firebase-ui-auth__es.js"></script>
        <link type="text/css" rel="stylesheet" href="https://www.gstatic.com/firebasejs/ui/2.6.3/firebase-ui-auth.css" />
        
        
        <meta name="description" content="Página de inicio">
        <meta name="keywords" content="Eventgram, eventos">
        <meta name="author" content="Juan Carlos González Pascolo, Sergio del Pino Hernández y Pedro Antonio Lima A.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Inicio Sesión</title>
    </head>


<body>
    
    <div class ="container">
        <div class="row">
            <div class="col s12">
                <nav>
                    <div id="color_flama" class="nav-wrapper" >
                        <img src="../res/icono.png" alt="Logo" class="left" height="75px" width="75px">
                            <ul id="nav-mobile" class="right hide-on-med-and-down">
                                <li><a href="formulario.html">Encuesta</a></li>
                                <li><a href="./about_us.html">About us</a></li>
                                <li><a href="../index.html">Home</a></li>
                                <li><a href="./log_in.html">Log in</a></li>
                            </ul>
                        </div>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col s6 offset-s3 center">
                 <p class = "titulo_navbar" >Regístrate en Eventgram</p>
            </div>
        </div>
    

    <div class = "row">
        <form id = "main">
            <div id="Regis" >
                    <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">account_box</i>
                          <input id="Nombre" type="text" class="validate">
                          <label for="icon_prefix">Nombre</label>
                        </div>
                        <div class="input-field col s6">
                             <i class="material-icons prefix">account_circle</i>
                             <input id="Email" type="text" class="validate">
                             <label for="icon_prefix">Correo</label>
                        </div>
                        
                        
                        </div>
                        
                        <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">wc</i>
                          <input id="Sexo" type="text" class="validate">
                          <label for="icon_prefix">Sexo</label>
                        </div>
                        <div class="input-field col s6">
                             <i class="material-icons prefix">looks_one</i>
                             <input id="Edad" type="text" class="validate">
                             <label for="icon_prefix">Edad:' . $ID . '</label>
                        </div>
                        
                        
                        </div>
                    <div class="row">
                            <div class="input-field col s6">
                              <i class="material-icons prefix">vpn_key</i>
                              <input id="Password" type="password" class="validate">
                              <label for="icon_prefix">password mínimo seis carácteres</label>
                            </div>
                            <div class="input-field col s6">
                              <i class="material-icons prefix">vpn_key</i>
                              <input id="Password2" type="password" class="validate">
                              <label for="icon_prefix">Repetir Password</label>
                            </div>
                        </div>
                        
                        <div class = "col s3 push-s5">
                        <button id="submit" class="btn waves-effect waves-light" type="submit" name="action">Registrarse
                        <i class="material-icons right">send</i></button> <br>
                </div>
              </div>
            </div>
        </form>
    </div>
          


    
    <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase-auth.js"></script>
    <script type="text/javascript" src="auth.js"></script>
    
    
    
    
    
    
</body>';
    echo $string;
    

   

    
}


?>