<?php
// Conexion a base de datos 
//$con=mysql_connect("158.97.19.235", "rodger", "comp4510n"); // para Rodger
$con=mysql_connect("127.0.0.1", "root", "");
if (!$con) {
  die('No se pudo conectar: ' . mysql_error());
}
mysql_select_db("calculador", $con);
?>