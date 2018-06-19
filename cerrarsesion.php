<!DOCTYPE html>
<html>
<head>
	<title>Cerrar sesión</title>
</head>
<body>
	<?php
		session_start();
		//session_destroy();
		session_abort();
		header("Location: Inicio.php");
	?>
</body>
</html>