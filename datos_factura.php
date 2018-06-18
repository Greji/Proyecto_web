<?php
$Productos = new SimpleXMLElement($xmlstr);
echo $Productos->producto[0]->nombre;
?>