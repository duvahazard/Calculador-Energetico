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

// Obtener con un Query sobre la tabla de casos solo los que sean de tipo 4 (gridTie)
$casosGridTie = mysql_query(query);
// Guardar en una variable el numero de registros de tipo 4 (gridTie) o hacer un while
$casoLength=;//length of $casoGridTie

// Empezar con el primer registro  estas operaciones
while ($caso<=$casoLength) {  //ciclar en cada gridTie
	// Hacer una tabla ce_gridtie_XXc que tenga la misma longitud y fecha/tiempo que ce_horasDelMes
	// CREATE TABLE ce_gridtie_XXc
	// SELECT fecha/tiempo FROM ce_horasDelMes
	// INSERT fecha/tiempo a ce_gridtie_XXc
		
	// leer el factor de efectividad de tabla ce_dispositivo, el 2do factor que es porcentaje y guardarlo en una variable	
	$eff=;//ce_dispositivo:factores(2) (%)
	
	// ir guardando en arreglo de 13 lugares los totales de cada mes, del 1-12 y el 13 se guarda cuando sea leap year (biciesto) cuando Feb tenga 29 dias (simplemente en este caso se copia lo mismo del día 28)
	array($mesTotal);

	// Obtener de tabla de ce_Casos de la columna de dispositivo_variable la lista de los dispositivos FV que estan conectados a ese gridTie, estan separados por coma si hay mas de uno
	// SELECT dispositivos_variable FROM ce_Casos
	// explode con coma separados
	array($fotoVolList);//dispositivo_variables from gridTie

	// Con cada dispositivo FV hacer...
	while(){
		if(){ // revisar si cada dispositivo FV tiene su tabla de respuesta generada (ce_fotovoltaico_respuesta_02c) y si no ejecutar  FotovolRespuesta.php para generarlo
		}

		// empezar agarrando todos los meses 1 y sumar acumulando valores
		$mes=1;//start with the first month in 
		while($mes<=13){ // ciclar en los meses de grid tie
			if($mes=13){ // caso cuando sea leap year, sumar febrero pero con el 28 contado 2 veces
				$mesList=; // filtrar la tabla fotovol para mostrar solo valores de $mes=2
				$mesTotal($mes)=$mesTotal+; // sumar todos los valores en ce_fotorespuesta para ese mes, multiplicarlo por $eff y sumarlo al mes total; mas un dia extra!!!
			}
			else(){
				$mesList=; // filter de la tabla fotovol para mostrar los demás meses
				$mesTotal($mes)=$mesTotal+; // sumar todos los valores en ce_fotorespuesta para ese mes, multiplicarlo por $eff y sumarlo al mes total
			}
		}
		$gridMes=1; // empezar en Enero
		    while($gridMes<=12) { // cycle through all months and set the same production values for each.
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