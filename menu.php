<?php 
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
	<nav>
		<div class="contenido">
			<div class="izq"><img src="morango.jpg"></div>
			<div class="der">
					<a href="iniciarsesion.php"> 👤 Iniciar sesión</a> 
					<a href="registrate.php"> ➽	Registrarse</a>

					

			</div>
		</div>
		<ul class="nav">
			<li><a href="index.php">Inicio</a></li>
			<li><a href="producto.php?tipo=1">Mujeres</a>
				<ul>
					<li><a href="producto.php?tipo=1">Accesorios</a></li>
					<li><a href="producto.php?tipo=2">Blusas</a></li>
					<li><a href="producto.php?tipo=3">Faldas</a></li>
					<li><a href="producto.php?tipo=4">Pantalones</a></li>
					<li><a href="producto.php?tipo=5">Pullovers</a></li>
					<li><a href="producto.php?tipo=6">Vestidos</a></li>
				</ul>
			</li>
			<li ><a href="producto.php?tipo=7"> Hombres</a>
				<ul>
					<li><a href="producto.php?tipo=7">Accesorios</a></li>
					<li><a href="producto.php?tipo=8">Camisetas</a></li>
					<li><a href="producto.php?tipo=9">Pantalones</a></li>
					<li><a href="producto.php?tipo=10">Pullovers</a></li>
				</ul>
			</li>
			<li><a href=""> Acerca de nosotros</a>
				<ul >
					<li><a href=""> Historia</a></li>
					<li><a href=""> Visión</a></li>
				</ul>
			</li>
			<li ><a href="contacto.php"> Contáctanos </a></li>
			<li ><a href="contacto.php"> Contáctanos </a></li>

		</ul>
	</nav>
</body>
</html>