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

//una program para generar ce_gridTie_YYcaso
$casoGridTie=;//in ce_Casos filter for gridTie (tipo=4)
$casoLength=;//length of $casoGridTie
$caso=1;
while ($caso<=$casoLength) {  //cycle through each grid tie
//make table ce_gridtie_XXc that has the same length and time stamps as ce_horasDelMes 
	$eff=;//ce_dispositivo:factores(2) (%)
	$mesTotal=0;//a vector to save the totals for each month, 1-12 for the months, 13 is a leap year where Feb has 29 days (this is done as cludge where the value from the 28th is just repeated.)
	$fotoVolList=;//dispositivo_variables from gridTie
	while(){//cycle through $fotoVolList
		if(){//the fotovoltaics used are referenced in dispositivo_variables; does each reference have a sequence of their response? ce_fotovoltaico_respuesta_02c, if not, run FotovolRespuesta.php to generate it
		}
		$mes=1;//start with the first month in 
		while($mes<=13){//cycle through the months in grid tie        
			if($mes=13){//this is for the leap year, sum for feb, but with 28th counted twice
				$mesList=;//filter the fotovol table to show just values for $mes=2
				$mesTotal($mes)=$mesTotal+;//sum all the values in ce_fotorespuesta for that month, multiply by $eff and add to mes total.
				}
				else(){
			$mesList=;//filter the fotovol table to show just values for $mes
			$mesTotal($mes)=$mesTotal+;//sum all the values in ce_fotorespuesta for that month, multiply by $eff and add to mes total
				}
		}
		$gridMes=1;//start in Jan
    while($gridMes<=12){//cycle through all months and set the same production values for each.
	$gridMesFilter=;//the grid tie filtered for months=$gridMes
	
	$gridMesFilter(produccion)=$mesTotal($gridMes);//set the production value to that from $mesTotal
	if($gridMes=2){//leave in only leap years (2012,2016,2020,2024,2028,2032,2036,2040,2044,2048,2052,2056,2060,2064,2068,2072,2076,2080,2084,2088,2092,2096)
		$gridMesFilter(produccion)=$mesTotal(13);
		}
	}
	}
	//gridTie
}

?>