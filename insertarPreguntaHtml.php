<?php
			session_start();
			echo "Bienvenido ".$_SESSION['UsuarioReg']." inserta tu pregunta:";
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
				<textarea rows="4" cols="50" name="Pregunta" id="Pregunta" placeholder="Tu Pregunta" required></textarea>
			</p>
	
			<p>
				Respuesta:
				</br>
				<textarea rows="4" cols="50" name="Respuesta" id="Respuesta" placeholder="Tu Respuesta" required></textarea>
			</p>

			<p>
				<input type="submit" value="Guardar"/>
			</p>		
		</form>
	</body>
</html>