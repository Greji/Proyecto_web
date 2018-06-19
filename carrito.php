
<html lang="es-ES">
<head>
	<meta charset="UTF-8">
	<title>Ejemplo de carrito</title>
</head>
<body>
	<table>

<?php 

	include 'menu.php';

	$connect = new mysqli("localhost", "root", "", "morango");

	if(mysqli_connect_error()){
		die("Error al conectar: " .mysql_error());
	}


	$aCarrito = array();
	$sHTML = '';
	$fPrecioTotal = 0;

	//Vaciamos el carrito

	if(isset($_POST['vaciar'])) {
		unset($_COOKIE['carrito']);
	}

	//Obtenemos los productos anteriores

	if(isset($_COOKIE['carrito'])) {
		$aCarrito = unserialize($_COOKIE['carrito']);
	}

	//Anyado un nuevo articulo al carrito

	if(isset($_POST['id_producto']) && isset($_POST['cantidad'])) {

		$iUltimaPos = count($aCarrito);
		$aCarrito[$iUltimaPos]['id_producto'] = $_POST['id_producto'];
		$aCarrito[$iUltimaPos]['nombre'] = $_POST['nombre'];
		$aCarrito[$iUltimaPos]['direccion'] = $_POST['direccion'];
		$aCarrito[$iUltimaPos]['precio'] = $_POST['precio'];
		$aCarrito[$iUltimaPos]['cantidad'] = $_POST['cantidad'];
	}

	//Creamos la cookie (serializamos)

	$iTemCad = time() + (60 * 60);
	setcookie('carrito', serialize($aCarrito), $iTemCad);




	foreach ($aCarrito as $key => $value) {

		echo "<tr>
			<td><img src='".$value['direccion']."' width='100'></td>
			<td>".$value['nombre']."</td>
			<td>".$value['cantidad']."</td>
			<td>".$value['precio']*$value['cantidad']."</td></tr>";

			$fPrecioTotal += $value['precio'];
		}
		

	//Imprimimos el precio total

	$sHTML .= '<br>------------------<br>Precio total: ' . $fPrecioTotal;

?>


		
	</table>

	<?php echo $fPrecioTotal; ?>
</body>
</html>
