<?php
	$mysqli = new mysqli("localhost","root","","morango"); 
	
	if(mysqli_connect_errno()){
		echo 'Error de conexión: ', mysqli_connect_error();
		exit();
	}
	require 'fpdf/fpdf.php';

	$usuario = $_SESSION["username"];
	
	class PDF extends FPDF
	{
		function Header()
		{
			$this->Image('morango.jpg', 5, 5, 30 );
			$this->Cell(0, 20,'Factura #',0,0,'C');

			$query = "SELECT m.id_factura FROM detalle_factura AS m INNER JOIN factura AS e ON m.id_factura=e.id_factura";
			

			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Facturación de compra',0,0,'C');
			$this->Ln(20);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Facturación de compra',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Página '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>