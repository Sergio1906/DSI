<?php

//Conexión a la base de datos
$servidor="localhost";
$usuario = "id4906591_admin";
$clave = "12345";
$basedatos= "id4906591_eventgram";


$conexion = new mysqli ($servidor,$usuario,$clave,$basedatos);

if($conexion->connect_errno) die("fallo" . $conexion->connect_error);

//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";
$consulta = NULL;


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {
	$SQL = "SELECT * FROM Eventos WHERE Nombre LIKE '%$consultaBusqueda%'";
	$consulta = mysqli_query($conexion, $SQL);

	//Obtiene la cantidad de filas que hay en la consulta
	//$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($consulta == NULL) {
		$mensaje = "<p>No hay resultados</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
	    $contador = 1;
		while($resultados = mysqli_fetch_array($consulta)) {
		    
			$nombre_foto = $resultados['Foto'];
			$name = $resultados['Nombre'];
            

			//Output
			//$mensaje .= '<button name="ACTION" type="submit" class="carousel-item" value="'.$contador.'"><img alt="" style="height:100%; width:100%" src="'.$nombre_foto.'"/><span>' .$name.'</span></button>';
			$mensaje .= '<span class="carousel-item" tabindex="0"><img alt="" src="'.$nombre_foto.'">'.$name.' </span>';
			
			$contador = $contador + 1;
			

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;

?>