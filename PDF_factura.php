<?php
	session_start();

		/* LA FACTURA DEBE INCLUIR: 
			DATOS DEL VENDEDOR: NOMBRE DE LA EMPRESA, DIRECCIÓN
			DATOS DEL COMPRADOR: NOMBRE, DIRECCIÓN
			DATOS DE LA FACTURA: NÚMERO, FECHA
			DATOS DE LA COMPRA: CANTIDAD DE CADA ARTÍCULO, NOMBRE, PRECIO UNITARIO, SUBTOTAL POR PRODUCTO Y TOTAL
		*/


	     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
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
		
		$pdf->Cell(20,6,'Cantidad',1,0,'C',1);
		$pdf->Cell(70,6,'Producto',1,0,'C',1);
		$pdf->Cell(50,6,'Precio unitario',1,0,'C',1);
		$pdf->Cell(50,6,'Total de linea',1,1,'C',1);
		
		$pdf->SetFont('Arial','',10);
		
		while($row = $resultado->fetch_assoc())
		{
			$query = "SELECT nombre FROM producto WHERE id_producto =  ".$row['id_producto'];
			$resultado1 = $mysqli->query($query);

			$var = $resultado1->fetch_assoc();

			$pdf->Cell(20,6,$row['cantidad'],1,0,'C');
			$pdf->Cell(70,6,utf8_encode($var['nombre']),1,0,'C');
			$pdf->Cell(20,6,$row['precio'],1,0,'C');
			$totaldelinea = $row['cantidad'] * $row['precio'];
			$pdf->Cell(20,6,$totaldelinea,1,0,'C');
		}

		$query = "SELECT e.total_no_desc, e.total_si_desc  FROM detalle_factura AS m INNER JOIN factura AS e ON m.id_factura=e.id_factura";

		$pdf->Output();
	?>