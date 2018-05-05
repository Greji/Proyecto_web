<?php


$connect = new mysqli("localhost", "root", "", "morango");
//$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");

if(mysqli_connect_error()){
	die("Error al conectar: " .mysql_error());
	include("registro1.php"); 
}
else{
	

	if(substr($tarjeta,0,1) == '3')
		echo '<script>alert("La tarjeta ingresada es American Express.")</script>';
	if(substr($tarjeta,0,1) == '4')
		echo '<script>alert("La tarjeta ingresada es Visa.")</script>';
	if(substr($tarjeta,0,1) == '5')
		echo '<script>alert("La tarjeta ingresada es Mastercard.")</script>';
	if(substr($tarjeta,0,1) == '6')
		echo '<script>alert("La tarjeta ingresada es Discovery Card.")</script>';

	echo '<script>alert("Tus datos han sido ingresados correctamente")</script>';
		
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$estado=mysqli_real_escape_string($connect, $_POST['estado']);
		$ciudad=mysqli_real_escape_string($connect, $_POST['ciudad']);
		$colonia=mysqli_real_escape_string($connect, $_POST['colonia']);
		$cp=mysqli_real_escape_string($connect, $_POST['cp']);
		$calle=mysqli_real_escape_string($connect, $_POST['calle']);
		$ext=mysqli_real_escape_string($connect, $_POST['ext']);
		$inte=mysqli_real_escape_string($connect, $_POST['inte']);
		$cant_cp=strlen($cp);

		
		if(isset($estado)&&isset($ciudad)&&isset($colonia)&&isset($ciudad)&&isset($cp)&&isset($calle)&&is_numeric($ext)){
			if($cant_cp==5){

				$hola=mysqli_query($connect,"SELECT MAX(id_usuario) as usuario  FROM usuario");

				$row = mysqli_fetch_row($hola);
				



				mysqli_query($connect, "INSERT INTO direcciones (calle, inte, ext, colonia, ciudad, estado, codigo_postal, id_usuario) VALUES('$calle', '$inte', '$ext', '$colonia', '$ciudad', '$estado', '$cp', '$row[0]')") or die('<script>alert("Murio")</script>');

				header("Location: registrate3.php");

			}
			else
				echo '<script>alert("Favor de ingresar datos válidos.")</script>';
		}
		else
			echo '<script>alert("Favor de llenar todos los campos")</script>';
	}
}
?>