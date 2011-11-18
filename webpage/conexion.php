<?php
$conn = mysql_connect("localhost", "root","" );
if(!$conn){
	die('Error en la conexi&oacute;n a la base de datos, consulte a su administrador...');
}
mysql_select_db("calculador", $conn);
			

?>