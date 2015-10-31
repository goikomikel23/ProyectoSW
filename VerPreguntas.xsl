<?xml version="1.0" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
<xsl:template match="/">
	
	<html>
		<head>
			<title>PreguntasXSL</title>	
		</head>
	<body>
	
		<table border="1">
			
			<th>Tema</th>
			<th>Pregunta</th>
			<th>Respuesta</th>
			<th>Complejidad</th>
		
		<xsl:for-each select="assessmentItems/assessmentItem">
			
			<tr>
				
			<td>
				<FONT SIZE="3" COLOR="red" FACE="Verdana">
				<xsl:value-of select="@subject"/>
				</FONT>
			</td>
			
			<td>
				<FONT SIZE="3" COLOR="blue" FACE="Verdana">
				<xsl:value-of select="itemBody/p"/>
				</FONT>
			</td>
				
			<td>
				<FONT SIZE="3" COLOR="pink" FACE="Verdana">
				<xsl:value-of select="correctResponse/value"/>
				</FONT>
			</td>
				
			<td>
				<FONT SIZE="3" COLOR="purple" FACE="Verdana">
				<xsl:value-of select="@complexity"/>
				</FONT>
			</td>
				
			</tr>
		</xsl:for-each>
			
			
		
		</table>		
	</body>
	</html>
</xsl:template>
</xsl:stylesheet>