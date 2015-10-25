<?php
session_start();
mysql_connect();
//mysql_connect("mysql.hostinger.es","u190124820_root","123456") or die(mysql_error());
//mysql_select_db("u190124820_quiz") or die(mysql_error());

mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("quiz") or die(mysql_error());

	if($_SESSION)
		$email = $_SESSION['UsuarioReg'];
	else
		$email = "NULL";

	$TipoAccion = "Ver";
	$IPConexion = $_SERVER['REMOTE_ADDR'];

	$Accion = "insert into Acciones (User_Email, Tipo_Accion, IP_Conexion) values ('$email', '$TipoAccion', '$IPConexion')";
	if (!mysql_query($Accion))
			mysql_error();

if (!$_SESSION){

	echo "Usuario Anónimo <br/>";

	$Preguntas = mysql_query( "select Pregunta, Complejidad from Preguntas" );


	echo "

		<table border=1> 
		<tr> 
			<th> Pregunta </th> 
			<th> Complejidad </th>
		</tr>";
	
	
	while( $row = mysql_fetch_array( $Preguntas, MYSQL_ASSOC) ) {
	
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



mysql_close();

?>