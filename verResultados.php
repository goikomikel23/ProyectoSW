<?php
include "Funciones.php";
session_start();

$email = $_SESSION['UsuarioReg'];

$mysqli = ConectarBD();

$usuarios = $mysqli->query("select RCorrectas, RIncorrectas from Usuario where email='$email'")->fetch_assoc();

echo "

<table border=1> 
	<tr> 
		<th> R. Correctas </th> 
		<th> R. Incorrectas </th>
	</tr>";
	
	
echo "

	<tr>
		<td>" . $usuarios['RCorrectas'] ."</td> 
		<td>" . $usuarios['RIncorrectas'] ."</td>		
	</tr>"; 
	
echo "</table>"; 

	
	
?>