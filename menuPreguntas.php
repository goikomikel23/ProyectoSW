<?php
session_start();

if (!$_SESSION){
	
 header('location:menuAnonimo.php');
	
}else if (($_SESSION['Rol'])=='Anonimo'){
	
 header('location:menuAnonimo2.php');
	
}else if (($_SESSION['Rol'])=='Alumno'){

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
		
		<br/>
		
		<a href='GestionarPreguntas.php'>Gestionar tus preguntas</a>
		
		<br/>
		
		<a href='numeroPreguntas.php'>Ver Numero de Preguntas</a>
		
		<br/>
	</body>

</html>";
}
else if (($_SESSION['Rol'])=='Profesor'){
	
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
		
		<br/>
		
		<a href='RevisarPreguntas.php'>Revisar Preguntas</a>
		
		<br/>
		
		<a href='VerUsuarios.php'>Ver Usuarios</a>

	</body>
</html>";
}else if (($_SESSION['Rol'])=='Administrador'){
	
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
		
		<br/>
		
		<a href='RevisarPreguntas.php'>Revisar Preguntas</a>
		
		<br/>
		
		<a href='GestionarPreguntas.php'>Gestionar tus preguntas</a>	

	</body>
</html>";
}

	
?>