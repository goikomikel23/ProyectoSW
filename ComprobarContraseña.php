<?php
if(isset($_GET["q"])){
$pass=$_GET["q"];
require_once('lib/nusoap.php'); 
require_once('lib/class.wsdlcache.php');
	
$soapclient = new nusoap_client( 'http://localhost/ProyectoSW/ComprobarContraseñaWSDL.php?wsdl', false);
$result = $soapclient->call('ComprobarPass',array('Pass'=>$pass));
	echo $result;
}
else
echo "ALGO A FALLADO EN ComprobarContraseña.php";
?>