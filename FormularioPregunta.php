<?php
include "Funciones.php";
session_start();

if(isset($_GET['nPregunta'])){
$nPregunta = $_GET['nPregunta'];
$_SESSION['nPregunta'] = $nPregunta;
}

$nPregunta = $_SESSION['nPregunta'];


$mysqli = ConectarBD();

$Pregunta = $mysqli->query("select Pregunta,Respuesta from Preguntas where Numero_Pregunta=".$nPregunta);

$row = $Pregunta->fetch_assoc();

$mysqli->close();

$Enun = $row['Pregunta'];
$Respuesta = $row['Respuesta'];

if (isset($_POST['RespuestaPost'])){
	
	$RespuestaPost = $_POST['RespuestaPost'];
	$email = $_SESSION['UsuarioReg'];
	
	if($Respuesta==$RespuestaPost){	
	
	SumarAciertos($email);
	
	echo "<script language='javascript'>alert('Respuesta Correcta');</script>";
	echo "<a href='verResultados.php'>Ver Resultados</a>";
	
	exit();
	
	} else {
		
	SumarFallos($email);
	
	echo "<script language='javascript'>alert('Respuesta Incorrecta');</script>";
	echo "<a href='verResultados.php'>Ver Resultados</a>";
	
	exit();
	
	}
	
	
}

?>

<!DOCTYPE html>

<html>
	<head>
			<title>Insertar Pregunta</title>	
	</head>
	<body>
		
		<br/>
		<br/>
		<?php echo $Enun; ?>
		
		<form id="contestarPregunta" name="contestarPregunta" action="FormularioPregunta.php" method="POST">
			
	
			<p>
				Respuesta:
				</br>
				<input type="text" name="RespuestaPost"/>
			</p>

			<p>
				<input type="submit" value="Enviar"/>
			</p>		
		</form>
		<a href="menuPreguntas.php">Volver</a>
	</body>
</html>