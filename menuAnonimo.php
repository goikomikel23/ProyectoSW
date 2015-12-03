<?php
include "Funciones.php";
session_start();

if(isset($_POST['Nick'])){

 $nick = $_POST['Nick']; 

 $mysqli = ConectarBD();

 $Consulta = $mysqli->query("Select * from usuario where Email='usuarioanonimo@ehu.es'");
 
 $rows = mysqli_num_rows($Consulta);
 
 if ($rows==0){
	 $insercion = "Insert into usuario (Nombre, Email, Rol) values ('$nick','usuarioanonimo@ehu.es','Anonimo')";
	 
	 if(!$mysqli->query($insercion))
	 	die('Error:'.$mysqli->error);
	 
	 $_SESSION['Rol']='Anonimo';
	 $_SESSION['UsuarioReg']='usuarioanonimo@ehu.es';
	 $_SESSION['NombreAnonimo']=$nick;
	 	
	 	header('location: menuAnonimo2.php');
 }else{
	 $Actualizar = "update usuario set Nombre='$nick', RCorrectas=0, RIncorrectas=0 where Email='usuarioanonimo@ehu.es'";
	 
	 if(!$mysqli->query($Actualizar))
	 	die('Error:'.$mysqli->error);
	 
	 $_SESSION['Rol']='Anonimo';
	 $_SESSION['UsuarioReg']='usuarioanonimo@ehu.es';
	 $_SESSION['NombreAnonimo']=$nick;
	 	
	 	header('location: menuAnonimo2.php');
 }
}
	
?>
<html>
	<head>
		<title></title>		
	</head>
	<body>
	
		<h1>Usuario Anónimo</h1>
		
		
		<form action="menuAnonimo.php" method="post">
			
		Nick:
		<br/>
		<input type="text" name="Nick"/>
		
		<br/>
		<br/>
		
		<input type="submit" value="Jugar"/>	
			
		</form>
		
	</body>
</html>