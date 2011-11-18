<?php    
/* A program to calculate the repayments for the purchase of all the dispositivos in a given case for the calculado_energetico.
 
  Project Leader Rodger Evans, 2011-11-09
  sunnycanuck@gmail.com
  LEARS de CICESE
  revans@cicese.mx
  Collaborators Voxel Soluciones
  http://www.voxelsoluciones.com
  info@voxelsoluciones.com

  Published under the Creative Commons Attribution-ShareAlike 2.5 Generic (CC BY-SA 2.5) licence
  http://creativecommons.org/licenses/by-sa/2.5/

  Publicado bajo la Licencia Creative Commons Atribuci√≥n-CompartirIgual 2.5 M√©xico (CC BY-SA 2.5) 
  http://creativecommons.org/licenses/by-sa/2.5/mx/
  
*/  
$interes=;//valor para intres en % compounded mensual
$anosRepago=;//tiempo para el repago de la prestamo           
$fetchaImpeso=;//fetcha para empesar prestamo
$caso= ;//numero de caso

//filter ce_casos para ver caso=$caso
$principal=0;//zero to start
while () {                    //loop through dispositivos in ce_Casos with caso=$caso
	$Dispositvo= ;//desde:ce_Casos:dispositivo ref:ce_dispositivos:ID de dispositivos para esto caso
	$costDispositvo= ;//valor de ce_dispositivos:precio_dispositivo+ce_dispositivos:precio_instalacion
	$NUM_dispositivo= ;//valor de ce_dispositivos:NUM_dispositivo
	$CostoTotal= $CostoTotal+$NUM_dispositivo*$costDispositvo;//

}	

$principal=$CostoTotal ;
$interesMensual=$interes/(12*100);
$numMes=$anosRepago*12;
$pagoMensual=$principal*$interesMensual/(1-(1+$interesMensual)^(-$numMes));

//en ce_costoDeConsumo insertar una fila para cada pago empezando en $fetchaImpeso para $numMes para el valor $pagoMensual.


?>  