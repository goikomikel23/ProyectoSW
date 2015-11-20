<?php

include "Funciones.php";

$mysqli = ConectarBD();

	
if (
	/*(filter_var($_POST['email'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)/"))))
	&&*/
	(filter_var($_POST['apellidos'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[A-z]+ [A-z]+/"))))
   	&&
	(filter_var($_POST['password'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/"))))
	&&
	(filter_var($_POST['telefono'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^\d{9}$/"))))	
   ){

   
   $patronAlumno = '/[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)/';
   $patronProfe = '/[a-z]+[0-9][0-9][0-9]@ehu\.(es||eus)/';
   
   $email = $_POST['email'];
   
   preg_match($patronAlumno, $email, $coincidenciaAlumno);
   preg_match($patronProfe, $email, $coincidenciaProfe);
   
   echo $coincidenciaAlumno;
   
   /*if ($coincidenciaAlumno[0]==$email)
   		$rol = "Alumno";
   	else if ($coincidenciaProfe[0]==$email)
   		$rol = "Profesor";
   	else
   		echo "Ha habido un error en el rol";*/
   		

$SQL1= "insert into Usuario (Nombre, Apellidos, Email, Password, Telefono, Especialidad, Intereses, Rol) values (
'$_POST[nombre]',
'$_POST[apellidos]',
'$_POST[email]',
'$_POST[password]',
'$_POST[telefono]',
'$_POST[especialidad]',
'$_POST[intereses]',
 '$rol')";

if (!$mysqli->query($SQL1))
{
die('Error: ' . $mysqli->error); }

echo "1 tupla añadida";

$mysqli->close();
	
echo "<p> <a href='VerUsuarios.php'> Ver registros </a>";
	
} else {
	echo "Los datos introducidos no son correctos";
}
?>