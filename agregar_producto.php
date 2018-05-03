<!DOCTYPE html>
<html>
<head>
	<title>Agregar producto</title>
</head>
<body>

<?php

$mysqli = new mysqli("localhost", "root", "", "morango");
if(mysqli_connect_error()){
	die("Error al conectar: " .mysql_error());
}

if (is_uploaded_file($_FILES["userfile"]["tmp_name"])){
	if ($_FILES["userfile"]["type"] == "image/jpeg" || $_FILES["userfile"]["type"] == "image/jpg" || $_FILES["userfile"]["type"] == "image/png"){
		#obtener propiedades imagen
		$info = getimagesize ($_FILES["userfile"]["tmp_name"]);
		$id = $_POST['id'];
		$tipo = $_POST['tipo'];
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];
		$imageEscapes = $mysqli->real_escape_string(file_get_contents($_FILES["userfile"]["tmp_name"]));

		//insertar producto con id de imagen
		if ($tipo == 1)	$folder="./Mujer/accesorios/";	if ($tipo == 6)		$folder="./Mujer/vestidos/";	
		if ($tipo == 2)	$folder="./Mujer/blusas/";		if ($tipo == 7)		$folder="./Hombre/accesorios/";
		if ($tipo == 3)	$folder="./Mujer/faldas/";		if ($tipo == 8)		$folder="./Hombre/camisetas/";
		if ($tipo == 4)	$folder="./Mujer/pantalones/";	if ($tipo == 9)		$folder="./Hombre/pantalones/";
		if ($tipo == 5)	$folder="./Mujer/pullovers/";	if ($tipo == 10)	$folder="./Hombre/pullovers/";
		
		$tmp_name = $_FILES["image"]["tmp_name"];
		move_uploaded_file( $tmp_name,"$folder".$_FILES["image"]["name"]);
		$sql = "INSERT INTO producto(id_producto,id_tipo,nombre,precio,imagen) VALUES (".$id.",".$tipo.",".$nombre.",".$precio.",'$folder".$_FILES["image"]["name"]."')";
		$mysqli -> query($sql);

		//mostrar la imagen agregada
		echo "<div class = 'mensaje'>Imagen agregada con el id".$id."</div>";
	}
	else
		echo "<div class = 'error'> Error: El formato del archivo debe ser JPG o PNG</div>";
}
?>

<form enctype="multipart/form-data" action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" align="center">
	<H2>Inserta un producto con su imagen (460 x 580 px)</H2>
	<table align="center">
		<tr>
			<td align="center"><H2>ID del producto:</H2></td>
			<td align="center"><input type="text" name="id"></td>
			<td align="center"><H2>Tipo de producto:</H2></td>
			<td align="center"><input type="text" name="tipo"></td>
		</tr>
		<tr>
			<td align="center"><H2>Descripción del producto:</H2></td>
			<td align="center"><input type="text" name="nombre"></td>
			<td align="center"><H2>Precio:</H2></td>
			<td align="center"><input type="text" name="precio"></td>
		</tr>
		<tr><td></td>
			<td align="center"><H2>Imagen:</H2></td>
			<td align="center"><input type="file" name="userfile"></td>
		</tr>
	</table>
	<input type="submit" value="Guardar producto">
</form>

<H2>Listado de los productos de la base de datos</H2>
<div class="listadoImagenes">
	<?php
		$result = $mysqli -> query("SELECT * FROM imagephp ORDER BY id ASC");
		if ($result){
			while($row = $result -> fetch_array(MYSQLI_ASSOC))
				echo "<img src='imagen_mostrar.php?id=".$row["id"]."' width'".$row["anchura"]."' height='".$row["altura"]."'>";
		}
	?>
</div>
</body>
</html>