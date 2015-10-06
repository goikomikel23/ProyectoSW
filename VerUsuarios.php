<?php

mysql_connect();
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("Quiz") or die(mysql_error());

$usuarios = mysql_query( "select * from usuario" );

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
	
	
while( $row = mysql_fetch_array( $usuarios, MYSQL_ASSOC) ) {
	
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