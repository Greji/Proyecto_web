<?php
if(isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['mensaje'])){
	$nombre=$_POST['nombre'];
	$correo=$_POST['correo'];
	$telefono=$_POST['telefono'];
	$comentario=$_POST['mensaje'];
	$asunto="Comentario en Morango";
	$asuntos="Nuevo comentario en Morango, por ".$nombre;
	$servidor='chionenoc@gmail.com';
	$mensaje="Tu comentario fue enviado";
	if ($telefono == !NULL){
		$opinion=$nombre.", con telefono ".$telefono." y correo ".$correo.", te ha enviado el siguiente mensaje: \r\n".$comentario;
	}
	else{
		$opinion=$nombre.", con  correo ".$correo.", te ha enviado el siguiente mensaje: \r\n".$comentario;
	}

	if(mail($servidor, $asuntos, $opinion) && mail($correo, $asunto, $mensaje)){
		echo "<script>alert('Correo enviado al servidor. Se le ha enviado un correo de confirmación');</script>";
	}
	else
	{
		echo "<script>alert('No se ha podido enviar el correo enviado al servidor');</script>";
	}
	
}
?>