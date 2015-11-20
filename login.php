<?php
	
//ARREGLAR NO VA

session_start();

if (isset($_SESSION['UsuarioReg'])){
	echo "
	
	<html>
	<body>
	
	Ya estas logueado como: ".$_SESSION['UsuarioAlumno'];
	
	echo "
		<br/>
	
		<a href='DestruirSesion.php'>LogOut</a>
		
		<br/>
		
	</body>
	</html>
		";
} else {
	
	header('login2.php');

}

?>