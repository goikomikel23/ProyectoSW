<?php

//Conexión BD

function ConectarBD(){
	
	//return ("new mysqli("mysql.hostinger.es","u190124820_root","123456","u190124820_quiz")");
	
	return (new mysqli("localhost","root","","quiz"));
}





?>