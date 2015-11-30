<html>
	<body>
		
		Necesitas estar autenticado
		<?php session_start(); echo $_SESSION['Rol']; ?>
		<br/>
		<br/>
		<a href="layout.html">Volver</a>
		
	</body>
</html>