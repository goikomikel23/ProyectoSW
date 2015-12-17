<?php

include "Funciones.php";

$mysqli = ConectarBD();

	
if (
	/*(filter_var($_POST['email'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)/"))))
	&&
	(filter_var($_POST['apellidos'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/[A-z]+ [A-z]+/"))))
   	&&
	(filter_var($_POST['password'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/"))))
	&&*/
	(filter_var($_POST['telefono'], FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^\d{9}$/"))))	
   ){

   
   $patronAlumno = '/[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)/';
   $patronProfe = '/[a-z]+[0-9][0-9][0-9]@ehu\.(es||eus)/';
   
   $email = $_POST['email'];
   
   /*preg_match($patronAlumno, $email, $coincidenciaAlumno);
   preg_match($patronProfe, $email, $coincidenciaProfe);
   
   echo $coincidenciaAlumno;*/
   
   $pass = $_POST['password'];
   $sha1 = sha1($pass);
   
   /************IMAGE***************/
   if (isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0) {
		
			$tmpName = $_FILES['imagen']['tmp_name'];
			$fp = fopen($tmpName, 'r');
			$data = fread($fp, filesize($tmpName));
			$data = addslashes($data);
			fclose($fp);
	

		
		$SQL1= "insert into Usuario (Nombre, Apellidos, Email, Password, Pregunta_Secreta, Respuesta_Secreta,Telefono, Especialidad, 	Intereses, Imagen, Rol) values (
'$_POST[nombre]',
'$_POST[apellidos]',
'$_POST[email]',
'$sha1',
'$_POST[PSecreta]',
'$_POST[RSecreta]',
'$_POST[telefono]',
'$_POST[especialidad]',
'$_POST[intereses]',
'$data',
 '$_POST[Rol]')";
 
		
	   
	   
   
   }else{ 

   
   		

$SQL1= "insert into Usuario (Nombre, Apellidos, Email, Password, Pregunta_Secreta, Respuesta_Secreta,Telefono, Especialidad, Intereses, Rol) values (
'$_POST[nombre]',
'$_POST[apellidos]',
'$_POST[email]',
'$sha1',
'$_POST[PSecreta]',
'$_POST[RSecreta]',
'$_POST[telefono]',
'$_POST[especialidad]',
'$_POST[intereses]',
 '$_POST[Rol]')";
 }

if (!$mysqli->query($SQL1))
{
die('Error: ' . $mysqli->error); }

echo "1 tupla añadida";

$mysqli->close();
	
echo "<p> <a href='Layout.html'> Volver </a>";
	
} else {
	echo "Los datos introducidos no son correctos";
}
?>