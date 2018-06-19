<?php
	$mysqli = new mysqli("localhost","root","","morango"); 
	
	if(mysqli_connect_errno()){
		echo 'Error de conexión: ', mysqli_connect_error();
		exit();
	}
	require 'fpdf181/fpdf.php';

	$usuario = $_SESSION["username"];
	
	class PDF extends FPDF{
		function Header(){
			global $usuario;
			global $mysqli;
			$query = "SELECT id_usuario FROM usuarios WHERE email ='$usuario'";
			$row = $mysqli->query($query);

			//$usuario_factura = $row->fetch_assoc();

			//$query = "SELECT MAX(id_factura) FROM factura WHERE id_usuario = ".$usuario_factura;
			//$row = $mysqli->query($query);

			//$numfactura = $row->fetch_assoc();
			$this->Image('morango.jpg', 5, 5, 30 );
			$this->Cell(0, 20,'Factura #',0,0,'C');

			
			
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Facturacion de compra',0,0,'C');
			$this->Ln(20);
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Facturacion de compra',0,0,'C');
			$this->Ln(20);
		}
		
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Página '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>