<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Contacto</title>
	<link rel="stylesheet" type="text/css" href="Estilo.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="icono.ico" /> 
</head>
<body>
	<div>
	<?php require "menu.php";
	session_start(); ?>
	</div>

	<br><br><br><br><br><br><H1 align="center">¡Inicia sesión y realiza tus compras!</H1>

	<form action="iniciarsesion.php" id="a1" align="center" method="post">
		<table align="center">
		<tr><br><br>
			<td align="center"><H3>Correo electrónico:</H3></td>
			<td align="center"><input type="text" name="correo" id="correo" size="30"></td>
		</tr>
		<tr>
			<td align="center"><H3>Contraseña:</H3></td>
			<td align="center"><input type="password" name="contrasena" id="contrasena" size="30"></td>
		</tr>
		</table><br><br>
		<button type="submit">Iniciar sesión</button>
		<br><br><br><br><br>
	</form>

	<?php 

		$connect = new mysqli("localhost", "root", "", "morango");
		//$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango"); -->Jimena

		if (isset($_POST['correo']) && isset($_POST['contrasena'])) {
			$correo = $_POST['correo'];
			$contrasena = $_POST['contrasena'];

			$auth=mysqli_query($connect,"SELECT * FROM usuario WHERE email='$correo' AND contrasena='$contrasena'");
			$nFilas = mysqli_num_rows ($auth);


			if($nFilas>0){

				session_start();
				$_SESSION["username"] = $usuario['nombre'];
				header("Location: inicio.php");
				
			}else{
				echo '<script>alert("Correo o contraseña incorrecta")</script>';
			}	
		}
	 ?>

	<?php
	include 'enviarcorreo.php';
	?>

	<?php include "pie.php" ?>

</body>
</html>