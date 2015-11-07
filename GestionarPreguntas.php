<?php
			session_start();
			echo $_SESSION['UsuarioReg'];
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
				
				p.open("GET","AjaxPreguntas.php",true);
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
		
		<button onclick="AjaxInsertarPreguntas()">Insertar Pregunta</button>
		
		<br/>
		<br/>
		
		<div id="MisPreguntas"></div>
		<div id="InsertarMisPreguntas"></div>
		
		<br/>
		<br/>
		
		<a href="menuPreguntas.php">Pagina Principal</a>
	</body>
</html>