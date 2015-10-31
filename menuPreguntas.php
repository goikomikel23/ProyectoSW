<?php
session_start();

if(!($_SESSION)){
	
echo "

<html>
	<head>
		<title>Menu Preguntas</title>
	</head>
	<body>
		<h1>Menu Preguntas</h1>
		
		<br/>
		<a href='Preguntas.php'>Ver Preguntas</a>	
	
	</body>

</html>";
	
}
else{

	$Usuario = $_SESSION['UsuarioReg'];
	
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
		
		<br/>
		
		<a href='insertarPreguntaHtml.php'>Insertar nueva pregunta</a>
		
		<br/>
		
		<a href='transformar.php'>Ver Archivo PreguntasXML</a>	
	
		<br/>
		
		<a href='ObtenerDatos.html'>Obtener Datos de Usuarios</a>	
	</body>

</html>";
}

	
?>