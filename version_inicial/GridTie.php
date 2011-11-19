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

//read casos
$caso= //input to function

//find all grid tie devices used in this case (buscar dispositivos en el caso con ce_dispositivos:tipo=4) make a list

//for each fv (ce_dispositivo) en ce_casos make response table ce_fotovoltaico_respuesta_XXc (XX=ce_casos:ID)
//crear una table con una fila para cada mes. Uso el tabla "HorarsDelMes" como base para como larga esta la tiempo.


while () {  //cycle through each dispositivo
	//make tabe called ce_gridTie_"$caso"caso
	//for each response table ce_fotovoltaico_respuesta_XXc (XX=ce_casos:ID) sum all the values in each month and add the monthly values to ce_gridTie_XXcaso.
}

?>