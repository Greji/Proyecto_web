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
			if ($mes == "Jan")	$M = "enero";	if ($mes == "Feb")	$M = "febrero";	if ($mes == "Mar")	$M = "marzo";	
			if ($mes == "Apr")	$M = "abril";	if ($mes == "May")	$M = "mayo";	if ($mes == "Jun")	$M = "junio";	
			if ($mes == "Jul")	$M = "julio";	if ($mes == "Aug")	$M = "agosto";	if ($mes == "Sep")	$M = "septiembre";	
			if ($mes == "Oct")	$M = "octubre";	if ($mes == "Nov")	$M = "noviembre";	if ($mes == "Dec")	$M = "diciembre";			
		}

		$hoy = date("d M Y");
		fechita($hoy);

		echo("<div class='hola'> <div class='responsive'>
	      		<div class='gallery'><a href='producto_desc.php?producto=".$filas['id_producto']."'>
	      		<img src='".$filas['direccion']."' alt='".$filas['nombre']."' width='300' height='200'></a>
		        <div class='desc' style='margin-top: -10%;'><i><H3>".$filas['nombre']."</H3></i>
		        <b>Precio:  </b>$".$filas['precio']." 
		        <br>
<<<<<<< HEAD
		        <form action='carrito.php' method='post'>
		        <input type='hidden' name='id_producto' value='".$filas['id_producto']."'>
		        <input type='hidden' name='direccion' value='".$filas['direccion']."'>
		        <input type='hidden' name='nombre' value='".$filas['nombre']."'>
		        <input type='hidden' name='precio' value='".$filas['precio']."'>
		        Cantidad <br>
		        <input type='button' id='menos' name='menos' value='-' onclick='decrementar();' /> 
		        <input type='text' id='cantidad' name='cantidad' value='1' width='30px'/> <input type='button' id='mas' name='mas' value='+' onclick='agregar();' /> 
			  	<br><input type='submit' class='boton' name='' value='Agregar al carrito' /> </form>
=======
			  	<br><input type='submit' class='button' name='' value='Agregar al carrito' style='background-color: #000; border: none; color: white;padding: 25px 60px;text-align: center;font-weight: bold;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;  margin-bottom: -10%;'/>
>>>>>>> 7c76ebed11bb8c40ecf862f60b61b0dd3ed09412
		        </div>
		      </div><br>
		      </div>
		      <div align='center' class='center'><H3><i>".$filas['descripcion']."</i></H3><br>
		      <H2> Si realizas tu pedido hoy, la fecha de entrega será el ".$l." ".$date." de ".$M." (tres días hábiles) </H2></div>
		    </div>");
	}
  ?>

  <div class='clearfix'></div>



  <script type="text/javascript">
  	
  	function agregar(){

  		 

  		document.getElementById('cantidad').value++;
  	}

  	function decrementar(){

  		var aux =document.getElementById('cantidad').value;

  		if (aux > 1) {
  			document.getElementById('cantidad').value--;
  		}
  	}


  </script>

  <?php include "pie.php" ?>

</body>
</html>