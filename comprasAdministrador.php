<!DOCTYPE html>
<html>
<head>
	<title>Compras</title>
</head>
<body>

	<?php  include 'menuAdministrador.php'; ?>

	<table border='1'>
		<tr>
			<td>Factura</td>
			<td>Usuario</td>
			<td>Total a pagar</td>
			<td>Fecha de orden</td>
			<td>Fecha de entrega</td>
			<td>Estado</td>
			<td></td>
		</tr>

	<?php

		$connect = new mysqli("localhost", "root", "", "morango");

   		if(mysqli_connect_error()){
   			die("Error al conectar: " .mysql_error());
   		}


		$consulta=mysqli_query($connect,"SELECT id_factura, usuario.id_usuario AS idUsuario, nombre, total, fecha, fecha_entrega, estado FROM factura, usuario WHERE factura.id_usuario = usuario.id_usuario" );

    	$nfilas = mysqli_num_rows ($consulta);

    	for ($i=0; $i < $nfilas ; $i++) { 
    		$filas= mysqli_fetch_array($consulta);
    		echo "
	    		<tr>
					<td>".$filas['id_factura']."</td>
					<td>".$filas['nombre']."</td>
					<td>".$filas['total']."</td>
					<td>".$filas['fecha']."</td>
					<td>".$filas['fecha_entrega']."</td>
					<td>".$filas['estado']."</td>
					<td><a href='detallesAdministrador.php?id=".$filas['id_factura']."&id_usuario=".$filas['idUsuario']."'>Ver detalles</a></td>
					


				</tr>";
    	}

		




	 ?>
	</table>



	

		

	

</body>
</html>