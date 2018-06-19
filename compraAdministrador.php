<!DOCTYPE html>
<html>
<head>
	<title>Compras registradas</title>
	<link rel="stylesheet" type="text/css" href="Estilo.css">
  	<link rel="shortcut icon" href="icono.ico" /> 
  	<meta charset="utf-8">
</head>
<body>
	<style type="text/css">
    .button{
      background-color: #000; border: none; color: white;
      padding: 25px 60px;
      text-align: center;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
      cursor: pointer; 
    }
    </style>

    <div><?php include 'menuAdministrador.php'; ?></div>

	<?php
	//$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");
    	$connect = new mysqli("localhost", "root", "", "morango");
    	if(mysqli_connect_error()){
    		die("Error al conectar: " .mysql_error());
    	}

    	$consulta=mysqli_query($connect,"SELECT * FROM factura");

      
  	$nfilas = mysqli_num_rows ($consulta);

  	echo "<form action='compraAdministrador.php' method='POST' align='center'>
  			<table border=2px align='center'>";

    echo "<tr>
            <td><b>Numero de factura</b></td>
            <td><b>Comprador</b></td>
            <td><b>Fecha de expedicion</b></td>
            <td><b>Fecha de entrega</b></td>
            <td><b>Total de la compra</b></td>
            <td><b>Estado de la compra</b></td>
            <td><b>Detalles de la compra</b></td>
          </tr>";

  	for($n=0; $n<$nfilas; $n++){
  		$filas= mysqli_fetch_array($consulta);
  		$query = "SELECT nombre, email FROM usuario WHERE id_usuario =  ".$filas['id_usuario'];
		$resultado1 = $connect->query($query);
		$var = $resultado1->fetch_assoc();


  		echo "<tr>
  			  <td width='180'>".$filas['id_factura']."</td>
  			  <td width='180'>".$var['nombre']."<br>(".$var['email'].")</td>
            <td width='180'>".$filas['fecha']."</td>
            <td width='180'>".$filas['fecha_entrega']."</td>
            <td width='180'><b>$".$filas['total_si_desc'].".00 MXN</b><br>
            <td width='180'><b>".$filas['estado']."</b></td>
            <td width='180'><a class='button' href='compraDetalle.php?factura=".$filas['id_factura']."'>Mostrar detalle</a></td>
  			    </tr>";

  	}
  	echo "</table></form><br>";
	?>

	<?php include "pie.php" ?>

</body>
</html>