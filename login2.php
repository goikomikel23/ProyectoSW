<?php

include "Funciones.php";	

if(isset($_POST['Email'])){
	
 session_start();
	
 $mysqli = ConectarBD();

 $email=$_POST['Email']; 
 $pass=$_POST['Password'];
 $sha1=sha1($pass);

 $intentos = $mysqli->query("Select Intentos from Usuario where Email='$email'")->fetch_assoc();

 $int = $intentos['Intentos'];

	if($int==3){
	
		echo "Has sobrepasado el número de intentos permitidos para este email. La cuenta ha sido bloqueada. Ponte en contacto con el       administrador";

	}else{
	
		$row = $mysqli->query("select * from Usuario where Email='$email'");
		$numrows = mysqli_num_rows($row);

		if($numrows==1){
			
			$usuario = $mysqli->query("select rol from Usuario where Email='$email' and Password='$sha1'");
			$row = mysqli_num_rows($usuario);
			
			if($row!=0){
			
				$usuario = $mysqli->query("select rol from Usuario where Email='$email' and Password='$sha1'")->fetch_object()->rol;
			

				if($usuario=='Profesor'){
	
					$_SESSION['Rol'] = 'Profesor';
					$_SESSION['UsuarioReg'] = $email;
	
					$Conexion = "INSERT INTO Conexiones (`User_Email`) VALUES ('$email');";
	
						if (!$mysqli->query($Conexion))
								$mysqli->error;
								else
								$mysqli->close;
		
					header('location:layout.html');
		
				}else if ($usuario=='Alumno'){
				
	
					$_SESSION['Rol'] = 'Alumno';
					$_SESSION['UsuarioReg'] = $email;
	
					$Conexion = "INSERT INTO Conexiones (`User_Email`) VALUES ('$email');";
	
						if (!$mysqli->query($Conexion))
								$mysqli-error;
							else
								$mysqli->close;
		
					header('location:layout.html');
		
				}else if ($usuario=='Administrador'){
	
					$_SESSION['Rol'] = 'Administrador';
					$_SESSION['UsuarioReg'] = $email;
	
					$Conexion = "INSERT INTO Conexiones (`User_Email`) VALUES ('$email');";
	
						if (!$mysqli->query($Conexion))
							$mysqli-error;
						else
							$mysqli->close;
		
					header('location:menuAdministrador.php');
				}
	
			}else{
				$int++;
			
				$sentencia = "UPDATE Usuario SET Intentos='$int' WHERE email='$email'";

				if(!$mysqli->query($sentencia))
					die('Error: '.$mysqli->error);
			
				$mysqli->close();
				}
			
		}else{
		
		echo "El usuario no existe";
		}
	}

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
                <input type="password" name="Password" id="Password" value="123456Maik" placeholder="Password"  required>
                
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
<form id='loginAdmin' name='login' method="POST" action="login2.php">
	
	<p>E-mail*:
                <input type="email" name="Email" id="Email" placeholder="email@ikasle.ehu.es/eus" value="administrador@ehu.es"  required>
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
	<p>
	    <a href="cambiarContrasenia.php">¿Has olvidado tu contrasenia?</a>
    </p>
</body>
</html>