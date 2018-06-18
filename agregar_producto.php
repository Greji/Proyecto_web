<!DOCTYPE html>
<html>
<head>
	<title>Agregar producto</title>
  <link rel="stylesheet" type="text/css" href="Estilo.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="icono.ico" /> 
  <meta charset="utf-8">
</head>
<body>

<?php

	$mysqli = new mysqli("localhost", "root", "", "morango");
	if(mysqli_connect_error()){
		die("Error al conectar: " .mysql_error());
	}

	if (is_uploaded_file($_FILES["userfile"]["tmp_name"])){
		if ($_FILES["userfile"]["type"] == "image/jpeg" || $_FILES["userfile"]["type"] == "image/jpg" || $_FILES["userfile"]["type"] == "image/png"){
			$tipo = $_POST['tipo'];
			$nombre = $_POST['nombre'];
			$descrip = $_POST['descrip'];
			$precio = $_POST['precio'];
			$stock = $_POST['existencias'];
			$image = $_FILES["userfile"]["name"];
			$folder = 0;

			//$imageEscapes = $mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["name"]));

			//insertar producto con id de imagen
			if ($tipo == 1)	$folder="Mujer/accesorios/";	if ($tipo == 6)		$folder="Mujer/vestidos/";	
			if ($tipo == 2)	$folder="Mujer/blusas/";		if ($tipo == 7)		$folder="Hombre/accesorios/";
			if ($tipo == 3)	$folder="Mujer/faldas/";		if ($tipo == 8)		$folder="Hombre/camisetas/";
			if ($tipo == 4)	$folder="Mujer/pantalones/";	if ($tipo == 9)		$folder="Hombre/pantalones/";
			if ($tipo == 5)	$folder="Mujer/pullovers/";		if ($tipo == 10)	$folder="Hombre/pullovers/";

			$ubicacion = $folder.$image;

			echo $ubicacion;
			
			/*$sql = "INSERT INTO producto(id_tipo,nombre,descripcion,precio,existencias,direccion) VALUES (".$tipo.",".$nombre.",".$descrip.",".$precio.",".$stock.","$ubicacion.")";
			$mysqli -> query($sql);
			*/

			mysqli_query($mysqli, "INSERT INTO producto(id_tipo,nombre,descripcion,precio,existencias,direccion) VALUES ('$tipo','$nombre','$descrip','$precio','$stock','$ubicacion'");
		}
		else
			echo "<div class = 'error'> Error: El formato del archivo debe ser JPG o PNG</div>";
	}
	?>

	<div>
	    <?php include 'menu.php';?>
	</div>

	<form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" align="center">
		<H2>Agrega un producto con su imagen (460 x 580 px). Recuerda que debe estar en la carpeta seleccionada</H2>
		<table align="center">
			<tr>
				<td align="center"><H2>Tipo de producto:</H2></td>
				<td align="center"><select name="tipo" id="tipo">
					<option value="1">Mujer Accesorios</option> <option value="2">Mujer Blusas</option> <option value="3">Mujer Faldas</option>
					<option value="4">Mujer Pantalones</option> <option value="5">Mujer Pullovers</option> <option value="6">Mujer Vestidos</option>
					<option value="7">Hombre Accesorios</option> <option value="8">Hombre Camisetas</option> <option value="3">Hombre Pantalones</option> <option value="10">Hombre Pullovers</option>
				</select></td>
				<td align="center"><H2>Imagen:</H2></td>
				<td align="center"><input type="file" name="userfile"></td>
			</tr>
			<tr>
				<td align="center"><H2>Nombre del producto:</H2></td>
				<td align="center"><input type="text" name="nombre"></td>
				<td align="center"><H2>Existencia:</H2></td>
				<td align="center"><input type="text" name="existencias"></td>
				<td></td>
			</tr>
			<tr>
				<td align="center"><H2>Descripción del producto:</H2></td>
				<td align="center"><input type="text" name="descrip"></td>
				<td align="center"><H2>Precio:</H2></td>
				<td align="center"><input type="text" name="precio"></td>
			</tr>
		</table><br>
		<input type="submit" value="Guardar producto" style="background-color: #000; border: none; color: white;padding: 25px 60px;text-align: center;font-weight: bold;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;" class="button">
	</form><br>

	<?php /*<H2>Listado de los productos de la base de datos</H2>
	<div class="listadoImagenes">
		<?php
			$result = $mysqli -> query("SELECT * FROM imagephp ORDER BY id ASC");
			if ($result){
				while($row = $result -> fetch_array(MYSQLI_ASSOC))
					echo "<img src='imagen_mostrar.php?id=".$row["id"]."' width'".$row["anchura"]."' height='".$row["altura"]."'>";
			}
		?>
	</div>
	*/?>
<div class='clearfix'></div>
  <?php include "pie.php" ?>
</body>
</html>