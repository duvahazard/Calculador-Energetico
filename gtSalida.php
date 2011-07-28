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
include("db.inc.php"); // conexion a base de datos
include("funcionesCalculador.inc.php"); // incluir archivo con funciones utilizadas

$idterreno=32; // este es el id del terreno para el cual existe la tabla ce_camino_solar_32t

// Seccion para crear la tabla de gtsalida
$sql = "DROP TABLE IF EXISTS ce_gtsalida_t".$idterreno."";
mysql_query($sql,$con);

$sql = "CREATE TABLE ce_gtsalida_t".$idterreno." (
		 id INT PRIMARY KEY AUTO_INCREMENT,
		 tiempo TIMESTAMP,
		 ac110CL FLOAT(9,6),
		 ac110CS FLOAT(9,6))";

if (mysql_query($sql,$con))
	echo "\nTabla creada";
else
	die("\nError al crear tabla: " . mysql_error());

// Aqui comienza la revision de cada fotovoltaico del terreno en cuestion para saber si esta creado y si no crearle su tabla de ce_fotovoltaico_respuesta_txfvx
$sql = "SELECT ID, respuesta FROM ce_fotovoltaico WHERE terreno = '".$idterreno."'";
$result = mysql_query($sql,$con);

while ($row = mysql_fetch_array($result)) {
	$idfotovol = $row['ID'];
	$respuesta = $row['respuesta'];
	if (empty($respuesta)) {
		// Aqui se manda llamar la funcion para crear la tabla de fotorespuesta
		echo "Se manda llamar funcion con ".$idterreno." y ".$idfotovol.".";
		crear_tabla_fvrespuesta($idterreno, $idfotovol);
	}
	$nombreTablaRespuesta[] = $respuesta; // arreglo con acumulador del nombre de las tablas para irlas leyendo en la sumatoria mas adelante
}

// Variables para ir acumulando la sumatoria de los valores de ce_fotovoltaico_respuesta_tTERRENOfvFOTOVOLTAICO
$aeffSum;
$potenciaCSSum;
$potenciaCLSum;
$numTablaRespuesta = count($nombreTablaRespuesta);

// Seccion para leer los datos de las tablas ce_fotovoltaico_respuesta_tTERRENOfvFOTOVOLTAICO
$sql = "SELECT tiempo, aeff, potenciaCS, potenciaCL FROM ce_fotovoltaico_respuesta_t".$idterreno."fv".$idfotovol."";
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_array($result)) {
	$tiempo = $row['tiempo'];
	$aeff = $row['aeff'];
	$potenciaCS = $row['potenciaCS'];
	$potenciaCL = $row['potenciaCL'];
	
	// Aqui comienzan los calculos de GT Salida 
	


	// Hay que guardar los valores generados en la tabla de ce_gtsalida_tTERRENO
	$sql = "INSERT INTO ce_gtsalida_".$idterreno."t (tiempo, ac110CL, ac110CS) VALUES ('$tiempo','$ac110CL','$ac110CS)";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	echo "1 record added \n";

	
}
*/
?>