<?php
include "Funciones.php";
session_start();

if (isset($_POST['email'])){
	
	$mysqli = ConectarBD();
	
	$email = $_POST['email'];
	
	$tupla = $mysqli->query("select * from Usuario where email='$email'");
	$count = $tupla->num_rows;
	
	if ($count==1){
		$_SESSION['cambioEmail'] = $email;
		header("location:cambiarContrasenia2.php?email='$email'");
	} else {
	echo "El usuario introducido no existe";
	}	
}
	
?>

<html>
	<head>
	</head>
	<body>
		
		<form id='cambiarContra' method="post" action="cambiarContrasenia.php">
			
			<p>
			Introduce tu email:<br/>
			<input type="text" name="email"/>
			</p>
			<p>
			<input type="submit" value="Enviar"/>
			</p>
			
		</form>
		
	</body>
</html>