<?php 

//el ID del fotovoltaico que quermos usar
//$IDfotovol=1;//need to get the terreno ID to find the caminoSolar for that fotovol
$IDfotovol=32; // este es el id del terreno para el cual existe la tabla ce_camino_solar_32t

// Connects to your Database 
$con=mysql_connect("158.97.19.235", "rodger", "comp4510n");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("ce_fotovoltaico", $con); 

// Seccion para crear la tabla de fotorespuesta

$sql = "DROP TABLE IF EXISTS CREATE DATABASE ce_fotovoltaico_respuesta_32t (
		 id INT PRIMARY KEY AUTO_INCREMENT,
		 tiempo TIMESTAMP,
		 azFVt FLOAT(9,6),
		 altFVt FLOAT(9,6),
		 aeff INT,
		 potenciaCS FLOAT(9,6),
		 potenciaCL FLOAT(9,6))";

if (mysql_query($sql,$con))
	echo "Base de datos creada";
else
	die('Error al crear base de datos: ' . mysql_error());

/////////////////////////

// Seccion para leer los datos de la tabla ce_fotovoltaico

$sql = "SELECT terreno, delL, delH, azFV, altFV, IR, QE, x, y, z, r FROM ce_fotovoltaico";
while ($row = mysql_fecth_array($sql)) {
	$terreno = $row['terreno'];
	$delL = $row['delL'];
	$delH = $row['delH'];
	$azFV = $row['azFV'];
	$altFV = $row['altFV'];
	$IR = $row['IR'];
	$QE = $row['QE'];
	$x = $row['x'];
	$y = $row['y'];
	$z = $row['z'];
	$r = $row['r'];
}

/////////////////////////

// Seccion para leer los datos de la tabla ce_camino_solar_32t

$sql = "SELECT tiempo, az, alt, intcero, intuno FROM ce_camino_solrar_32t";
while ($row = mysql_fecth_array($sql)) {
	$tiempo = $row['terreno'];
	$az = $row['delL'];
	$alt = $row['delH'];
	$incero = $row['azFV'];
	$intuno = $row['altFV'];
}

/////////////////////////


$sql = "INSERT INTO ce_fotovoltaico (terreno,delL,delH,azFV,altFV, IR, QE,x,y,z, respuesta) VALUES  ('$terreno','$delL','$delH','$azFV','$altFV','$IR','$QE','$x','$y','$z', '$respuesta')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added \n";
$area= ;//delL*del desde FotoVoltaico
$nI=1.000277;//indice de refracion en aire desde FotoVoltaico
$nT=1.54 ;//indice de refracion en vidrio desde FotoVoltaico =$IR

$QE= ;//desde desde FotoVoltaico =$QE
$altFV= ; //desde FotoVoltaico si azFV o altFV=var, puedo ser un funccion de posicion solar 
$azFV= ; //desde FotoVoltaico si azFV o altFV=var, puedo ser un funccion de posicion solar 

//todo abajo es para cada tiempo

$tiempo= ; //desde CaminoSolar
$Icl= ;//desde CaminoSolar
$Ics= ;//desde CaminoSolar    

$azS= ; //desde CaminoSolar
$altS= ; //desde camino solar

$daz=$azFV-$azS; //diferencia en azmuth
$dalt=$altFV-$altS;//diferencia en altura

$cosDaz=cos($daz);
$cosDalt=cos($dalt);

$dif=acos(sqrt($cosDalt^2+$cosDaz^2))//diferencia en angulo en la normal de la FV 
//y el sol egual angulo del rayo incidente

$Aper=cos($dif);//area efectivo del FV (%)

$thetaT=asin(sin($dif)*$nI/$nT); //angulo del rayo transmitido
$sin2TH=sin(2*$thetaT)*sin(2*$dif);//
$sinSQ=(sin($dif+$thetaT))^2;
$cosSQ=(cos($dif-$thetaT))^2;

$Tpar=($sin2TH)/($sinSQ*$cosSQ); //T parallel
$Tperp=($sin2TH)/$sinSQ;  //T perpendicular

$potenciaCL=$Icl*$QE*$Aper*($Tpar+$Tperp)/2;         
$potenciaCS=$Ics*$QE*$Aper*($Tpar+$Tperp)/2;
//we want $potencia $tiempo ,$Aper
