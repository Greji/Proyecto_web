<!DOCTYPE html>
<html>
<head>
	<title>Morango</title>
</head>
<body>

	<?php 

	 include 'menuAdministrador.php'; 

	 $connect = new mysqli("localhost", "root", "", "morango");
  	if(mysqli_connect_error()){
  		die("Error al conectar: " .mysql_error());
  	}

  	if(isset($_POST['producto'])){
  		$id_producto= $_POST['producto']; 
  	}
  	
  	echo $id_producto;

  	$consulta=mysqli_query($connect,"SELECT * FROM producto WHERE id_producto='$id_producto'" );

  	$nfilas = mysqli_num_rows ($consulta);



	echo "<form name='formModificar' action='modificarProducto.php' method='POST'>
			<table>";

	for($n=0; $n<$nfilas; $n++){
		$filas= mysqli_fetch_array($consulta);


		echo "<tr>
			  	<td><img src='".$filas['direccion']."' width='100' height='90'></td>
			  	<td width='600'>
			  	Nombre<input type='text' name='nombre' value='".$filas['nombre']."'><br>
			  	Precio<input type='text' name='precio' value='".$filas['precio']."'><br>
			  	Descripcion<input type='text' name='descripcion' value='".$filas['descripcion']."'><br>
			  	<input type='submit' name='modificar' value='Modificar' align='center'/>

			  	</td>

			  	<td></td>

			  </tr>";

			}

	echo "</table></form>";


	mysqli_query($connect, "UPDATE producto SET nombre = '$nombre', precio='$precio', descripcion='$descripcion'),   or die('<script>alert("Se murio")</script>');


	mysqli_query($connect, "INSERT INTO producto(id_producto, nombre, descripcion, precio) VALUES ('$sexo', '$nombre', '$password', '$correo', '$telefono', '$tarjeta', '$cvv', '$mes', '$ano')") or die('<script>alert("Se murio")</script>');


	echo"";

	?>


</body>
</html>

