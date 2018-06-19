<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli = new mysqli("localhost","root","","morango"); 
	
	if(mysqli_connect_errno()){
		echo 'Error de conexión: ', mysqli_connect_error();
		exit();
	}
	require('fpdf.php');
	include "plantilla_factura.php";

	//date -> año, mes, día
	
	$query = "SELECT m.cantidad, m.producto, m.precio  FROM detalle_factura AS m INNER JOIN factura AS e ON m.id_factura=e.id_factura";

	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'Cantidad',1,0,'C',1);
	$pdf->Cell(70,6,'Producto',1,1,'C',1);
	$pdf->Cell(20,6,'Precio unitario',1,0,'C',1);
	$pdf->Cell(20,6,'Total de línea',1,0,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(70,6,utf8_decode($row['producto']),1,0,'C');
		$pdf->Cell(20,6,$row['id_municipio'],1,0,'C');
		$pdf->Cell(70,6,utf8_decode($row['municipio']),1,1,'C');
	}

	$query = "SELECT e.total_no_desc, e.total_si_desc  FROM detalle_factura AS m INNER JOIN factura AS e ON m.id_factura=e.id_factura";

	$pdf->Output();
?>