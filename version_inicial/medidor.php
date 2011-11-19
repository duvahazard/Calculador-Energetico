<?php    
/* A program to calculate the simulated and historic readings on a CFE meter for the calculado_energetico.
 
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

//reads ce_consumo, ce_Casos

//make a table called ce_medidorCFE_01caso that is the same format in number of rows as ce_HorasDelMes with ce_medidorCFE_01caso:fetcha taken from año y mes

//read the values for ce_consumo for tipo=3 (demanda_promedio_XXcc), if non exists then generate one (if more then one exists, delet both and make a new one).

//To make demanda_promedio_XXcc open ce_CFE_recibo_XXcc, for each value divide the value by the number of hours in that month (from ce_horasDelMes) and find the average of that month in all the years entered.

//fill in the value of lectura_actual from ce_consumo in factores in its corresponding row

//for rows befor the date of the lectura_actual use values from ce_CFE_recibo_XXcc value(i)=value(i+1)-ce_recibe_XXc:fetcha=(i)

//for rows after the date of the lectura_actual use value(i+1)= ce_demanda_promedio_XXcc*ce_HorasDelMes:num_horas+value(i)

?>