<?php
/* A program to
 
  Project Leader Rodger Evans, 2011-06-01
  sunnycanuck@gmail.com
  Collaborators Voxel Soluciones
  http://www.voxelsoluciones.com
  info@voxelsoluciones.com

  Published under the Creative Commons Attribution-ShareAlike 2.5 Generic (CC BY-SA 2.5) licence
  http://creativecommons.org/licenses/by-sa/2.5/

  Publicado bajo la Licencia Creative Commons Atribuci√≥n-CompartirIgual 2.5 M√©xico (CC BY-SA 2.5) 
  http://creativecommons.org/licenses/by-sa/2.5/mx/
  
*/

// estas 2 variables siguientes se tienen que proporcionar por el usuario
$idterreno=32; // este es el id del terreno para el cual existe la tabla ce_camino_solar_32t
$idfotovol=18; // este es el id del fotovoltaico para el cual se va a calcular la respuesta


// Connects to your Database 
//$con=mysql_connect("158.97.19.235", "rodger", "comp4510n"); // para Rodger
$con=mysql_connect("127.0.0.1", "root", "");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}
mysql_select_db("calculador", $con); 

// Seccion para crear la tabla de gtsalida
$sql = "DROP TABLE IF EXISTS ce_gtsalida_t32";
mysql_query($sql,$con);

$sql = "CREATE TABLE ce_gtsalida_t32t_fv8 (
		 id INT PRIMARY KEY AUTO_INCREMENT,
		 tiempo TIMESTAMP,
		 ac110CL FLOAT(9,6),
		 ac110CS FLOAT(9,6))";

if (mysql_query($sql,$con))
	echo "\nTabla creada";
else
	die("\nError al crear tabla: " . mysql_error());

// Seccion para leer los datos de la tabla ce_fotovoltaico_respuesta_32t
$sql = "SELECT tiempo, aeff, potenciaCS, potenciaCL FROM ce_fotovoltaico_respuesta_32t";
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_array($result)) {
	$tiempo = $row['tiempo'];
	$aeff = $row['aeff'];
	$potenciaCS = $row['potenciaCS'];
	$potenciaCL = $row['potenciaCL'];
	
	// Aqui comienzan los calculos de GT Salida

	
	// Hay que guardar los valores generados en la tabla de ce_gtsalida_32t
	$sql = "INSERT INTO ce_gtsalida_32t (tiempo, ac110CL, ac110CS) VALUES ('$tiempo','$ac110CL','$ac110CS)";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	echo "1 record added \n";

	//queremos $potencia $tiempo ,$Aper
	echo "\npotenciaCL = " . $potenciaCL . "\npotenciaCS = " . $potenciaCS ."\ntiempo = " . $tiempo . "\nAper = " . $Aper . "\nDaz= " . $Tperp . "\nDalt= " . $Tpar . "\n"; 
}

?>