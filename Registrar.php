<?php
mysql_connect();
//mysql_connect("mysql.hostinger.es","u190124820_root","123456") or die(mysql_error());
//mysql_select_db("u190124820_quiz") or die(mysql_error());

mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("quiz") or die(mysql_error());
	
if (
	(filter_var($_POST['email'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)/"))))
	&&
	(filter_var($_POST['apellidos'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[A-z]+ [A-z]+/"))))
   	&&
	(filter_var($_POST['password'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/"))))
	&&
	(filter_var($_POST['telefono'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^\d{9}$/"))))	
   ){


$SQL1= "insert into Usuario (Nombre, Apellidos, Email, Password, Telefono, Especialidad, Intereses) values (
'$_POST[nombre]',
'$_POST[apellidos]',
'$_POST[email]',
'$_POST[password]',
'$_POST[telefono]',
'$_POST[especialidad]',
'$_POST[intereses]')";

if (!mysql_query($SQL1)){
die('error: '.mysql_error());
}
echo "1 tupla añadida";

mysql_close();
	
echo "<p> <a href='VerUsuarios.php'> Ver registros </a>";
	
} else {
	echo "Los datos introducidos no son correctos";
}
?>