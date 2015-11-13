<?php
	
//CREAMOS EL SOAP
require_once('lib/nusoap.php');
require_once('lib/class.wsdlcache.php');
$ns="lib/samples/";
$server = new soap_server;
$server->configureWSDL('ComprobarPass',$ns);
$server->wsdl->schemaTargetNamespace=$ns;
$server->register('ComprobarPass', array('Pass'=>'xsd:string'),array('response'=>'xsd:string'), $ns);
function ComprobarPass ($Pass){
	
	$file = file('otros/toppasswords.txt',FILE_IGNORE_NEW_LINES);
	
	$boo = "Valida";
	
	foreach($file as $num_linea=>$linea){
		if ($linea==$Pass)
			$boo = "Invalido";		
	}
	
	return $boo;
	
}
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA:''; 
$server->service($HTTP_RAW_POST_DATA);
	
?>