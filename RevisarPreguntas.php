<?php

include "Funciones.php";

session_start();

if(($_SESSION['Rol'])=='Profesor'){
	

echo $_SESSION['UsuarioReg'];


$mysqli = ConectarBD();

$Preguntas = $mysqli->query("select Numero_Pregunta,Pregunta,Respuesta,Complejidad,User_Email from Preguntas");


echo "

<table border=1> 
	<tr> 
		<th> N. Pregunta </th> 
		<th> Pregunta </th>
		<th> Respuesta </th>
		<th> Complejidad </th>
		<th> Usuario </th>
		<th> Actualizar </th>
	</tr>";
	
	
while( $row = $Preguntas->fetch_assoc() ) {
	
echo "

	<tr>
		<td>" . $row['Numero_Pregunta'] ."</td> 
		<td>" . $row['Pregunta'] ."</td>
		<td>" . $row['Respuesta'] ."</td>
		<td>" . $row['Complejidad'] ."</td>
		<td>" . $row['User_Email'] ."</td>
		<td>
			<button onClick='ActualizacionPregunta(".$row['Numero_Pregunta'].")'>Editar</button></td>
	</tr>"; 
	
	}
echo "</table>";
}
else{
	echo "Area Restringida";
}
?>

<html>
	<head>
		<script lang="javascript">
		
			x = new XMLHttpRequest();
			
			x.onreadystatechange = function(){
				if(x.readyState==4){
					document.getElementById("FormularioActualizacion").innerHTML=x.responseText;	
				}
			};
			
			function ActualizacionPregunta(nPregunta){
				
				x.open("GET","FormularioActualizacion.php?nPregunta="+nPregunta,true);
				x.send();
				
			}
		
		</script>
	</head>
	<body>
	
		<div id="FormularioActualizacion"></div>
	
	</body>
</html>