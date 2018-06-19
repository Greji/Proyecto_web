<!DOCTYPE html>
<html>
<head>
	<title>Detalles Factura</title>
</head>
<body>

	<form action="detallesAdministrador.php" method="POST">
		Cambiar estado de compra
		<select>
			<option value="pProgreso">Progreso</option>
			<option value="Terminada">Terminada</option>
			<option value="Vencida">Vencida</option>

		</select>
	</form>



	<table border="1px">
		<tr>
			<td>Matricula de Producto</td>
			<td>Producto</td>
			<td>Precio por Unidad</td>
			<td>Cantidad</td>
			<td>Precio Total</td>

		</tr>


	<?php  

		$connect = new mysqli("localhost", "root", "", "morango");

   		if(mysqli_connect_error()){
   			die("Error al conectar: " .mysql_error());
   		}

   		$id_factura = $_GET['id'];


		$consulta=mysqli_query($connect,"SELECT detalle_factura.id_producto, producto.nombre,  fecha, fecha_entrega,producto.precio AS precioUnidad, detalle_factura.cantidad, detalle_factura.precio AS precioTotal FROM factura, usuario, detalle_factura, producto WHERE factura.id_usuario = usuario.id_usuario AND detalle_factura.id_factura=factura.id_factura AND factura.id_factura = $id_factura AND producto.id_producto = detalle_factura.id_producto");


    	$nfilas = mysqli_num_rows($consulta);

    	for ($i=0; $i < $nfilas ; $i++) { 
    		$filas= mysqli_fetch_array($consulta);
    		echo "
	    		<tr>
					<td>".$filas['id_producto']."</td>
					<td>".$filas['nombre']."</td>
					<td>".$filas['precioUnidad']."</td>
					<td>".$filas['cantidad']."</td>
					<td>".$filas['precioTotal']."</td>


				</tr>";
    	}


	?>

	</table>



</body>
</html>