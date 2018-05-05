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

	<H1 align="center">¡Regístrate con nosotros!</H1>

	<form action="registro1.php" id="a1" align="center" method="post">
		<table align="center">
		<tr>
			<td align="center"><H3>Nombre completo:*¨</H3></td>
			<td align="center"><input type="text" name="nombre" id="nombre" size="30"></td>
			<td align="center"><H3>Género:</H3></td>
			<td align="center"><select name="genero" id="genero">
				<option value="null">Opción</option>
				<option value="F">Femenino</option>
				<option value="M">Masculino</option>
				<option value="O">Otro</option>
			</select></td>
		</tr>
		<tr>
			<td align="center"><H3>Correo electrónico:*</H3></td>
			<td align="center"><input type="text" name="correo1" id="correo1" size="30"></td>
			<td align="center"><H3>Confirmar<br>correo electrónico:*</H3></td>
			<td align="center"><input type="text" name="correo2" id="correo2" size="30"></td>
		</tr>
		<tr>
			<td align="center"><H3>Contraseña:**</H3></td>
			<td align="center"><input type="password" name="contrasena1" id="contrasena1" size="30"></td>
			<td align="center"><H3>Confirmar<br>contraseña:**</H3></td>
			<td align="center"><input type="password" name="contrasena2" id="contrasena2" size="30"></td>
		</tr>
		<tr>
			<td align="center"><H3>Teléfono (opcional):</H3></td>
			<td align="center"><input type="tel" name="telefono" id="telefono" size="20"></td>
			<td align="center"><H3>No. de tarjeta:*</H3></td>
			<td align="center"><input type="text" name="tar1" id="tar1" placeholder="0000" size="4" style="width: 33px"><input type="text" name="tar2" id="tar2" placeholder="0000" size="4" style="width: 33px"><input type="text" name="tar3" id="tar3" placeholder="0000" size="4" style="width: 33px"><input type="text" name="tar4" id="tar4" placeholder="0000" size="4" style="width: 33px"></td>
		</tr>
		<tr>
			<td align="center"><H3>CVV:***</H3></td>
			<td align="center"><input type="text" name="cvv" id="cvv" placeholder="000" size="3" style="width: 25px"></td>
			<td align="center"><H3>Fecha de expiración:*</H3></td>
			<td><select name="mes_exp" id="mes_exp">
			  <option value="enero">Enero</option><option value="febrero">Febrero</option><option value="marzo">Marzo</option>
			  <option value="abril">Abril</option><option value="mayo">Mayo</option><option value="junio">Junio</option>
			  <option value="julio">Julio</option><option value="agosto">Agosto</option><option value="septiembre">Septiembre</option>
			  <option value="octubre">Octubre</option><option value="noviembre">Noviembre</option><option value="diciembre">Diciembre</option>
			</select>
			<select name="ano_exp" id="mano_exp">
			  <option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option>
			  <option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option>
			</td>
		</tr>
		</table>
		<H4> * Campos obligatorios <br> *¨ El nombre debe ser el mismo que se encuentre en la tarjeta que se utilizará para los pagos <br> ** La longitud de la contraseña debe ser entre 10-20 caracteres, contener 
		mayúsculas, minúsculas y números, sin caracteres especiales <br> 
		<a href="ejemplo_cvv.php">*** Cómo encontrar mi CVV</a></H4>
		
		<button type="submit">Continuar mi registro</button>
	</form><br>

	<?php include "pie.php" ?>

</body>
</html>