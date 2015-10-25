<?php
session_start();
mysql_connect();
//mysql_connect("mysql.hostinger.es","u190124820_root","123456") or die(mysql_error());
//mysql_select_db("u190124820_quiz") or die(mysql_error());

mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("quiz") or die(mysql_error());

	if($_SESSION)
		$email = $_SESSION;
	else
		$email = "NULL";

	$TipoAccion = "Ver";
	$IPConexion = $_SERVER['REMOTE_ADDR'];

	$Accion = "insert into Acciones (User_Email, Tipo_Accion, IP_Conexion) values ('$email', '$TipoAccion', '$IPConexion')";

				if (!mysql_query($insert))
			mysql_error();
				else
			mysql_close();
			header();


?>