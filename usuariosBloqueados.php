<?php

include "Funciones.php";

session_start();

if(($_SESSION['Rol'])=='Administrador'){


	$mysqli = ConectarBD();

	$usuariosBloqueados = $mysqli->query("select Nombre, Apellidos, Email, Rol from usuario where Intentos=3");

	$row2 = mysqli_num_rows($usuariosBloqueados);

	if ($row2!=0){
		
		echo "<h1>Usuarios Bloqueados:</h1>
			
			
			";

		echo "

			<table border=1> 
				<tr> 
					<th> Nombre </th> 
					<th> Apellidos </th>
					<th> Email </th>
					<th> Rol </th>
					<th> Desbloquear </th>
				</tr>";
	
		while($row = $usuariosBloqueados->fetch_assoc()) {
	
		echo "

			<tr>
				<td>" . $row['Nombre'] ."</td> 
				<td>" . $row['Apellidos'] ."</td>
				<td>" . $row['Email'] ."</td>
				<td>" . $row['Rol'] ."</td>
				<td><button onClick='desbloquearUsuario(".$row['Email'].")'>Desbloquear</button></td>
			</tr>"; 
			
				}

		echo "</table>";
		
		echo "
		
			<a href='layout.html'>Pagina de inicio</a>
		
				";
	}else{
		echo "No hay usuarios bloqueados en este momento
		
		<a href='layout.html'>Pagina de inicio</a>
		
		";
	}
}else{
		echo "Area Restringida";
	}
?>

<html>
	<head>
		<script lang="javascript">
		
			x = new XMLHttpRequest();
			
			x.onreadystatechange = function(){
				if(x.readyState==4){
					document.getElementById("usuarioDesbloqueado").innerHTML=x.responseText;	
				}
			};
			
			function desbloquearUsuario(email){
				
				x.open("GET","desbloquearUsuarios.php?email="+email,true);
				x.send();
				
			}
		
		</script>
	</head>
	<body>
	
		<div id="usuarioDesbloqueado"></div>
	
	</body>
</html>