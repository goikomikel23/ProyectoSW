<?php

include "Funciones.php";

session_start();

if($_SESSION['Rol']){
	

echo $_SESSION['UsuarioReg'];
echo "<br/><a href='layout.html'>Pagina de Inicio</a>";



$mysqli = ConectarBD();

$Preguntas = $mysqli->query("select Numero_Pregunta,Pregunta,Respuesta,Complejidad,User_Email from Preguntas");


echo "

<table border=1> 
	<tr> 
		<th> Pregunta </th>
		<th> Complejidad </th>
		<th> Elegir </th>
	</tr>";
	
	
while( $row = $Preguntas->fetch_assoc() ) {
	
echo "

	<tr>
		<td>" . $row['Pregunta'] ."</td>
		<td>" . $row['Complejidad'] ."</td>
		<td>
			<button onClick='ContestarPregunta(".$row['Numero_Pregunta'].")'>Responder</button></td>
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
					document.getElementById("FormularioPregunta").innerHTML=x.responseText;	
				}
			};
			
			function ContestarPregunta(nPregunta){
				
				x.open("GET","FormularioPregunta.php?nPregunta="+nPregunta,true);
				x.send();
				
			}
		
		</script>
	</head>
	<body>
	
		<div id="FormularioPregunta"></div>
	
	</body>
</html>