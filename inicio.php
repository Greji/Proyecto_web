<!DOCTYPE html>
<html>
<head>
	<title>Morango</title>
	<link rel="stylesheet" type="text/css" href="Estilo.css">
	<link rel="stylesheet" type="text/css" href="slider.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="icono.ico" /> 
</head>
<body>
	<?php 
	session_start();
	if(session_status()==PHP_SESSION_ACTIVE){
		if ($_SESSION["username"]=="admin"){
			require "menuAdministrador.php";
		}
		else{
			require "menu.php"; 
		}

	}else{
		require "menu.php"; }
	?>
	
	<div class="slider">
		<ul>
			<li><img src="slider1.jpg"></li>
			<li><img src="slider2.jpg"></li>
			<li><img src="slider3.jpg"></li>
			<li><img src="slider4.jpg"></li>
		</ul>
	</div>
	<?php include "pie.php" ?>
</body>
</html>