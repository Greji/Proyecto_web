<!DOCTYPE html>
<html>
<head>
	<title>Modificar Descuentos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" href="icono.ico" /> 
	<meta charset="utf-8">
</head>
<body>

	<?php
		include 'menuAdministrador.php';
		$connect = new mysqli("localhost", "root", "", "morango");

   		if(mysqli_connect_error()){
   			die("Error al conectar: " .mysql_error());
   		}

		if (isset($_POST['modificar'])) {
			$cantidad1 = $_POST['numeroPrendas1'];
			$cantidad2 = $_POST['numeroPrendas2'];
			$cantidad3 = $_POST['numeroPrendas3'];

			$descuento1 = $_POST['descuento1'];
			$descuento2 = $_POST['descuento2'];
			$descuento3 = $_POST['descuento3'];

			echo "hola2";
			echo $cantidad1;

			$id_descuento = 1;
		
		    mysqli_query($connect, "UPDATE descuentos SET cantidad_articulo='$cantidad1', porcentaje='$descuento1' WHERE id_descuento=1");
		    mysqli_query($connect, "UPDATE descuentos SET cantidad_articulo='$cantidad2', porcentaje='$descuento2' WHERE id_descuento=2");
		    mysqli_query($connect, "UPDATE descuentos SET cantidad_articulo='$cantidad3', porcentaje='$descuento3' WHERE id_descuento=3");
		}

	?>
	<form id="formDescuento" name="formDescuento" action="descuentoAdministrador.php" method="POST" align="center"> 
		<table border=2px align="center">
			<tr>
	            <td><b>Descuento</b></td>
	            <td><b>Artículos</b></td>
	            <td><b>Porcentaje de descuento</b></td>
			</tr>
			<tr>
	            <td>#1</td>
	            <td>A partir de <input type="text" name="numeroPrendas1" id="numeroPrendas1" size="1"/> artículos</td>
	            <td><input type="text" id="descuento1" name="descuento1" size="1"/> % sobre el total</td>
			</tr>
			<tr>
	            <td>#2</td>
	            <td>A partir de <input type="text" name="numeroPrendas2" id="numeroPrendas2" size="1"/> artículos</td>
	            <td><input type="text" id="descuento2" name="descuento2" size="1"/> % sobre el total</td>
			</tr>
			<tr>
	            <td>#3</td>
	            <td>A partir de <input type="text" name="numeroPrendas3" id="numeroPrendas3" size="1"/> artículos</td>
	            <td><input type="text" id="descuento3" name="descuento3" size="1"/> % sobre el total</td>
			</tr>
		</table><br>
		<input type="submit" name="modificar" value="Modificar descuentos" style="background-color: #000; border: none; color: white;padding: 25px 60px;text-align: center;font-weight: bold;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;" />
	</form>

	<?php

   		$consulta=mysqli_query($connect,"SELECT * FROM descuentos" );
    	$nfilas = mysqli_num_rows ($consulta);
    	$nfilas = mysqli_num_rows ($consulta);    	

    	$descuento = array(
    		1 => 0, 
    		2 => 0, 
    		3 => 0
    	);

    	$cantidad = array(
    		1 => 0, 
    		2 => 0, 
    		3 => 0
    	);

    	for ($i=1; $i <= $nfilas ; $i++) { 
    		$filas= mysqli_fetch_array($consulta);
    		$descuento[$i] = $filas['porcentaje'] ;
    		$cantidad[$i] = $filas['cantidad_articulo'];
    	}
	?>

	<script type="text/javascript">

		var d1 = "<?php echo $descuento['1'];  ?>";
		var d2 = "<?php echo $descuento['2'];  ?>";
		var d3 = "<?php echo $descuento['3'];  ?>";

		document.getElementById('descuento1').value=d1;
		document.getElementById('descuento2').value=d2;
		document.getElementById('descuento3').value=d3;

		var c1 = "<?php echo $cantidad['1'];  ?>";
		var c2 = "<?php echo $cantidad['2'];  ?>";
		var c3 = "<?php echo $cantidad['3'];  ?>";

		document.getElementById('numeroPrendas1').value=c1;
		document.getElementById('numeroPrendas2').value=c2;
		document.getElementById('numeroPrendas3').value=c3;

	</script>
</body>
</html>