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
				Tema:
				</br>
				<input type="text" name="Tema" id="Tema"/>
			</p>
		
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
	</body>
</html>