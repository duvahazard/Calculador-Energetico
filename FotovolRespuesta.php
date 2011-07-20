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

// Seccion para crear la tabla de fotorespuesta
$sql = "DROP TABLE IF EXISTS ce_fotovoltaico_respuesta_t".$idterreno."fv".$idfotovol."";

mysql_query($sql,$con);

$sql = "CREATE TABLE ce_fotovoltaico_respuesta_t".$idterreno."fv".$idfotovol." (
		 id INT PRIMARY KEY AUTO_INCREMENT,
		 tiempo TIMESTAMP,
		 azFVt FLOAT(9,6),
		 altFVt FLOAT(9,6),
		 aeff FLOAT(9,6),
		 potenciaCS FLOAT(9,3),
		 potenciaCL FLOAT(9,3))";

if (mysql_query($sql,$con))
	echo "\nTabla creada";
else
	die("\nError al crear tabla: " . mysql_error());

// Ya que se creo la tabla de respuesta para el fotovoltaico correspondiente, hay que indicar en la tabla de los fotovoltaicos que ya se creo su tabla y ponerle el indicador
$nombretabla= "ce_fotovoltaico_respuesta_t".$idterreno."fv".$idfotovol.""; // nombre de la tabla del fotovoltaico que se genera
$sql = "UPDATE ce_fotovoltaico SET respuesta='".$nombretabla."' WHERE ID=".$idfotovol."";
$result = mysql_query($sql,$con);

// Seccion para leer los datos de la tabla ce_fotovoltaico
$sql = "SELECT terreno, delL, delH, azFV, altFV, IR, QE, x, y, z, respuesta FROM ce_fotovoltaico WHERE ID = ".$idfotovol."";
$result = mysql_query($sql,$con);
$row = mysql_fetch_array($result);
$terreno = $row['terreno'];
$delL = $row['delL'];
$delH = $row['delH'];
$azFV = $row['azFV'];
$altFV = $row['altFV'];
$IR = $row['IR'];
$QE = $row['QE']/100;
$x = $row['x'];
$y = $row['y'];
$z = $row['z'];
$r = $row['respuesta'];

// Seccion para leer los datos de la tabla ce_camino_solar_TERRENOt
$sql = "SELECT tiempo, az, alt, intcero, intuno FROM ce_camino_solar_".$idterreno."t LIMIT 43,60 ";
$result = mysql_query($sql,$con);
while ($row = mysql_fetch_array($result)) {
	$tiempo = $row['tiempo'];
	$azS = $row['az'];
	$altS = $row['alt'];
	$Icl = $row['intcero'];
	$Ics = $row['intuno'];

	// Comienzan calculos para cada registro
	$area= $delL*$delH; //desde FotoVoltaico
	$nI=1.000277; //indice de refracion en aire desde FotoVoltaico
	$nT=$IR; //indice de refracion en vidrio desde FotoVoltaico =$IR

	$daz=$azFV-$azS; //diferencia en azmuth
	$dalt=$altFV-$altS; //diferencia en altura

	$cosDaz=cos($daz);
	$cosDalt=cos($dalt);

	$dif=acos($cosDalt-cos($altS)*cos($altFV)*(1-cos($dz))); //diferencia en angulo en la normal de la FV 
	// y el sol igual angulo del rayo incidente

	$Aper=cos($dif)*$area; //area efectiva del FV (%)

	$thetaT=asin(sin($dif)*$nI/$nT); //angulo del rayo transmitido
	$sin2TH=sin(2*$thetaT)*sin(2*$dif);
	$sinSQ=(sin($dif+$thetaT))^2;
	$cosSQ=(cos($dif-$thetaT))^2;

	$Tpar=1-($sin2TH)/($sinSQ*$cosSQ); //T parallel
	$Tperp=1-($sin2TH)/$sinSQ;  //T perpendicular

	$potenciaCL=$Icl*$QE*$Aper*($Tpar+$Tperp)/2;         
	$potenciaCS=$Icl*$QE*$Aper*($Tpar+$Tperp)/2;//this should be CS !!
	
	// Hay que guardar los valores generados en la tabla de ce_fotovoltaico_reapuesta_txfvx
	$sql = "INSERT INTO ce_fotovoltaico_respuesta_t".$idterreno."fv".$idfotovol." (tiempo, azFVt, altFVt, aeff, potenciaCS, potenciaCL) VALUES ('$tiempo','$Tperp','$Tpar','$Aper', '$potenciaCS', '$potenciaCL')";

	if (!mysql_query($sql,$con))
	  {
	  die('Error: ' . mysql_error());
	  }
	echo "1 record added \n";

	//queremos $potencia $tiempo ,$Aper
	echo "\npotenciaCL = " . $potenciaCL . "\npotenciaCS = " . $potenciaCS ."\ntiempo = " . $tiempo . "\nAper = " . $Aper . "\nDaz= " . $Tperp . "\nDalt= " . $Tpar . "\n"; 
}
?>