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

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($consulta == NULL) {
		$mensaje = "<p>No hay resultados</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		//echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
	    $contador = 1;
	    $num_row = mysqli_num_rows ($consulta);
	    if($num_row < 3){
	        $mensaje .= '<div class="row">';
	    }
	    
		while($resultados = mysqli_fetch_array($consulta)) {
		    
			$nombre_foto = $resultados['Foto'];
			$name = $resultados['Nombre'];
            

			//Output
			if($num_row > 2){
			    $mensaje .= '<a class="carousel-item" href="src/PHP/Crear_evento.php?nom='.$nombre_foto.'"><img alt="" src="https://infoevent.000webhostapp.com/res/eventos/'.$nombre_foto.'">'.$name.' </a>';
			}
			else{
			    if($num_row == 2){
			        $mensaje .= '<div class="col s12 m6 l6 center-align"><a href="src/PHP/Crear_evento.php?nom='.$nombre_foto.'"><img  class="car_it" alt="" src="https://infoevent.000webhostapp.com/res/eventos/'.$nombre_foto.'"><p>'.$name.'</p></a></div>';
			    }
			    else{
			        $mensaje .= '<div class="col s12 m6 l6 offset-m3 offset-l3 center-align"><a href="src/PHP/Crear_evento.php?nom='.$nombre_foto.'"><img  class="car_it" alt="" src="https://infoevent.000webhostapp.com/res/eventos/'.$nombre_foto.'"><p>'.$name.'</p></a></div>';
			    }
			}
			
			$contador = $contador + 1;
			

		};//Fin while $resultados
		
		if($num_row < 3){
	        $mensaje .= '</div>';
	    }

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;

?>