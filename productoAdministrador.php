<!DOCTYPE html>
<head>
  <link rel="stylesheet" type="text/css" href="diseno_articulos.css">
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

  	echo "<form action='modificarProducto.php' method='POST' align='center'>
  			<table border=2px>";

    echo "<tr>
            <td><b>Imagen del producto</b></td>
            <td><b>Nombre del producto</b></td>
            <td><b>Descripción</b></td>
            <td><b>Precio unitario</b></td>
            <td><b>Existencias</b></td>
          </tr>";

  	for($n=0; $n<$nfilas; $n++){
  		$filas= mysqli_fetch_array($consulta);

  		echo "<tr>
  			  	<td><img src='".$filas['direccion']."' width='200' height='180'></td>
  			  	<td>".$filas['nombre']."</td>
            <td>".$filas['descripcion']."</td>
            <td width='100'>".$filas['precio']."</td>
            <td><b>".$filas['existencias']."</b> en stock. Agregar: <input type='text' name='agregarE' width='20'/> 
            <a class='button' href='existenciasDescuentos.php?producto=".$filas['id_producto']."'>Agregar productos</a></td>
  			    </tr>";

  	}
  	echo "</table></form><br>";
	?>

	<?php include "pie.php" ?>
	
	</body>
</html>

<!--  -->