<?php

session_start();

if($_SESSION){
	
//mysql_connect("mysql.hostinger.es","u190124820_root","123456") or die(mysql_error());
//mysql_select_db("u190124820_quiz") or die(mysql_error());
	
mysql_connect("localhost","root","") or die(mysql_error()); 
mysql_select_db("quiz") or die(mysql_error());

	
			$email = $_SESSION['UsuarioReg'];
			$Tema = $_POST['Tema'];
			$Pregunta = $_POST["Pregunta"];
			$Respuesta = $_POST["Respuesta"];
			$Complejidad = $_POST['Complejidad'];
			$TipoAccion = "Insertar";
			$IPConexion = $_SERVER['REMOTE_ADDR'];
			
			$Accion = "insert into Acciones (User_Email, Tipo_Accion, IP_Conexion) values ('$email', '$TipoAccion', '$IPConexion')";

			$insert = "insert into Preguntas (User_Email,Pregunta,Respuesta) values ('$email', '$Pregunta', '$Respuesta')";

				if (!mysql_query($insert))
					mysql_error();
				else{
					if (!mysql_query($Accion))
						mysql_error();
					else{
						echo "Pregunta añadida correctamente";
						echo "	
							<br/>
							<a href='layout.html'>Volver</a>
							<br/>";}
					}
	//Insercion XML
	
		if(file_exists("preguntas.xml")){
			$PreguntasXML = simplexml_load_file("preguntas.xml");
			
			$AssessmentItem = $PreguntasXML->addChild('assessmentItem');
			$AssessmentItem->addAttribute('complexity',$Complejidad);
			$AssessmentItem->addAttribute('subject',$Tema);
			
			
			$ItemBody = $AssessmentItem->addChild('itemBody');
			$P = $ItemBody->addChild('p',$Pregunta);
			
			$CorrectReponse = $AssessmentItem->addChild('correctResponse');
			$Value = $CorrectReponse->addChild('value',$Respuesta);
			
			$PreguntasXML->asXML('preguntas.xml');
			
			echo "PreguntaXML añadida correctamente";
			echo "	
				<br/>
				<a href='VerPreguntasXML.php'>Ver Archivo XML</a>";}
			
		}
				
else
	header('location:layout.html');
?>