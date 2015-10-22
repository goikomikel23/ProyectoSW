<?php

//mysql_connect("mysql.hostinger.es","u313754785_sw","micontraseña") or die(mysql_error()); mysql_select_db("u313754785_users") or die(mysql_error());

if(isset($_POST['Email'])){
mysql_connect("localhost","root","") or die(mysql_error()); 
mysql_select_db("quiz") or die(mysql_error()); 

$email=$_POST['Email']; 
$pass=$_POST['Password'];

$usuarios = mysql_query("select * from Usuario where Email='$email' and Password='$pass'");
$cont= mysql_num_rows($usuarios);

if($cont==1)
header('location:insertarPregunta.php');
else
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
	