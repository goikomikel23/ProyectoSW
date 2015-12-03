<?php
include "Funciones.php";
session_start();

if($_SESSION['Rol']=='Anonimo'){
	 
	$Usuario = $_SESSION['NombreAnonimo'];

echo "

<html>
	<head>
		<title>Menu Preguntas</title>
	</head>
	<body>
	
		Usuario: ".$Usuario." 
		
		
		<a href='DestruirSesion.php'>LogOut</a>
		
		<br/>
	
		<h1>Menu Preguntas</h1>
		
		
		<a href='contestarPreguntas.php'>Jugar</a>
		
		<br/>
		<br/>
		
		<a href='verResultados.php'>Ver Resultados</a>	
	
		<br/>
		<br/>
		<br/>
		<br/>
		
		<a href='layout.html'>Volver</a>	
	</body>

</html>";

}else{
	echo "Area Restringida. Acceso Usuario Anonimo";
}

?>