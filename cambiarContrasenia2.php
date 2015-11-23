<?php
include "Funciones.php";
session_start();

$emailS = $_SESSION['cambioEmail'];

if (isset($_GET['email'])){

	$email = $_GET['email'];
	

	$mysqli = ConectarBD();
	$pregunta = $mysqli->query("select Pregunta_Secreta from Usuario where Email='$emailS'")->fetch_object()->Pregunta_Secreta;
	
	//NOSE POR QUÉ SI LE METO LA VARIABLE $EMAIL NO ME FUNCIONA CON GET, HE USADO SESSION PARA SALIR DEL PASO

	echo $pregunta;
	
}else if(isset($_POST['RSecreta'])){
	
		$mysqli = ConectarBD();
		
		$respuesta = $mysqli->query("select Respuesta_Secreta from Usuario where Email='$emailS'")->fetch_object()->Respuesta_Secreta;
		
		if ($respuesta==$_POST['RSecreta']){
			header('location: cambiarContrasenia3.php');
		}
		else
			echo "Respuesta Incorrecta, Intentalo de nuevo: ";
		
}	
	

?>

<html>
	<head>
	</head>
	<body>
		
		<form method="post" action="cambiarContrasenia2.php">
			
			<input type="text" name="RSecreta"/>
			<br/>
			<br/>
			<input type="submit" value="Enviar"/>
			
		</form>
		
	</body>
</html>