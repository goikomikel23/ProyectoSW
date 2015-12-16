<?php 
	session_start();
	if (($_SESSION['Rol'])=='Profesor'){

	$Usuario = $_SESSION['UsuarioReg'];
	
	}else{
		header('location:layout.html');
	}
	
?>
<html>
	<head>
		<title>Menu Preguntas</title>
		<script src="scripts/jquery-2.1.4.js"></script>
		<script lang="javascript">
		
		function cargar(pagina){
			$('#container').load(pagina);
		}
		
		
		
		</script>
	</head>
	<body>
	
		Usuario: <?php echo $Usuario;?>
		
		
		<a href='DestruirSesion.php'>LogOut</a>
		
		<br/>
	
		<h1>Menu Preguntas</h1>
		
		<br/>
		<button onclick="cargar('insertarPreguntaHtml.php')">Insertar Preguntas</button>
		
		<br/>
		<button onclick="cargar('transformar.php')">Ver Archivo PreguntasXML</button>

	
		<br/>
		<button onclick="cargar('ObtenerDatos.html')">Obtener Datos de Usuarios</button>
		
		<br/>
		<button onclick="cargar('RevisarPreguntas.php')">Revisar Preguntas</button>
		
		<br/>
		<button onclick="cargar('VerUsuarios.php')">Ver Usuarios</button>
		
		<br/>
		
		<div id="container"></div>
	</body>
</html>