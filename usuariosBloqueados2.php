<?php

include "Funciones.php";

	$mysqli = ConectarBD();
	
	$usuariosBloqueados = $mysqli->query('Select Nombre, Apellidos, Email, Rol from Usuario where intentos=3');
	
	$row = mysqli_num_rows($usuariosBloqueados);
	
	if ($row==0){
		header('location: mensajeUsuariosBloqueados.html');
		}
?>

<html>
	<head>
		<script src="scripts/jquery-2.1.4.js"></script>
		<script lang="javascript">
		
		function desbloquearUsuario(Email){
			$Email = Email;
			$ruta = "desbloquearUsuarios.php?Email="+$Email+"";
			$('#container').load($ruta);
			return false;
		}
		
		</script>
	</head>
	<body>
		<div id="container">
		
		<table border=1>
			
			<tr> 
					<th> Nombre </th> 
					<th> Apellidos </th>
					<th> Email </th>
					<th> Rol </th>
					<th> Desbloquear </th>
			</tr>
			
			<?php while($row = $usuariosBloqueados->fetch_assoc()) { ?>
			
			<tr>
				<td> <?php echo $row['Nombre']; ?> </td> 
				<td> <?php echo $row['Apellidos']; ?> </td> 
				<td> <?php echo $row['Email']; ?> </td> 
				<td> <?php echo $row['Rol']; ?> </td> 
				<td><button onClick="desbloquearUsuario('<?php echo $row['Email']; ?>')">Desbloquear</button></td>
			</tr>
			
			<?php } ?>
			
		</table>	
		</div>
		
	</body>
</html>