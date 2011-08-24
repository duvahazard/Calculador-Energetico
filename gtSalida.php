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
		 ac110CL FLOAT(12,6),
		 ac110CS FLOAT(12,6))";

if (mysql_query($sql,$con))
	echo "\nTabla creada\n";
else
	die("\nError al crear tabla: " . mysql_error() . "\n");

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
	$numFotovol[] = $idfotovol; // arreglo con acumulador de los id de lso fotovoltaicos de un terreno para hacer el ciclo para la sumatoria
}

// Variables para ir acumulando la sumatoria de los valores de ce_fotovoltaico_respuesta_tTERRENOfvFOTOVOLTAICO
$aeffSum;
$potenciaCSSum;
$potenciaCLSum;
$numTablaRespuesta = count($nombreTablaRespuesta);
$totalFotovol = count($numFotovol);

for ($i=0; $i<$totalFotovol; $i++) {
	echo "i = " .$i."\n";
	echo "Numero de FV = ".$numFotovol[$i]."\n";
	// Seccion para leer los datos de las tablas ce_fotovoltaico_respuesta_tTERRENOfvFOTOVOLTAICO
	$sql = "SELECT tiempo, aeff, potenciaCS, potenciaCL FROM ce_fotovoltaico_respuesta_t".$idterreno."fv".$numFotovol[$i]."";
	$result = mysql_query($sql,$con);
	//while ($row = mysql_fetch_array($result)) {
		$row = mysql_fetch_array($result);
		$tiempo = $row['tiempo'];
		$aeff = $row['aeff'];
		$potenciaCS = $row['potenciaCS'];
		$potenciaCL = $row['potenciaCL'];

		echo "tiempo = ".$tiempo." potenciaCS = ".$potenciaCS." potenciaCL = ".$potenciaCL."\n";
		
		$aeffSum += $aeff;
		$potenciaCSSum += $potenciaCS;
		$potenciaCLSum += $potenciaCL; 

		echo "potenciaCSSum = ".$potenciaCSSum." potenciaCLSum = ".$potenciaCLSum."\n";

		// id del ultimo record insertado

		// Hay que guardar los valores generados en la tabla de ce_gtsalida_tTERRENO
		
		if ($i==0) {
			$sql = "INSERT INTO ce_gtsalida_t".$idterreno." (tiempo, ac110CL, ac110CS) VALUES ('$tiempo','$potenciaCLSum','$potenciaCSSum')";
		}
		else {
			$sql = "UPDATE ce_gtsalida_t".$idterreno." SET tiempo='$tiempo', ac110CL='$potenciaCLSum', ac110CS) VALUES ('$tiempo','$potenciaCLSum','$potenciaCSSum')";
		}

		if (!mysql_query($sql,$con))
		  {
		  die('Error: ' . mysql_error());
		  }
		echo "1 record added \n";
		$ultimorecord = mysql_insert_id();
		echo "Ultimo record = ".$ultimorecord."\n";
	//}
}
?>