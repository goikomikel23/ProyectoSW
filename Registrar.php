<?php
mysql_connect();
//mysql_connect("mysql.hostinger.es","u190124820_root","123456") or die(mysql_error());
//mysql_select_db("u190124820_quiz") or die(mysql_error());

mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("quiz") or die(mysql_error());
	
if (filter_var($_POST['email'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)/")))){


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
	
} else {
  echo("The email entered is not a valid email address");
}

echo "<p> <a href='VerUsuarios.php'> Ver registros </a>";

?>