<?php
	session_start();

	     //$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");
		$mysqli = new mysqli("localhost","root","","morango"); 
		
		if(mysqli_connect_errno()){
			echo 'Error de conexión: ', mysqli_connect_error();
			exit();
		}
		include "plantilla_factura.php";

		//date -> año, mes, día
		
		$query = "SELECT m.cantidad, m.id_producto, m.precio  FROM detalle_factura AS m INNER JOIN factura AS e ON m.id_factura=e.id_factura";
		$resultado = $mysqli->query($query);
		
		$pdf = new PDF();
		$pdf->SetFont('Arial','B',12);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		
		$pdf->SetFillColor(232,232,232);

		$pdf->Cell(90,6,'Datos del vendedor',1,0,'C',1);
		$pdf->Cell(90,6,'Datos del comprador',1,1,'C',1);

		$pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(255,255,255);

		$pdf->Cell(90,6,'MORANGO',1,0,'C',1);

		//$query = "SELECT id_usuario, nombre, email, telefono FROM usuario WHERE nombre =  ".$_SESSION['username'];
		$query = "SELECT nombre, email FROM usuario WHERE nombre =  Greta Jimena";
		$resultado1 = $mysqli->query($query);
		$query = "SELECT MAX(id_factura), fecha FROM factura WHERE id_usuario =  ".$resultado1['id_usuario']; 
		$resultado2 = $mysqli->query($query);
		$query = "SELECT id_producto, cantidad, precio FROM detalle_factura WHERE id_factura =  ".$resultado2['id_factura']; 
		$resultado3 = $mysqli->query($query);

		$pdf->Cell(90,6,$resultado1['nombre'],1,1,'C',1);
		$pdf->Cell(90,6,'Blvrd Puerta de Hierro 4965, Puerta de Hierro',1,0,'C',1);
		$pdf->Cell(90,6,$resultado1['email'],1,1,'C',1);
		$pdf->Cell(90,6,'45116 Zapopan, Jal.',1,0,'C',1);
		$pdf->SetFillColor(232,232,232);
		$pdf->Cell(90,6,$resultado2['fecha'],1,1,'C',1);

		$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(20,6,'Cantidad',1,0,'C',1);
		$pdf->Cell(70,6,'Producto',1,0,'C',1);
		$pdf->Cell(45,6,'Precio unitario',1,0,'C',1);
		$pdf->Cell(45,6,'Total de linea',1,1,'C',1);
		
		$pdf->SetFont('Arial','',10);
		$pdf->SetFillColor(255,255,255);
		
		/*while($row = $resultado3->fetch_assoc()){
			$query = "SELECT nombre FROM producto WHERE id_producto =  ".$row['id_producto'];
			$resultado1 = $mysqli->query($query);

			$var = $resultado1->fetch_assoc();

			$pdf->Cell(20,6,$row['cantidad'],1,0,'C');
			$pdf->Cell(70,6,utf8_encode($var['nombre']),1,0,'C');
			$pdf->Cell(20,6,$row['precio'],1,0,'C');
			$totaldelinea = $row['cantidad'] * $row['precio'];
			$pdf->Cell(20,6,$totaldelinea,1,1,'C');
		}
		*/

		$query = "SELECT e.total_no_desc, e.total_si_desc  FROM detalle_factura AS m INNER JOIN factura AS e ON m.id_factura=e.id_factura";
		$resultado0 = $mysqli->query($query);

		$pdf->SetFont('Arial','B',12);
		$pdf->SetFillColor(232,232,232);
		$pdf->Cell(90,6,'Total de la compra',1,0,'C');
		$pdf->SetFont('Arial','',10);
		//$pdf->Cell(90,6,'$'.$resultado0['e.total_si_desc'].'.00 MXN',1,0,'C');

		$pdf->Output();
	?>