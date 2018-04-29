<?php
$pepe = "aaaaaaaaaaaaaaaaaa";
//echo "<p>" . $pepe . "</p>";

$servidor="files.000webhost.com";
$usuario = "id4906591_admin";
$clave = "12345";
$basedatos= "id4906591_eventgram";


$conexion = new mysqli ($servidor,$usuario,$clave,$basedatos);

if($conexion->connect_errno) die("fallo" . $conexion->connect_error);
    
    
echo "<p>" . $pepe . "</p>";


?>