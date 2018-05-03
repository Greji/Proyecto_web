<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="shortcut icon" href="icono.ico" /> 
	<title>Contacto</title>

	<link rel="stylesheet" type="text/css" href="Estilo.css">
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmEAguhHnQRLjIib61lkvIs8GlAK7Mc4s"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<div>
	<?php require "menu.php" ?>
	</div>

	<script type="text/javascript"> 
	/*----------------------------------------------CENTRADO----------------------------------------------
	<br><br><br><br><br><br><br><br>
	<H1 align="center">¿Tienes alguna duda o comentario? ¡Llena tus datos y contáctanos! </H1>
	<form id="a1" align="center" >
		<H3>Nombre:</H3><input type="text" name="nombre" id="nombre" size="30"> <br>
		<H3>Correo electrónico:</H3><input type="text" name="correo" id="correo" size="30"> <br>
		<H3>Teléfono (opcional):</H3><input type="text" name="telefono" id="telefono" size="30"> <br>
		<H3>Mensaje:</H3><textarea name="mensaje" id="mensaje" rows="4" cols="50"> </textarea> <br><br>
		<button name="enviar" onclick="validar()"> Enviar </button>
	</form> 
	-----------------------------------------------------------------------------------------------------*/
	</script>

	<H1 align="center">¿Tienes alguna duda o comentario? ¡Llena tus datos y contáctanos! </H1>

	<form action="contacto.php" id="a1" align="center" method="post">
		<table align="center">
		<tr>
			<td align="center"><H3>Nombre:</H3></td>
			<td align="center"><input type="text" name="nombre" id="nombre" size="50"></td>
		</tr>
		<tr>
			<td align="center"><H3>Correo electrónico:</H3></td>
			<td align="center"><input type="text" name="correo" id="correo" size="50"></td>
		</tr>
		<tr>
			<td align="center"><H3>Teléfono (opcional):</H3></td>
			<td align="center"><input type="text" name="telefono" id="telefono" size="50"></td>
		</tr>
		<tr>
			<td align="center"><H3>Mensaje:</H3></td>
			<td align="center"><textarea name="mensaje" id="mensaje" rows="4" cols="50"> </textarea></td>
		</tr>
		</table>
		<button type="submit">Enviar</button>
	</form>

	<?php
	include 'enviarcorreo.php';
	?>
	
	<?php
	include 'mapa.php';
	?>

	<?php include "pie.php" ?>

</body>
</html>