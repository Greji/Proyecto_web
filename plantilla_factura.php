<?php
	//$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");
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
			$query = "SELECT id_usuario, nombre, email, telefono FROM usuario WHERE nombre =  ".$_SESSION['username'];
			//$query = "SELECT id_usuario, nombre, email, telefono FROM usuario WHERE nombre =  Greta Jimena";
			$resultado1 = $mysqli->query($query);
			$query = "SELECT MAX(id_factura), fecha FROM factura WHERE id_usuario =  ".$resultado1['id_usuario']; //modificar para consultar productos
			$row = $mysqli->query($query);

			//$usuario_factura = $row->fetch_assoc();

			//$query = "SELECT MAX(id_factura) FROM factura WHERE id_usuario = ".$usuario_factura;
			//$row = $mysqli->query($query);

			//$numfactura = $row->fetch_assoc();
			$this->Image('morango.jpg', 5, 5, 60 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			
			$this->Cell(120,10, 'Factura de compra #'.$row['id_factura'],0,0,'C');
			$this->Ln(20);
		}
		
		function Footer(){
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Página '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>