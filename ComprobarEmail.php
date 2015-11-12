<?php
if(isset($_GET["q"])){

$email=$_GET["q"];

require_once('lib/nusoap.php'); 
require_once('lib/class.wsdlcache.php');
	
$soapclient = new nusoap_client( 'http://sw14.hol.es/ServiciosWeb/comprobarmatricula.php?wsdl', true);

$result = $soapclient->call('comprobar',array('x'=>$email));

if($result=='SI'){
	echo "El usuario esta en la base de datos";
}
else
	echo "El usuario debe estar matriculado";
}
else
echo "ALGO A FALLADO EN ComprobarMail.php";
	
	
?>
	