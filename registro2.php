<?php


//$connect = new mysqli("localhost", "root", "", "morango");
$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");

if(mysqli_connect_error()){
	die("Error al conectar: " .mysql_error());
}
else{
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$estado=mysqli_real_escape_string($connect, $_POST['estado']);
		$ciudad=mysqli_real_escape_string($connect, $_POST['ciudad']);
		$colonia=mysqli_real_escape_string($connect, $_POST['colonia']);
		$cp=mysqli_real_escape_string($connect, $_POST['codigo_postal']);
		$calle=mysqli_real_escape_string($connect, $_POST['calle']);
		$ext=mysqli_real_escape_string($connect, $_POST['ext']);
		$int=mysqli_real_escape_string($connect, $_POST['inte']);
		$cant_cp=strlen($codigo_postal);

		
		if(isset($estado)&&isset($ciudad)&&isset($colonia)&&isset($ciudad)&&isset($cp)&&isset($calle)&&is_numeric($ext)){
			if($cant_cp==5){
				mysqli_query($connect,"INSERT INTO `direcciones` (`calle`, `inte`, `ext`, `colonia`, `ciudad`, `estado`, `cp`, `id_usuario`) VALUES ('$calle', '$int', '$ext', '$colonia', '$ciudad', '$estado', '$cp', '$_SESSION[nombre]')");
					header("Location: registrate3.php");
			}
			else{
				echo '<script>alert("Favor de ingresar datos válidos.")</script>';
				header("Location: registrate2.php");
			}
		}
		else{
			echo '<script>alert("Favor de llenar todos los campos")</script>';
			header("Location: registrate2.php");
		}
	}
}
?>