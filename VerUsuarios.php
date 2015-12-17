<?php

include "Funciones.php";
session_start();

if($_SESSION['Rol']=='Profesor'){

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
		<th> Imagen </th>
		<th> R. Correctas </th>
		<th> R. Incorrectas </th>
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
		<td><img heigth='50%' width='50%' src='data:image/jpeg;base64,";
		echo(base64_encode($row['Imagen']));
		echo "'/></td>
		<td>" . $row['RCorrectas'] ."</td>
		<td>" . $row['RIncorrectas'] ."</td>
		
	</tr>"; 
	
	}
echo "</table>";
}else{
	echo "Area Restringida";
	echo "<br/><br/>";
	
}







echo "<p> <a href='layout.html'> Inicio </a>";

$mysqli->close();

?>