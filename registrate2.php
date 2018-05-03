<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Regístrate</title>
	<link rel="stylesheet" type="text/css" href="Estilo.css">
	<link rel="shortcut icon" href="icono.ico" /> 
</head>
<body>
	<div>
	<?php require "menu.php" ?>
	</div>

	<br><br><br><br><br><br><br><br><br><br><br><H1 align="center">Ingresa tu domicilio </H1>

	<form action="registro2.php" id="a1" align="center" method="post">
		<table align="center">
		<tr>
			<td align="center"><H3>Estado:*</H3></td>
			<td align="center"><input type="text" name="estado" id="estado"></td>
			<td align="center"><H3>Ciudad/Municipio:*</H3></td>
			<td align="center"><input type="text" name="ciudad" id="ciudad"></td>
			<td align="center"><H3>Colonia:* </H3></td>
			<td align="center"><input type="text" name="colonia" id="colonia"></td>
			<td align="center"><H3>CP:*</H3></td>
			<td align="center"><input type="text" name="cp" id="cp" placeholder="00000" size="5" style="width: 42px"></td>
		</tr>
		<tr>
			<td align="center"><H3>Calle/Avenida:*</H3></td>
			<td align="center"><input type="text" name="calle" id="calle"></td>
			<td align="center"><H3>Num Ext:*</H3></td>
			<td align="center"><input type="text" name="ext" id="ext"></td>
			<td align="center"><H3>Num Int:</H3></td>
			<td align="center"><input type="text" name="int" id="int"></td>
			<td align="center"><input type="checkbox" name="fact" id="fact">
			<td align="center"><H3>Facturar a estos datos</H3></td>
			
		</tr>	
		</table>
		
		<H4> * Campos obligatorios </H4>

		<button onclick="location.href='registrate.php'" type="button">Volver</button>
		<button type="submit">Continuar</button>
	</form><br><br><br>

	<?php include "pie.php" ?>
</body>
</html>