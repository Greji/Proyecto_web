<!DOCTYPE html>
<html>
<head>
	<title>Detalle de la compra</title>
	<link rel="stylesheet" type="text/css" href="Estilo.css">
  	<link rel="shortcut icon" href="icono.ico" /> 
  	<meta charset="utf-8">
</head>
<body>
	<div><?php include 'menuAdministrador.php'; ?></div>

	<?php
	//$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");
    	$connect = new mysqli("localhost", "root", "", "morango");
    	if(mysqli_connect_error()){
    		die("Error al conectar: " .mysql_error());
    	}

    	if(isset($_GET['factura'])){
	      $id_factura= $_GET['factura']; 
	    }

	    if (isset($_POST['id_factura'])) {
	      $id_factura= $_POST['id_factura']; 
	    }

	    function actualizarEstado(){
			mysqli_query($connect, 'UPDATE factura SET estado='.$estado.'WHERE id_factura='.$id_factura);
		}

	    if (isset($_POST['modificar'])) {
			$estado = $_POST['estado'];

			echo $estado;

		    mysqli_query($connect, "UPDATE factura SET estado=".$estado." WHERE id_factura =".$id_factura);
		}



	    echo "<form id='formEstado' name='formEstado' action='compraDetalle.php' method='POST' align='center'>
	    <table border=2px align='center'><tr>
            <td><b>Numero de factura</b></td>
            <td><b>Comprador</b></td>
            <td><b>Fecha de expedicion</b></td>
            <td><b>Fecha de entrega</b></td>
            <td><b>Total de la compra</b></td>
            <td><b>Estado de la compra</b></td>
          </tr>";

	    $consulta=mysqli_query($connect,"SELECT * FROM factura WHERE id_factura = ".$id_factura);
	    $filas= mysqli_fetch_array($consulta);
		$query = "SELECT nombre, email FROM usuario WHERE id_usuario =  ".$filas['id_usuario'];
		$resultado1 = $connect->query($query);
		$var = $resultado1->fetch_assoc();

		$estadoactual = $filas['estado'];

		$factura = $filas['id_factura'];

  		echo "<tr>
  			<td width='180'>".$filas['id_factura']."</td>
  			<td width='180'>".$var['nombre']."<br>(".$var['email'].")</td>
            <td width='180'>".$filas['fecha']."</td>
            <td width='180'>".$filas['fecha_entrega']."</td>
            <td width='180'><b>$".$filas['total_si_desc'].".00 MXN</b><br>
            <td width='240'><input type='text' id='estado' name='estado' value=".$filas['estado']." size='5'/>
            <input type='submit' name='modificar' value='Modificar estado' style='background-color: #000; border: none; color: white;padding: 25px 60px;text-align: center;font-weight: bold;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;' onclick='actualizarEstado();'>
  			</tr>
  			<tr> <b>RECUERDA LOS ESTADOS DE LA COMPRA:<b><br>
  			<br><b><i>Proceso: </i></b> La orden fue ingresada con exitosamente, pero debe ser aprobada mediante el proceso de validacion.
			<br><b><i>Enviada: </i></b> Indica que la orden ha sido despachada al correo para ser enviada.
			<br><b><i>Entregada: </i></b> El pedido ya fue entregado en el domicilio indicado.<br><br>
  			</tr>";
  	
  	echo "</table>";

    $consulta=mysqli_query($connect,"SELECT * FROM detalle_factura WHERE id_factura='$id_factura'" );
    $nfilas = mysqli_num_rows ($consulta);

    echo "<div align='center'><b><br>PRODUCTOS REGISTRADOS EN LA FACTURA</b><br><br></div> 
    <table border=2px align='center'><tr>
        <td><b>ID del producto</b></td>
        <td><b>Nombre del producto</b></td>
        <td><b>Cantidad</b></td>
        <td><b>Precio unitario</b></td>
    </tr>";

    for($n=0; $n<$nfilas; $n++){
  		$filas= mysqli_fetch_array($consulta);
  		$query = "SELECT nombre FROM producto WHERE id_producto =  ".$filas['id_producto'];
		$resultado1 = $connect->query($query);
		$var = $resultado1->fetch_assoc();


  		echo "<tr>
  			<td width='180'>".$filas['id_producto']."</td>
  			<td width='180'>".$var['nombre']."</td>
            <td width='180'>".$filas['cantidad']."</td>
            <td width='180'>$".$filas['precio'].".00 MXN</td>
  			</tr>";
  	}

  	echo "</table></form><br>";

	include "pie.php" ?>

	<input >

</body>
</html>