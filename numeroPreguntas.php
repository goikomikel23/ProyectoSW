<?php
include "Funciones.php";
session_start();

$email = $_SESSION['UsuarioReg'];

echo $email;

$mysqli = ConectarBD();

$Tuyas = $mysqli->query("select * from Preguntas where User_Email='$email'");
$Total = $mysqli->query("select * from Preguntas");

$nTuyas = mysqli_num_rows($Tuyas);
$nTotal = mysqli_num_rows($Total);

echo "

<table border=1> 
	<tr> 
		<th> Tuyas </th> 
		<th> Total </th>
	</tr>";
	
	
echo "

	<tr>
		<td>" . $nTuyas ."</td> 
		<td>" . $nTotal ."</td>		
	</tr>"; 
	
echo "</table>"; 

	
	
?>