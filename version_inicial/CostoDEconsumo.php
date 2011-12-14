<?php    
/* A program to calculate value of all costs for consumpiton for all the cases listed in ce_casos, including CFE, Water, Gas LP, CO2 etc... for the calculado_energetico.
 
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
$medidor=// is a table ce_medidorCFE_XXcaso
$tarrifa= //=ce_consumo:factores(5)        
$TableTarrifa= //the corresponding ce_tarrifa_($tarrifa)tt table

$FetchaInicio= //the ID of the row in $TableTarrifa with the date equal to the first date on $medidor 
$FetchaFinal= //the earliest of the last dates in the ce_tarrifa_XXtt or ce_medidorCFE_XXcaso table
$tipoList= //subset of ce_tarrifas_tipo with 'tipo=$tarrifa'
//store the winter and summer ranges

//for 1, 1A, 1B, 1C, 1D, 1E, 1F
//inverno en Baja California es 01-04 y 10-12
//verano en Baja California es 05-09

//for HM 
//verano es Del 1º de mayo al sábado anterior al último domingo de octubre
//inverno es Del último domingo de octubre al 30 de abril

$date=$FetchaInicio;
if($tarrifa=$domestico){//is of the list 1, 1A, 1B, 1C, 1D, 1E, 1F
	while ($date<$FetchaFinal){
		$value= //ce_medidorCFE_XXcaso(tiempo=$date,valor)
		if($value<$lim_BASICO){//apyly BajoConsumo
		}
		else{//apply AltaConsumo
		}
	}

}//app

$epoca= //string with start and stop dates for 
//epoc divids the year to summer and winter pricing, in our case it is used with 'tipo' to select a in the 'ce_tarrifas_tipos' table       

if (){ //if ce_medidorCFE_YYcaso does not exist then run medidor.php	
}
//cycle through the entries of ce_medidorCFE_YYcaso
//take the difference between one row and the next, use as the energy used that month (if bimesual the do this for two months)

// is the tarrifa domestic or comercial




?>