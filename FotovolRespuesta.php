<?php 

//el ID del fotovoltaico que quermos usar
$IDfotovol=1;//need to get the terreno ID to find the caminoSolar for that fotovol

// Connects to your Database 
$con=mysql_connect("158.97.19.235", "rodger", "comp4510n");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("ce_fotovoltaico", $con); 

$sql = "INSERT INTO ce_fotovoltaico (terreno,delL,delH,azFV,altFV, IR, QE,x,y,z, respuesta) VALUES  ('$terreno','$delL','$delH','$azFV','$altFV','$IR','$QE','$x','$y','$z', '$respuesta')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added \n";
$area= ;//delL*delH
$nI=1.000277;//indice de refracion en aire
$nT=1.54 ;//indice de refracion en vidrio =$IR

$QE= ;//desde FV =$QE

//todo abajo es para cada tiempo

$azS= ; //desde camino solar
$azFV= ; //desde FV, puedo ser un funccion de posicion solar

$altS= ; //desde camino solar
$altFV= ; //desde fotovoltaico, puedo ser un funccion de posicion solar

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

$potencia=$QE*$Aper*($Tpar+$Tperp)/2;
