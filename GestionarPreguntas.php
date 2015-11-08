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
			s = new XMLHttpRequest();
			
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
				
			s.onreadystatechange = function(){
				if(s.readyState==4){
					document.getElementById("ActualizarMisPreguntas").innerHTML=s.responseText;	
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
				
			function AjaxActualizarPreguntas(){
			
				s.open("POST","AjaxActualizarPreguntas.php",true);
				s.send();
				
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
		
		<button onclick="AjaxActualizarPreguntas()">Actualizar Preguntas</button>
		
		<br/>
		<br/>
		
		<div id="ActualizarMisPreguntas"></div>
		
		<br/>
		<br/>
		
		<br/>
		<br/>
		
		<a href="menuPreguntas.php">Pagina Principal</a>
	</body>
</html>