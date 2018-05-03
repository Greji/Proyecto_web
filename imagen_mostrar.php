<?php
	$mysqli = new mysqli("localhost", "root", "", "morango");
	if(mysqli_connect_error())
		die("Error al conectar: " .mysql_error());
	
	$result = $mysqli -> query("SELECT * FROM imagephp WHERE id = ".$_GET["id"]);
	$row = $result -> fetch_array(MYSQLI_ASSOC);
	header("Content-type:".$row["tipo"]);
	echo $row["imagen"];
?>