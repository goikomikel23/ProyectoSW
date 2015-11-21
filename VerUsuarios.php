<?php

include "Funciones.php";

$mysqli = ConectarBD();

$usuarios = $mysqli->query("select * from Usuario" );


echo "

<table border=1> 
	<tr> 
		<th> Nombre </th> 
		<th> Apellidos </th>
		<th> Email </th>
		<th> Teléfono </th>
		<th> Especialidad </th>
		<th> Intereses </th>
		<th> Rol </th>
	</tr>";
	
	
while( $row = $usuarios->fetch_assoc() ) {
	
echo "

	<tr>
		<td>" . $row['Nombre'] ."</td> 
		<td>" . $row['Apellidos'] ."</td>
		<td>" . $row['Email'] ."</td>
		<td>" . $row['Telefono'] ."</td>
		<td>" . $row['Especialidad'] ."</td>
		<td>" . $row['Intereses'] ."</td>
		<td>" . $row['Rol'] ."</td>
		
	</tr>"; 
	
	}
echo "</table>"; 







echo "<p> <a href='layout.html'> Inicio </a>";

$mysqli->close();

?>