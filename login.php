<?php
	
if(isset($_POST['Email'])){
	
session_start();
	
//mysql_connect("mysql.hostinger.es","u190124820_root","123456") or die(mysql_error());
//mysql_select_db("u190124820_quiz") or die(mysql_error());
	
mysql_connect("localhost","root","") or die(mysql_error()); 
mysql_select_db("quiz") or die(mysql_error()); 

$email=$_POST['Email']; 
$pass=$_POST['Password'];

$usuarios = mysql_query("select * from Usuario where Email='$email' and Password='$pass'");
$cont= mysql_num_rows($usuarios);


if($cont==1){
	$_SESSION['UsuarioReg'] = $email;
	
	$Conexion = "INSERT INTO Conexiones (`User_Email`) VALUES ('$email');";
	
	if (!mysql_query($Conexion))
		mysql_error();
	else
		mysql_close();
		header('location:insertarPreguntaHtml.php');}
else
	mysql_close();
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
                <input type="password" name="Password" id="Password" placeholder="Password" value="123456Maik" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required>
    </p>
	<p>
            	<input type="submit" id="Enviar" value="Enviar" ;>
    </p>
</form>
</body>
</html>
	