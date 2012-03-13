<?php    
/* A program to calculate predictions of tarrifs for the next 20 years using historic data from the last 4-5 years, part of the calculado_energetico.
 
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

//the basic premisis is to take old data, assume that the values are constantly increasing.

//make a list of the values of the tarrifa in question for a given month 
//for tarrifa in question, make a new table with the same number of rows as horasDelMes.
//ce_SIMtarrifas_XX=horasDelMes

$tarrifa=;//open correct ce_tarrifa_XXtt
$numValores=;//numero de valores en la tarrifa

$tarrifaSIM=;//open correct ce_SIMtarrifas_XX=horasDelMes
$numValoresSIM=;//numero de valores en la tarrifaSIM

$mes=01//enero
while ($mes<=12){//cycle through the months
	
	$tarrifaMES=;//filter list $tarrifa for months=$mes
 	$anoFinal=;//final ano en lista $tarrifaMES
	$numAno=length($tarrifaMES);//numero de anos que estamos usando
	$avDevMes= //The AVEDEV function returns the average of the difference of a collection of numbers from their average (arithmetic mean).
	
	$tarifaMesSIM=;//filter list $tarrifaSIM for months=$mes
 	$anoFinalSIM=;//final ano en lista $tarrifaMesSIM
	$numAnoSIM=length($tarrifaMES);//numero de anos que estamos simulando
	
	$ano=;//first year in $tarrifaMesSIM
	while($ano<=$anoFinalSIM){
		ce_SIMtarrifas_XX:($valores, $ano)=ce_tarrifa_XXtt:($valor,$anoFinal)+($ano-$anoFinal)*$avDevMes;
	}
}

?>