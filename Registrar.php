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
 //if(isset($_FILES['imagen']) && $_FILES['imagen']['size'] > 0){
	 echo "fsdaf";
   //comprobamos si ha ocurrido un error.
  if ($_FILES["imagen"]["error"] > 0){
	echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 100;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "images/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		} else {
			echo $_FILES['imagen']['name'] . ", este archivo existe";
		}
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}

		
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
 
		
	   
	   
   
  /* }else{ 

   
   		

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
 }*/

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