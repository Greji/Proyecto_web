<!DOCTYPE html>

<head>
  <link rel="stylesheet" type="text/css" href="diseno_articulos.css">
  <link rel="shortcut icon" href="icono.ico" /> 
  <meta charset="utf-8">
</head>
<body>

    <div>
      <?php include 'menuAdministrador.php'; ?>
    </div>

    <?php

  	//$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");
  	$connect = new mysqli("localhost", "root", "", "morango");
  	if(mysqli_connect_error()){
  		die("Error al conectar: " .mysql_error());
  	}

  	
  	if(isset( $_GET['tipo'])){
  		$tipo = $_GET['tipo']; 
  	}
  	else{
  		$tipo = 0;
  	}

  	if($tipo == 0){
  		$consulta=mysqli_query($connect,"SELECT * FROM producto WHERE id_tipo='1' OR id_tipo='2' OR id_tipo='3' OR id_tipo='4' OR id_tipo='5' OR id_tipo='6'" );

  	}else if($tipo == 11){
  		$consulta=mysqli_query($connect,"SELECT * FROM producto WHERE id_tipo='7' OR id_tipo='8' OR id_tipo='9' OR id_tipo='10'" );

  	}else{
  		$consulta=mysqli_query($connect,"SELECT * FROM producto WHERE id_tipo='$tipo'");
  	}

    
	$nfilas = mysqli_num_rows ($consulta);



	echo "<form action='modificarProducto.php' method='POST'>
			<table border=2px>";

	for($n=0; $n<$nfilas; $n++){
		$filas= mysqli_fetch_array($consulta);


		echo "<tr>
			  	<td><img src='".$filas['direccion']."' width='100' height='90'></td>
			  	<td width='600'>".$filas['nombre']."</td>
			  	<input type='hidden' name='producto' value='".$filas['id_producto']."'>
			  	<td><input type='submit' name='modificar' value='Modificar'/></td>
			  </tr>";

			}

	echo "</table></form>";

	?>

	<?php include "pie.php"?>
	

	</body>
</html>