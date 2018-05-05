<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="diseno_articulos.css">
  <link rel="stylesheet" type="text/css" href="Estilo.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="icono.ico" /> 
  <meta charset="utf-8">
</head>
<body>

    <div>
      <?php include 'menu.php';?>
    </div>

    <?php

	  	//$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");
	  	$connect = new mysqli("localhost", "root", "", "morango");
	  	if(mysqli_connect_error())
	  		die("Error al conectar: " .mysql_error());

	  	if(isset( $_GET['producto'])){
	  		$producto = $_GET['producto'];
	  	}
	  	else
	  		$producto = 0;

	    $consulta=mysqli_query($connect,"SELECT * FROM producto WHERE id_producto='$producto'");

		$nfilas = mysqli_num_rows ($consulta);

		for($n=0; $n<$nfilas; $n++){
			$filas= mysqli_fetch_array($consulta);

		function fechita($fecha){
			$dia = date("d");
			$mes = date("m");
			$anno = date("Y");
			$j = 0;
			for ($i = 0; $i < 3; $i++){
				do{
					$day = date("w", mktime(0, 0, 0, $mes, ($dia + $j), $anno));
					$j++;
				}while($day == "5" || $day == "6");
			}
			global $date;
			global $M;
			$M = "";
			global $l;
			$l = "";
			//$dat = date("d", mktime(0, 0, 0, $mes, ($dia + $j), $anno));
			$date = date("d", mktime(0, 0, 0, $mes, ($dia + $j), $anno));
			$semana = date("l", mktime(0, 0, 0, $mes, ($dia + $j), $anno));
			$mes = date("M", mktime(0, 0, 0, $mes, ($dia + $j), $anno));
			if ($semana == "Monday")	$l = "lunes";	if ($semana == "Tuesday")	$l = "martes";	if ($semana == "Wednesday")	$l = "miércoles";
			if ($semana == "Thursday")	$l = "jueves";	if ($semana == "Friday")	$l = "viernes";	
			if ($mes == "Juanuary")	$M = "enero";	if ($mes == "February")	$M = "febrero";	if ($mes == "March")	$M = "marzo";	
			if ($mes == "April")	$M = "abril";	if ($mes == "May")	$M = "mayo";	if ($mes == "May")	$M = "mayo";	
			if ($mes == "May")	$M = "mayo";	if ($mes == "June")	$M = "junio";	if ($mes == "July")	$M = "julio";	
			if ($mes == "August")	$M = "agosto";	if ($mes == "September")	$M = "septiembre";	if ($mes == "October")	$M = "octubre";	
			if ($mes == "November")	$M = "noviembre";	if ($mes == "December")	$M = "diciembre";			
		}

		$hoy = date("d M Y");
		fechita($hoy);

		echo("<div class='hola'> <div class='responsive'>
	      		<div class='gallery'><a href='producto_desc.php?producto=".$filas['id_producto']."'>
	      		<img src='".$filas['direccion']."' alt='".$filas['nombre']."' width='300' height='200'></a>
		        <div class='desc'>".$filas['nombre']." 
		        <br>Precio:  $".$filas['precio']." 
		        <br>
		        Talla:
		        <select name='talla'>
				  <option value='S'>S</option> 
				  <option value='M' selected>M</option>
				  <option value='L'>L</option>
			  	</select>
			  	<br><input type='submit' class='boton' name='' value='Agregar al carrito' />
		        </div>
		      </div><br>
		      </div>
		      <div align='center' class='center'><H2> Si realizas tu pedido hoy, la fecha de entrega será el ".$l." ".$date." de ".$M."  (tres días hábiles) </H2></div>
		    </div>");
	}
  ?>

  <div class='clearfix'></div>
  <?php include "pie.php" ?>

</body>
</html>