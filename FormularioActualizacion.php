<?php
include "Funciones.php";
session_start();

$nPregunta = $_GET['nPregunta'];

$mysqli = ConectarBD();

$Pregunta = $mysqli->query("select Pregunta,Respuesta,Complejidad from Preguntas where Numero_Pregunta=".$nPregunta);

$row = $Pregunta->fetch_assoc();

$Enun = $row['Pregunta'];
$Respuesta = $row['Respuesta'];
$Complejidad = $row['Complejidad'];


?>

<!DOCTYPE html>

<html>
	<head>
			<title>Insertar Pregunta</title>	
	</head>
	<body>
		
		<form id="InsertarPregunta" name="InsertarPregunta" action="insertarPregunta.php" method="POST">
			
			<p>
				Pregunta:
				</br>
				<textarea rows="4" cols="50" name="Pregunta" id="Pregunta" placeholder="Tu Pregunta" required>
				<?php echo $Enun; ?>
				</textarea>
			</p>
	
			<p>
				Respuesta:
				</br>
				<textarea rows="4" cols="50" name="Respuesta" id="Respuesta" placeholder="Tu Respuesta" required>
				<?php echo $Respuesta; ?>
				</textarea>
			</p>

			<p>
				Complejidad:
				</br>
				<input type="radio" name="Complejidad" value="1" id="Complejidad"/>
				1
				<input type="radio" name="Complejidad" value="2" id="Complejidad"/>
				2
				<input type="radio" name="Complejidad" value="3" id="Complejidad"/>
				3
				<input type="radio" name="Complejidad" value="4" id="Complejidad"/>
				4
				<input type="radio" name="Complejidad" value="5" id="Complejidad"/>
				5
			</p>

			<p>
				<input type="submit" value="Guardar"/>
			</p>		
		</form>
		<a href="menuPreguntas.php">Volver</a>
	</body>
</html>