<?php    
/* A program to calculate the energy usage of lamparas, it will generate and fill the ce_lampara_XXcaso table for the calculado_energetico.
 
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
//look for casos ce_dispositivos:tipo=2
//for the above subset (called lamps) cycle through the cases
$caso=1;
while (){
	if{ //if there is a lamp with that case number
		//make the table ce_lampara_XXcaso with the same number of rows as HorasDelMes and with the same listing of year and month (first two columns) and add the reference to that table in the table ce_Casos:sequencia
		$potencia=;//ce_dispositivo:factor in kW
		while(){//cycle through the days of the week and make a list of the energy consumed on each day of the week; from ce_Casos:dispositivo_variables
			$energyDay=$potencia*($horaOFF-$horaON);
		}                                           
		while(){//cycle through each month in the list ce_lampara_XXcaso
		//mutiply the energy used in each day of the week by the number of those days in the month and put that value in the column ce_lampara_XXcaso:consumo_mes
		}
	}
}

?>