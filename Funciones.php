<?php

//Conexión BD

function ConectarBD(){
	
	//return (new mysqli("mysql.hostinger.es","u190124820_root","123456","u190124820_quiz"));
	
	return (new mysqli("localhost","root","","quiz"));
}

function SumarAciertos($email){
	
	$mysqli = ConectarBD();
	
	$RCorrectas = $mysqli->query("select RCorrectas from Usuario where Email='$email'")->fetch_assoc();
	
	$RC = $RCorrectas['RCorrectas'];
	
	$RC++;
	
	$Actualizar = "update usuario set RCorrectas=$RC where Email='$email'";
	
	if (!$mysqli->query($Actualizar))
		die('Error: ' . $mysqli->error);
	
	$mysqli->close();
		
	return 'OK';	
}

function SumarFallos($email){
	
	$mysqli = ConectarBD();
	
	$RIncorrectas = $mysqli->query("select RIncorrectas from Usuario where Email='$email'")->fetch_assoc();
	
	$RI = $RIncorrectas['RIncorrectas'];
	
	$RI++;
	
	$Actualizar = "update usuario set RIncorrectas=$RI where Email='$email'";
	
	if (!$mysqli->query($Actualizar))
		die('Error: ' . $mysqli->error);
	
	$mysqli->close();
		
	return 'OK';	
}






?>