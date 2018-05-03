<?php
//$connect = new mysqli("localhost", "root", "", "morango");
$connect = new mysqli("localhost", "id4738320_admin", "morango123", "id4738320_morango");
if(mysqli_connect_error()){
	die("Error al conectar: " .mysql_error());
}
else{
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$nombre=mysqli_real_escape_string($connect, $_POST['nombre']);
		$password=mysqli_real_escape_string($connect, $_POST['contrasena1']);
		$confirm_pass=mysqli_real_escape_string($connect, $_POST['contrasena2']);
		$correo=mysqli_real_escape_string($connect, $_POST['correo1']);
		$confirm_correo=mysqli_real_escape_string($connect, $_POST['correo2']);
		$telefono=mysqli_real_escape_string($connect, $_POST['telefono']);
		$tar1=mysqli_real_escape_string($connect, $_POST['tar1']);
		$tar2=mysqli_real_escape_string($connect, $_POST['tar2']);
		$tar3=mysqli_real_escape_string($connect, $_POST['tar3']);
		$tar4=mysqli_real_escape_string($connect, $_POST['tar4']);
		$cvv=mysqli_real_escape_string($connect, $_POST['cvv']);
		$mes=mysqli_real_escape_string($connect, $_POST['mes_exp']);
		$año=mysqli_real_escape_string($connect, $_POST['ano_exp']);
		$sexo=mysqli_real_escape_string($connect, $_POST['genero']);
		$cant_cvv=strlen($cvv);

		if(isset($nombre)&&isset($password)&&isset($confirm_pass)&&isset($correo)&&isset($confirm_correo)&&isset($telefono)&&isset($tar1)&&isset($tar2)&&isset($tar3)&&isset($tar4)&&isset($cvv)&&isset($mes)&&isset($año)&&$sexo!='null'){
			$tarjeta= $tar1 . $tar2 . $tar3 . $tar4;
			$cant_tarjeta=strlen($tarjeta);
			$auth=mysqli_query($connect,"SELECT * FROM usuario WHERE nombre='$nombre'");
			if(mysqli_num_rows($auth)==1)
				echo '<script>alert("Este usuario ya está registrado")</script>';
			else{
				if($password==$confirm_pass&&$correo==$confirm_correo&&is_numeric($tarjeta)&&$cant_tarjeta==16&&is_numeric($cvv)&&$cant_cvv==3){
					$_SESSION['registro']=$username;
					mysqli_query($connect,"INSERT INTO `usuario` (`id_genero`, `nombre`, `contrasena`, `email`, `telefono`, `tarjeta`, `cvv`, `mes_exp`, `ano_exp`,) VALUES ('$sexo', '$nombre', sha('$password'), '$correo', '$telefono', '$tarjeta', '$cvv', '$mes', '$año')");
					header("Location: registrate2.php");
				}
				else	{	
					echo '<script>alert("Favor de llenar los campos correctamente")</script>';	
					header("Location: registrate1.php");
				}		
			}
		}
		else{
			echo '<script>alert("Favor de llenar todos los campos")</script>';
			header("Location: registrate1.php");
		}
	}
}
?>