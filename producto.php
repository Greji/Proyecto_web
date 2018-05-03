<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="diseno_articulos.css">
  <link rel="shortcut icon" href="icono.ico" /> 
  <meta charset="utf-8">
</head>
<body>

    <div>
      <?php include 'menu.php'; ?>
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

    $consulta=mysqli_query($connect,"SELECT * FROM producto WHERE id_tipo='$tipo'");
    //$consulta = mysqli_query($connect,"SELECT * FROM producto");

	 //

	$nfilas = mysqli_num_rows ($consulta);

	for($n=0; $n<$nfilas; $n++){
		$filas= mysqli_fetch_array($consulta);
		
		echo("<div class='responsive'>
      		<div class='gallery'><a href='producto_desc.php?producto=".$filas['id_producto']."'>
      		<img src='".$filas['direccion']."' alt='".$filas['nombre']."' width='300' height='200'></a>
        
	        <div class='desc'>".$filas['nombre']." <br> $".$filas['precio']." </div>
	      </div>
	    </div>");

    if((($n%4)==0) && $n!=0){
      echo "";
    }
	}
  ?>

  <div class='clearfix'></div>
  <?php include "pie.php" ?>

</body>
</html>