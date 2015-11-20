<?php

include "Funciones.php";
session_start();

$nPregunta = $_SESSION['nPregunta'];

$Pregunta = $_POST['Pregunta'];
$Respuesta = $_POST['Respuesta'];
$Complejidad = $_POST['Complejidad'];

$mysqli = ConectarBD();

$sentencia = "UPDATE Preguntas SET Pregunta='$Pregunta',Respuesta='$Respuesta',Complejidad='$Complejidad' WHERE Numero_Pregunta='$nPregunta'";



if(!$mysqli->query($sentencia)){
	
			die('Error: '.$mysqli->error);
	
		}else{
			echo("La Pregunta ha sido actualizada");
		}
		
		$mysqli->close();
		

echo '<script language="javascript"> alert("La pregunta ha sido actualizada");</script>';

header('location:RevisarPreguntas.php');
?>