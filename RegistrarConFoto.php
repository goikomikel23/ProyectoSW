<?php

mysql_connect();
mysql_connect("localhost","root","") or die(mysql_error());
mysql_select_db("Quiz") or die(mysql_error());




$SQL1= "insert into Usuario (Nombre, Apellidos, Email, Password, Telefono, Especialidad, Intereses, Imagen) values (
'$_POST[nombre]',
'$_POST[apellidos]',
'$_POST[mail]',
'$_POST[password]',
'$_POST[telefono]',
'$_POST[especialidad]',
'$_POST[intereses]',
LOAD_FILE('/Users/EHU/Escritorio/IMG_8101.jpg'))";

if (!mysql_query($SQL1)){
die('error: '.mysql_error());
}
echo "1 tupla añadida";

mysql_close();

echo "<p> <a href='verusuarios.php'> Ver registros </a>";

?>