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
$veranoInicio=//desde ce_tarrifa_tipo:desde inverno en Baja California es 01-04 y 10-12
$veranoFinal=//ce_tarrifa_tipo:hasta verano en Baja California es 05-09

//for HM 
//verano es Del 1º de mayo al sábado anterior al último domingo de octubre
//inverno es Del último domingo de octubre al 30 de abril

if (){ //if ce_medidorCFE_YYcaso does not exist then run medidor.php	
}

$date=$FetchaInicio;
$pago=
if($tarrifa=$domestico){//is of the list 1, 1A, 1B, 1C, 1D, 1E, 1F
	while ($date<$FetchaFinal){         
		
		if(){  //add in check to see if the tarrifa should be DAC or other domestic
			$TableTarrifa=;//change to DAC or other domestic 
			$DAC=;//a boolean value to not if the torrif to be applied is DAC
		}                                                     
		
		$valor= //ce_medidorCFE_XXcaso(tiempo=$date,valor)     
		$TableTarrifaFTCH=//$TableTarrifa at $date
		//add in modifier to set tarrifas 1 to DAQ
		
		if($DAC=false){//apply regular domestic tarrifs  
			
			if($veranoInicio<$date<$veranoFinal){//el fetcha esta en temporada de verano, si no estaciones en este tarrifa el default es verano.
				$tarrifaClave=//el row de ce_tarrifa_tipo con epoca=verano; tipo=$tarrifa=
			}
			else(){
				$tarrifaClave=//el row de ce_tarrifa_tipo con epoca=inverno; tipo=$tarrifa=
			}
		
			if($valor<$lim_BASICO){//apyly BajoConsumo 
				$Pbb=;//basico_Bajo
				$Pib=;//intermedio_Bajo
				$Peb=;//excedente_Bajo
				$Bb=;//tt(lim_basico_B)
				$Ib=;//tt(lim_int_B)
				$Eb=;//tt(lim_Exc_B)
			
				$pago=$Pbb*min($valor-$Bb)+$Pib*max(0,min($valor, $Ib)-$Bb)+$Peb*max(0,min($valor,$Eb)-$Ib);
				}
				else(){//alta consumo
					$Pba=;//basico_Alta
					$Pia=;//intedmedio_Alta
					$Paa=;//alta_Alta
					$Pea=;//excedente_Alta
					$Ba=;//tt(lim_basico_A)
					$Ia=;//tt(lime_int_A)
					$Aa=;//tt(Alt_A)
					$Ea=;//tt(lim_Exc_A) 
			
					$pago=$Pba*min($valor,$Ba)+$Pia*max(0,min($valor, $Ia)-$Ba)+$Paa*max(0,min($valor,$Aa)-$Ia)+$Pea*max(0,min($valor,$Ea)-$Aa);
				}
			}
			else{//apply DAC 
				$Cfijo=;//ce_tarrifas_DACtt(carga_fijo)
				   
				if($veranoInicio<$date<$veranoFinal){//verano
					$Pp=;//ce_tarifas_DACtt(consumo)
				}
				else{//inverno
					$Pp=;
				}
				
				$pago=$P*$valor+$Cfijo;  
			}
		}
}//app
if($tarrifa=2){//is comercial 2,3
	while ($date<$FetchaFinal){ 

	$valor= //ce_medidorCFE_XXcaso(tiempo=$date,valor)     
	$TableTarrifaFTCH=//$TableTarrifa at $date
	//add in modifier to set tarrifas 1 to DAQ
		$Pbb=;//Tarifa_2tt(Basico)
		$Pib=;//Tarifa_2tt(Intermedio)
		$Peb=;//Tarifa_2tt(excidente)
		$Bb=; //tt(lim_basico_B)
		$Ib=;//tt(lim_int_B)
		$pago=$Pbb*min($valor-$Bb)+$Pib*max(0,min($valor, $Ib)-$Bb)+$Peb*max(0,$valor-$Ib);

	 }   
}
if($tarrifa=3){
	while ($date<$FetchaFinal){ 
		$valor= //ce_medidorCFE_XXcaso(tiempo=$date,valor)     
		$TableTarrifaFTCH=//$TableTarrifa at $date	   
		 
		$Pp=;//Tarifa_3tt(consumo)
		$Dd=
		$pago=$P*$valor;
	}
}
 
if($tarrifa=OM){
	while ($date<$FetchaFinal){ 
		$consumo= //ce_medidorCFE_XXcaso(tiempo=$date,consumo)    
		$demanda= //ce_medidorCFE_XXcaso(tiempo=$date,demanda)     
		$TableTarrifaFTCH=//$TableTarrifa at $date	   
		 
		$Pp=;//ce_tarifa_OMtt:consumo
		$Dd=;//ce_tarrifas_OMtt:demanda
		$pago=$P*$valor+$Dd*;
	}
}

if($tarrifa=HM){
	while ($date<$FetchaFinal){ 
		$consumo= //ce_medidorCFE_XXcaso(tiempo=$date,consumo)    
		$demanda= //ce_medidorCFE_XXcaso(tiempo=$date,demanda)
		    
	  
	}
}
    

if (){ //if ce_medidorCFE_YYcaso does not exist then run medidor.php	
}
//cycle through the entries of ce_medidorCFE_YYcaso
//take the difference between one row and the next, use as the energy used that month (if bimesual the do this for two months)

// is the tarrifa domestic or comercial




?>