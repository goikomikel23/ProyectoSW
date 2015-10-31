<?php
include "Funciones.php";

session_start();

if($_SESSION){
	
$mysqli = ConectarBD();
	
			$email = $_SESSION['UsuarioReg'];
			$Tema = $_POST['Tema'];
			$Pregunta = $_POST["Pregunta"];
			$Respuesta = $_POST["Respuesta"];
			$Complejidad = $_POST['Complejidad'];
			$TipoAccion = "Insertar";
			$IPConexion = $_SERVER['REMOTE_ADDR'];
			
			$Accion = "insert into Acciones (User_Email, Tipo_Accion, IP_Conexion) values ('$email', '$TipoAccion', '$IPConexion')";

			$insert = "insert into Preguntas (User_Email,Pregunta,Respuesta,Complejidad) values ('$email', '$Pregunta', '$Respuesta', '$Complejidad')";

				if (!$mysqli->query($insert))
					$mysqli->error;
				else{
					if (!$mysqli->query($Accion))
						$mysqli->error;
					else{
						echo "Pregunta a&ntilde;adida correctamente";
						echo "	
							<br/>
							<a href='layout.html'>Volver</a>
							<br/>";}
					}
		$mysqli->close();
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
			
			echo "PreguntaXML a&ntilde;adida correctamente";
			echo "	
				<br/>
				<a href='VerPreguntasXML.php'>Ver Archivo XML</a>";}
			
		}
				
else
	header('location:layout.html');
?>