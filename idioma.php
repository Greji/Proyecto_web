<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="diseno_articulos.css">
  <link rel="stylesheet" type="text/css" href="Estilo.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="icono.ico" /> 
  <meta charset="utf-8">
</head>
<body>
	<div>
      <?php include 'menu.php';?>
    </div>

	<?php

		$idioma = $_POST['idioma'];
		echo $idioma;
		setcookie("idioma",$idioma,time()+259200);
		header("Location: inicio.php");

	?>
	<div class='clearfix'></div>
  	<?php include "pie.php" ?>
</body>
</html>