<?php 
//azFV y altFV estan medicaciones de la normal del FV y son en RAD donde azFV=0 es norte y sube en rotatacion a la este, seria pi a S.
//altFV es 0 cuando esta puntando a la horizon y pi/2 cuando esta puntando a la horizon


//$list=array(1001, "Las Playitas", 31.860884, -116.646845, 30, 30, 0, "");
//$list=array(1002, "Rancho Valle", 31.962957, -116.655998, 97, 82, 0, "");
//$list=array(1003, "CICESE-FisicaAplicada", 31.868674, -116.664655, 44, 32, -9.6, "");
$theta=pi();
$phi=60*pi()/180;
$phi2=90*pi()/180;
$phi3=45*pi()/180;
$phi4=110*pi()/180;

//$list=array(32, 1.58, 0.790, $theta,$phi, 1.6 ,21.6, 0,0,0,""); //Sanyo HIP-214NKHE5 en Las Playitas
//$list=array(32, 1.58, 0.790, $theta,$phi2, 1.6 ,21.6, 0,0,0,""); // en Las Playitas
//$list=array(34, 1.58, 0.790, $theta,$phi3, 1.6 ,21.6, 0,0,0,""); // En CICESE-FisicaAplicada
$list=array(33, 1.58, 0.790, $theta,$phi4, 1.6 ,21.6, 0,0,0,""); // En Rancho Valle

$terreno=$list[0];
$delL=$list[1];
$delH=$list[2];
$azFV=$list[3];
$altFV=$list[4];
$IR=$list[5];
$QE=$list[6];
$x=$list[7];
$y=$list[8];
$z=$list[9];
$respuesta=$list[10];

// Connects to your Database 
//$con=mysql_connect("158.97.19.235", "rodger", "comp4510n"); // para Rodger
$con=mysql_connect("127.0.0.1", "root", "");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
 }

mysql_select_db("calculador", $con); 

$sql = "INSERT INTO ce_fotovoltaico (terreno,delL,delH,azFV,altFV, IR, QE,x,y,z, respuesta) VALUES  ('$terreno','$delL','$delH','$azFV','$altFV','$IR','$QE','$x','$y','$z', '$respuesta')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added \n";

// Collects data from "terreno" table 
 $data = mysql_query("SELECT * FROM ce_fotovoltaico WHERE terreno='$terreno'") 
 or die(mysql_error());

// puts the "friends" info into the $info array 
//$info = mysql_fetch_array( $data );

// Print out the contents of the entry 
while ($row = mysql_fetch_array($data)) {
	echo $row['terreno'] . " " . $row['delL'] . " " . $row['delH'] . " " .$row['azFV'] . " " .$row['altFV']. " " .$row['IR']. " " .$row['QE']. " " .$row['$x']. " " .$row['$y']. " " .$row['$z']. " " .$row['respuesta'] . "\n";
}

mysql_close($con)
?>


