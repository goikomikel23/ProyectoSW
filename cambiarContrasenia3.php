<?php
	
include "Funciones.php";
session_start();

$emailS = $_SESSION['cambioEmail'];

if (isset($_POST['password'])){

	$mysqli = ConectarBD();
	
	$pass = $_POST['password'];
	$sha1 = sha1($pass);

	$sentencia = "UPDATE Usuario SET Password='$sha1' WHERE email='$emailS'";

if(!$mysqli->query($sentencia)){
	
			die('Error: '.$mysqli->error);
	
		}else{
			unset($_SESSION['cambioEmail']);
			echo("La Contraseña ha sido actualizada. 
			
					<br/>
					
					<a href='layout.html'>Volver</a>
					
					");
		}
		
		$mysqli->close();
}
?>

<html>
	<head>
		
		<script lang="javascript">
			
			 q = new XMLHttpRequest();
			 
			 q.onreadystatechange = function(){
				if(q.readyState==4){
					document.getElementById("PassSegura").innerHTML=q.responseText;	
				}
			};
			
			function ComprobarPass(Pass){
			
						
				q.open("GET","ComprobarContraseña.php?q="+Pass,true);
				q.send();
		}
		
			function ComprobarPassCli (){
			
				var x = document.getElementById("password").value;
				var y = document.getElementById("Cpassword").value;
			
				if (x!=y){
					document.getElementById("password").value = "";
					document.getElementById("Cpassword").value = "";
				
					alert("Debes introducir la misma contraseña");
				}
			}
			
		</script>
		
	</head>
<body>
        <form id='cambioPass' name='cambioPass' method="POST" action="cambiarContrasenia3.php">
            <p>Nueva Contraseña*:
                <input type="password" name="password" id="password" value="123456Maik" placeholder="Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onblur="ComprobarPass(this.value)" required>
            </p>
            
            <p>
	            <div id="PassSegura"></div>
            </p>
            
            <p>Repetir Contraseña*:
                <input type="password" name="Cpassword" id="Cpassword" value="123456Maik" placeholder="Repite el Password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onblur="ComprobarPassCli(this.value)" required>
            </p>            
            <p>
	            <div id="PassSegura"></div>
            </p>
            <input type="submit" value="Cambiar"/>
        </form>
    </div>

</body>

</html>