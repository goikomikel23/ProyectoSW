<?php
session_start();

include "Funciones.php";

$mysqli = ConectarBD();

	if($_SESSION)
		$email = $_SESSION['UsuarioReg'];
	else
		$email = "NULL";

	$TipoAccion = "Ver";
	$IPConexion = $_SERVER['REMOTE_ADDR'];

	$Accion = "insert into Acciones (User_Email, Tipo_Accion, IP_Conexion) values ('$email', '$TipoAccion', '$IPConexion')";
	if (!$mysqli->query($Accion))
			$mysqli->error;

if (!$_SESSION){

	echo "Usuario Anónimo <br/>";

	$Preguntas = $mysqli->query( "select Pregunta, Complejidad from Preguntas" );


	echo "

		<table border=1> 
		<tr> 
			<th> Pregunta </th> 
			<th> Complejidad </th>
		</tr>";
	
	//while( $row = mysql_fetch_array( $Preguntas, MYSQL_ASSOC) ) { SI VA BIEN BORRAR
	
	while( $row = $Preguntas->fetch_assoc() ) {
	
		echo "

			<tr>
			<td>" . $row['Pregunta'] ."</td> 
			<td>" . $row['Complejidad'] ."</td>
		</tr>"; 
	
		}
	echo "</table>"; 

	echo "<p> <a href='layout.html'> Inicio </a>";
}
	
else
{echo "ESTAS REGISTRADO, PROXIMAMENTE TENDRAS MÁS OPCIONES";
 echo "</br>";
 echo "<a href=DestruirSesion.php>LogOut</a>";
}



$mysqli->close();

?>