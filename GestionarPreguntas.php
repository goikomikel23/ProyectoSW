<?php
			session_start();
			echo $_SESSION['UsuarioAlumno'];
if(!$_SESSION['UsuarioAlumno']){
	
	echo "<script language='javascript'>alert('Area Restringida');</script>";
	
	header('location:layout.html');
	
}
			
?>

<!DOCTYPE html>

<html>
	<head>
			<title>Actualizar Pregunta</title>	
			<script lang="javascript">
		
			p = new XMLHttpRequest();
			i = new XMLHttpRequest();
			
			p.onreadystatechange = function(){
				if(p.readyState==4){
					document.getElementById("MisPreguntas").innerHTML=p.responseText;	
				}
			};
			
			i.onreadystatechange = function(){
				if(i.readyState==4){
					document.getElementById("InsertarMisPreguntas").innerHTML=i.responseText;	
				}
			};
				
			
			function AjaxPreguntas(){
				
				p.open("POST","AjaxPreguntas.php",true);
				p.send();
				
			}
				
			function AjaxInsertarPreguntas(){
			
				i.open("POST","insertarPreguntaHtml.php",true);
				i.send();
				
			}
	
		
		
			</script>
	</head>
	<body>	
		
		<br/>
		<br/>
		
		<button onclick="AjaxPreguntas()">Obtener Preguntas</button>
		
		<br/>
		<br/>
		
		<div id="MisPreguntas"></div>
		
		<br/>
		<br/>		
		
		<button onclick="AjaxInsertarPreguntas()">Insertar Pregunta</button>
		
		<br/>
		<br/>
		
		<div id="InsertarMisPreguntas"></div>
		
		<br/>
		<br/>
		
		<br/>
		<br/>
		
		<a href="menuPreguntas.php">Pagina Principal</a>
	</body>
</html>