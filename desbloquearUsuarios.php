<?php
include "Funciones.php";

$mysqli = ConectarBD();

$Email = $_GET['Email'];

$mysqli->query("update usuario set intentos=0 where Email='$Email'");

echo "El usuario '$Email' ha sido desbloqueado";

echo "
	<br/>
	<br/>
	<a href='login2.php'>Volver</a>";
							
	
?>