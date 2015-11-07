<?php

if(file_exists("preguntas.xml")){

echo "
	
	<table border=1>
	<th>Tema</th>
	<th>Pregunta</th>
	<th>Complejidad</th>
	<th>Actualizacion</th>

";


$PeliculasXML = simplexml_load_file('preguntas.xml');
foreach ($PeliculasXML->xpath('//assessmentItem') as $Pelicula)
	{
		echo "<tr>
				<td>".$Pelicula['subject']."</td>
				<td>".$Pelicula->itemBody->p."</td>
				<td>".$Pelicula['complexity']."</td>
				<td><button>Editar</button></td>
			</tr>";
	}
echo "
	</table>
";
	
	
echo "<a href=layout.html>Volver<a/>";
}
else
	echo "No existe el archivo preguntas.xml";
?>