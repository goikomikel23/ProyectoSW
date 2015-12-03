<?php
session_start();

echo $_SESSION['UsuarioReg'];
?>
<html>
	<head>
		<title>Menu Administrador</title>
		
	</head>
	<body>
		
		<br/>
		<br/>
		
		<a href="usuariosBloqueados.php">Desbloquear Usuarios</a>
		
		<br/>
		<br/>
		<br/>
		<br/>
		
		<a href="layout.html">Pagina de inicio</a>
				
	</body>
</html>








<!--
<html>
	<head>
		<title>Menu Administrador</title>
		<script src="scripts/jquery-2.1.4.js" type="text/javascript"></script>
		<script lang="javascript">
			
			function usuariosBloqueados(){
				$("#Bloqueados").load("usuariosBloqueados.php");
			}
			
		</script>
		
	</head>
	<body>
		
		<button onclick="usuariosBloqueados()">Desbloquear Cuentas</button>
		
		<div id="Bloqueados"></div>
		
	</body>
</html>->