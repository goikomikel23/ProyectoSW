<?php
session_start();

include "Funciones.php";

$mysqli = ConectarBD();
$email = $_SESSION['UsuarioReg'];

$Preguntas = $mysqli->query("select Numero_Pregunta,Pregunta,Respuesta,Complejidad from Preguntas where User_Email='".$email."'");


echo "

<table border=1> 
	<tr> 
		<th> N. Pregunta </th> 
		<th> Pregunta </th>
		<th> Respuesta </th>
		<th> Complejidad </th>
		<th> Actualizar </th>
	</tr>";
	
	
while( $row = $Preguntas->fetch_assoc() ) {
	
echo "

	<tr>
		<td>" . $row['Numero_Pregunta'] ."</td> 
		<td>" . $row['Pregunta'] ."</td>
		<td>" . $row['Respuesta'] ."</td>
		<td>" . $row['Complejidad'] ."</td>
		<td>
			<button 			onClick='ActualizacionPregunta(".$row['Numero_Pregunta'],$row['Pregunta'],$row['Respuesta'],$row['Complejidad'].")'>Editar</button></td>
	</tr>"; 
	
	}
echo "</table>";
?>

<html>
	<head>
		<script lang="javascript">
		
			x = new XMLHttpRequest();
			
			x.onreadystatechange = function(){
				if(x.readyState==4){
					document.getElementById("FormularioActualziacion").innerHTML=x.responseText;	
				}
			};
			
			function ActualizacionPregunta(NP,P,R,C){
				
				<?php
				session_start();
					$_SESSION['NP'] = NP;
					$_SESSION['P'] = P;
					$_SESSION['R'] = R;
					$_SESSION['C'] = C;
					
				?>
				
				x.open("POST","FormularioActualizacion.php",true);
				x.send();
				
			}
			
			
			
		
		
		</script>
	</head>
	<body>
	
		<div id="FormularioActualizacion"></div>
	
	</body>
</html>