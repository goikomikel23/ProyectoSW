<?php

session_start();

if($_SESSION){
	
//mysql_connect("mysql.hostinger.es","u190124820_root","123456") or die(mysql_error());
//mysql_select_db("u190124820_quiz") or die(mysql_error());
	
mysql_connect("localhost","root","") or die(mysql_error()); 
mysql_select_db("quiz") or die(mysql_error());

	
			$email = $_SESSION['UsuarioReg'];
			$Pregunta = $_POST["Pregunta"];
			$Respuesta = $_POST["Respuesta"];
			$TipoAccion = "Insertar";
			$IPConexion = $_SERVER['REMOTE_ADDR'];
			
			$Accion = "insert into Acciones (User_Email, Tipo_Accion, IP_Conexion) values ('$email', '$TipoAccion', '$IPConexion')";

			$insert = "insert into Preguntas (User_Email,Pregunta,Respuesta) values ('$email', '$Pregunta', '$Respuesta')";

				if (!mysql_query($insert))
					mysql_error();
				else{
					if (!mysql_query($Accion))
						mysql_error();
					else{
						echo "Pregunta añadida correctamente";
						echo "	
							<br/>
							<a href='layout.html'>Volver</a>";}
					}
				}
else
	header('location:layout.html');
?>