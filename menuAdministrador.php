<?php 
//session_start();
if(!isset($_COOKIE['idioma'])){
     header("Location: index.php");
}
if($_COOKIE['idioma']=='en'){
  echo "<div id='google_translate_element'></div>
<script type='text/javascript' src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
    <script type='text/javascript'>
      function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
    </script>";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Morango</title>
	<link rel="stylesheet" type="text/css" href="Estilo.css">
	<link rel="stylesheet" type="text/css" href="slider.css">
	<link rel="shortcut icon" href="icono.ico" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<style type="text/css">
		.nada{
			background-color:#000;
			color:#fff;
			text-decoration:none;
			padding:10px 12px;
			display:block; 
			font-weight: bold
		}
	</style>
	<nav>
		<div class="contenido">
			<div class="izq"><img src="morango.jpg"></div>
			<div class="der">
			Bienvenido, <b>administrador</b>
					<a href="cerrarsesion.php">  ➽	Cerrar sesion</a>
			</div>
		</div>
		<ul class="nav">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="agregar_producto.php">Agregar producto</a></li>
			<li class="nada">Productos:</li>>

			<li><a href="productoAdministrador.php?tipo=0">Mujeres</a>
				<ul>
					<li><a href="productoAdministrador.php?tipo=1">Accesorios</a></li>
					<li><a href="productoAdministrador.php?tipo=2">Blusas</a></li>
					<li><a href="productoAdministrador.php?tipo=3">Faldas</a></li>
					<li><a href="productoAdministrador.php?tipo=4">Pantalones</a></li>
					<li><a href="productoAdministrador.php?tipo=5">Pullovers</a></li>
					<li><a href="productoAdministrador.php?tipo=6">Vestidos</a></li>
				</ul>
			</li>
			<li ><a href="productoAdministrador.php?tipo=11"> Hombres</a>
				<ul>
					<li><a href="productoAdministrador.php?tipo=7">Accesorios</a></li>
					<li><a href="productoAdministrador.php?tipo=8">Camisetas</a></li>
					<li><a href="productoAdministrador.php?tipo=9">Pantalones</a></li>
					<li><a href="productoAdministrador.php?tipo=10">Pullovers</a></li>
				</ul>
			</li>
			<li><a href="descuentoAdministrador.php">Modificar descuentos</a></li>
			<li><a href="comprasAdministrador.php">Compras</a></li>

		</ul>
	</nav>
</body>
</html>