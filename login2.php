<?php

include "Funciones.php";	

if(isset($_POST['Email'])){
	
session_start();
	
$mysqli = ConectarBD();

$email=$_POST['Email']; 
$pass=$_POST['Password'];
$sha1=sha1($pass);

$usuario = $mysqli->query("select rol from Usuario where Email='$email' and Password='$sha1'")->fetch_object()->rol;

if($usuario=='Profesor'){
	$_SESSION['UsuarioProfesor'] = $email;
	$_SESSION['UsuarioReg'] = $email;
	
	$Conexion = "INSERT INTO Conexiones (`User_Email`) VALUES ('$email');";
	
	if (!$mysqli->query($Conexion))
		$mysqli-error;
	else
		$mysqli->close;
		
		header('location:layout.html');
		
}else if ($usuario=='Alumno'){
	$_SESSION['UsuarioAlumno'] = $email;
	$_SESSION['UsuarioReg'] = $email;
	
	$Conexion = "INSERT INTO Conexiones (`User_Email`) VALUES ('$email');";
	
	if (!$mysqli->query($Conexion))
		$mysqli-error;
	else
		$mysqli->close;
		
		header('location:layout.html');
}
	$mysqli->close();
	echo "El usuario no existe";
	echo $usuario;
}
?>

<html>
<head>
<title>Login</title>
</head>
<body>
	
<p>Introduce tus datos de usuario:</p>
	
<form id='loginProfe' name='login' method="POST" action="login2.php">
	
	<p>E-mail*:
                <input type="email" name="Email" id="Email" placeholder="email@ikasle.ehu.es/eus" value="web000@ehu.es"  required>
                <!-pattern="[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)"->

                </li>
            </p>
	<p>Password*:
                <input type="password" name="Password" id="Password" value="web000" placeholder="Password"  required>
                
                <!- pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" ->
    </p>
	<p>
            	<input type="submit" id="Enviar" value="Enviar" ;>
    </p>
</form>
<form id='loginAlumno' name='login' method="POST" action="login2.php">
	
	<p>E-mail*:
                <input type="email" name="Email" id="Email" placeholder="email@ikasle.ehu.es/eus" value="mgoicoechea012@ikasle.ehu.eus"  required>
                <!-pattern="[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)"->

                </li>
            </p>
	<p>Password*:
                <input type="password" name="Password" id="Password" value="123456Maik" placeholder="Password"  required>
                
                <!- pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" ->
    </p>
	<p>
            	<input type="submit" id="Enviar" value="Enviar" ;>
    </p>
</form>
</body>
</html>