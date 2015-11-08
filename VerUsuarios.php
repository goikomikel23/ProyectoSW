<?php

include "Funciones.php";

$mysqli = ConectarBD();

$usuarios = mysql_query( "select * from Usuario" );


echo "

<table border=1> 
	<tr> 
		<th> Nombre </th> 
		<th> Apellidos </th>
		<th> Email </th>
		<th> Teléfono </th>
		<th> Especialidad </th>
		<th> Intereses </th>
	</tr>";
	
	
while( $row = mysqli_fetch_assoc($usuarios) ) {
	
echo "

	<tr>
		<td>" . $row['Nombre'] ."</td> 
		<td>" . $row['Apellidos'] ."</td>
		<td>" . $row['Email'] ."</td>
		<td>" . $row['Telefono'] ."</td>
		<td>" . $row['Especialidad'] ."</td>
		<td>" . $row['Intereses'] ."</td>
	</tr>"; 
	
	}
echo "</table>"; 







echo "<p> <a href='layout.html'> Inicio </a>";

mysql_close();

?>