<?php
include "Funciones.php";

if(isset($_POST['Email'])){
	
session_start();
	
$mysqli = ConectarBD();


$email=$_POST['Email']; 
$pass=$_POST['Password'];

$usuarios = $mysqli->query("select * from Usuario where Email='$email' and Password='$pass'");
$cont= $usuarios->num_rows;


if($cont==1){
	$_SESSION['UsuarioReg'] = $email;
	
	$Conexion = "INSERT INTO Conexiones (`User_Email`) VALUES ('$email');";
	
	if (!$mysqli->query($Conexion))
		$mysqli-error;
	else
		$mysqli->close;
		header('location:layout.html');}
else
	$mysqli->close();
	echo "El usuario no existe";

}

?>

<html>
<head>
<title>Login</title>
</head>
<body>
	
<p>Introduce tus datos de usuario:</p>
	
<form id='login' name='login' method="POST" action="login.php">
	
	<p>E-mail*:
                <input type="email" name="Email" id="Email" placeholder="email@ikasle.ehu.es/eus" value="mgoicoechea012@ikasle.ehu.eus" pattern="[a-z]+[0-9][0-9][0-9]@ikasle\.ehu\.(es||eus)" required>

                </li>
            </p>
	<p>Password*:
                <input type="password" name="Password" id="Password" value="123456Maik" placeholder="Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
    </p>
	<p>
            	<input type="submit" id="Enviar" value="Enviar" ;>
    </p>
</form>
</body>
</html>
	