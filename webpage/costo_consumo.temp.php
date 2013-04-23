<?php
/* A program to calculate value of all costs for consumpiton for all the cases listed in ce_casos,
including CFE, Water, Gas LP, CO2 etc... for the calculado_energetico.

  Project Leader Rodger Evans, 2011-11-09
  sunnycanuck@gmail.com
  LEARS de CICESE
  revans@cicese.mx
  Collaborators Voxel Soluciones
  http://www.voxelsoluciones.com
  info@voxelsoluciones.com

  Published under the Creative Commons Attribution-ShareAlike 2.5 Generic (CC BY-SA 2.5) licence
  http://creativecommons.org/licenses/by-sa/2.5/

  Publicado bajo la Licencia Creative Commons Atribuci??n-CompartirIgual 2.5 M?©xico (CC BY-SA 2.5)
  http://creativecommons.org/licenses/by-sa/2.5/mx/

*/


function costo_de_consumo( $idterreno, $idcaso, $anyo_inicio ) {

  $insertar = False;
  $casos = Array();
  $casos[0] = $idcaso;

  $tabla_existe = consulta_costoconsumo_existe( $idterreno );

  if( $tabla_existe == 0 ) { // La tabla no existe
  		crea_tabla_costodeconsumo(  $idterreno );
  		$insertar = True;
  } else {
     if( $tabla_existe == 1 ) {
     	$insertar = True;
     	nivelarCasosEnTabla(  $idterreno, $idcaso );
     }
  }

  if( $idcaso != 1 && $tabla_existe != 2 ) {
  		$casos[1] = 1;
  }
	

  $tarifa  = getTarifa(  $idterreno );
		
  $medidor = getMedidor(  $idterreno, $casos, $anyo_inicio, $tarifa );
	
  $t_tipo  = getTarifasTipo(  $tarifa );
  $f_ini   = getFechaInicial(  $idterreno, $idcaso ); 
  $f_fin   = getFechaFinal  (  $idterreno, $idcaso ); 

 /// REVISAR QUE EN CE_TARIFAS_TIPO DIGA INVIERNO, y NO INVERNO
	$total_registros = count( $medidor );
	$estacion_anyo = "";
	$anyo_hoy = date("Y");
	$mes_hoy  = date("m");
	//////////
	$resultados = getPrecios( $idterreno, $casos );
	inserta_costodeconsumo(  $idterreno, $anyo_hoy, $mes_hoy, $casos, $resultados );

	$resultados[ $casos[0] ] = 0;	
	$resultados[ $casos[1] ] = 0;
///////////////
	for( $i = 0; $i < $total_registros; $i ++ ) {

		$estacion_anyo = getEstacion( $medidor[$i] -> mes );
		$pago = 0;

		$consumo = $medidor[$i]->v_consumo[ $casos[0] ];
		
		if( $consumo < $t_tipo[ $estacion_anyo ]["lim_basico"]  ) {
			$Pbb = $medidor[$i]->basicoBajo ;
			$Pib = $medidor[$i]->intermedioBajo ;
			$Bb  = $t_tipo[$estacion_anyo]["lim_basico_B"];
			$Ib  = $t_tipo[$estacion_anyo]["lim_int_B"];

			$minimo = $consumo;

			if( $Bb < $minimo ) { $minimo = $Bb; }
			$pago = $Pbb*$minimo;

			$minimo = $consumo;
			if( $Ib < $minimo ) { $minimo = $Ib;}

			$minimo = $minimo - $Bb;

			if( $minimo > 0 ) {
				$pago += $Pib*$minimo;
			}

		} else {
			$Pba = $medidor[$i]->basicoAlto;
			$Pia = $medidor[$i]->intermedioAlto;
			$Pea = $medidor[$i]->exedenteAlto;
			$Ba  = $t_tipo[$estacion_anyo]["lim_basico_A"];
			$Ia  = $t_tipo[$estacion_anyo]["lim_int_A"];
			$Ea  = $t_tipo[$estacion_anyo]["lim_exc_A"];

			$minimo = $consumo;
			if( $Ba <  $minimo ) { $minimo = $Ba;}

			$pago = $Pba*$minimo;

			$minimo = $consumo;
			if( $Ia < $minimo ) { $minimo = $Ia; }

			$minimo = $minimo-$Ba;

			if( $minimo > 0 ) {
				$pago += $Pia* $minimo;
			}

			$minimo = $consumo;
			if( $Ea < $minimo ) { $minimo = $Ea;}

			$minimo = $minimo - $Aa;

			if( $minimo > 0 ) {
				$pago += $Pea*$minimo;
			}

		} // Fin else

	 	$carga_fijo = $t_tipo[$estacion_anyo]["carga_fijo"] ;

		if( $pago < $carga_fijo ) {
			$pago = $carga_fijo;
		}
		

		$resultados[ $casos[0] ] += $pago;

		if( count($casos) > 1 ) {
			$consumo = $medidor[$i]->v_consumo[ $casos[1] ];			

		if( $consumo < $t_tipo[ $estacion_anyo ]["lim_basico"]  ) {
			$Pbb = $medidor[$i]->basicoBajo ;
			$Pib = $medidor[$i]->intermedioBajo ;
			$Bb  = $t_tipo[$estacion_anyo]["lim_basico_B"];
			$Ib  = $t_tipo[$estacion_anyo]["lim_int_B"];

			$minimo = $consumo;

			if( $Bb < $minimo ) { $minimo = $Bb; }
			$pago = $Pbb*$minimo;

			$minimo = $consumo;
			if( $Ib < $minimo ) { $minimo = $Ib;}

			$minimo = $minimo - $Bb;

			if( $minimo > 0 ) {
				$pago += $Pib*$minimo;
			}

		} else {
			$Pba = $medidor[$i]->basicoAlto;
			$Pia = $medidor[$i]->intermedioAlto;
			$Pea = $medidor[$i]->exedenteAlto;
			$Ba  = $t_tipo[$estacion_anyo]["lim_basico_A"];
			$Ia  = $t_tipo[$estacion_anyo]["lim_int_A"];
			$Ea  = $t_tipo[$estacion_anyo]["lim_exc_A"];

			$minimo = $consumo;
			if( $Ba <  $minimo ) { $minimo = $Ba;}

			$pago = $Pba*$minimo;

			$minimo = $consumo;
			if( $Ia < $minimo ) { $minimo = $Ia; }

			$minimo = $minimo-$Ba;

			if( $minimo > 0 ) {
				$pago += $Pia* $minimo;
			}

			$minimo = $consumo;
			if( $Ea < $minimo ) { $minimo = $Ea;}

			$minimo = $minimo - $Aa;

			if( $minimo > 0 ) {
				$pago += $Pea*$minimo;
			}

		} // Fin else

		$carga_fijo = $t_tipo[$estacion_anyo]["carga_fijo"] ;
		if( $pago < $carga_fijo ) {
			$pago = $carga_fijo;
		}

		$resultados[ $casos[1] ] += $pago;
		} // Fin count casos > 1

		if( $insertar ) {
			inserta_costodeconsumo(  $idterreno, $medidor[$i]->anyo, $medidor[$i]->mes, $casos, $resultados );
		} else {
			actualiza_costodeconsumo(  $idterreno, $medidor[$i]->anyo, $medidor[$i]->mes, $casos, $resultados );
		}

	} // Fin For	

}

function actualiza_costodeconsumo( $idterreno, $anyo, $mes, $casos, $resultados ){
	$sql = "UPDATE ce_costodeconsumo_" . $idterreno . "t SET consumo" . $casos[0] . "=" . $resultados[$casos[0]].
	       " WHERE anyo = " . $anyo . " AND mes = " . $mes ;

	 mysql_query( $sql );
}


function nivelarCasosEnTabla(  $idterreno, $idcaso ) {

	$casos = getCasos_cc(  $idterreno );


	if( !in_array( $idcaso, $casos ) ) {
		$sql = "ALTER TABLE ce_costodeconsumo_" . $idterreno . "t ADD consumo" . $idcaso . " FLOAT(9,3) NOT NULL";

		mysql_query($sql);
	}

}

function inserta_costodeconsumo(  $idterreno, $anyo, $mes, $casos, $resultados ) {


	$sql = "INSERT INTO ce_costodeconsumo_". $idterreno  . "t (anyo, mes, ";

	$total_casos = getCasos_cc( $idterreno );

	for( $i = 0; $i < count($total_casos); $i ++ ) {
		$sql.= "consumo" . $total_casos[$i] .", ";
	}

    $sql = substr( $sql, 0, strlen( $sql ) - 2 );
    $sql .= ") VALUES (" . $anyo . ", " . $mes . ", ";



    for( $i = 1; $i <= count($total_casos); $i ++ ) {

    	if( $i == $casos[0] || (count($casos) > 1 && $i == $casos[1] ) ) {
    		if( $i == $casos[0] ) {  $sql .= $resultados[$casos[0]] . ", "; } else { $sql .= $resultados[$casos[1]]. ", "; }

    	} else {
    		$sql .= "0, ";
    	}

    }

	$sql = substr( $sql, 0, strlen( $sql ) - 2 );
	$sql .= ")";


	mysql_query( $sql );
}


function getEstacion( $mes ){
	$mes = ((int) $mes );

	if( $mes >= 5 && $mes <= 9 ) {
		return "verano";
	}

	return "invierno";
}


function crea_tabla_costodeconsumo(  $idterreno ) {

	$sql = "CREATE TABLE ce_costodeconsumo_". $idterreno  . "t ".
		   "(
				 id INT PRIMARY KEY AUTO_INCREMENT,
				 anyo INT(11),
				 mes SMALLINT(2),";


	$casos = getCasos_cc( $idterreno );

	for( $i = 0; $i < count($casos); $i ++ ) {
		$sql.= "consumo" . $casos[$i] ." FLOAT(9,3),";
	}

    $sql = substr( $sql, 0, strlen( $sql ) - 1 );

	$sql .= ")";

	mysql_query($sql);
}

function getCasos_cc(  $idterreno ) {

	$salida = Array();
	$i = 0;

	$sql = "SELECT DISTINCT caso FROM ce_casos_" . $idterreno . "t";

	$resultado = mysql_query($sql);

	if( $resultado ) {

		while( $registro = mysql_fetch_array( $resultado ) ) {
             $salida[$i] = $registro["caso"];
             $i ++;
		}
	}

	return $salida;
}

function getPrecios(  $idterreno, $casos ) {

	$precios = Array();
		
	$i = 0;

	$sql = "SELECT A.caso, SUM( B.precio_dispositivo + B.precio_instalacion) AS precio from ce_casos_89t A, ce_dispositivos B WHERE A.caso in (";
				
	for( $i = 0; $i < count ($casos); $i++ ) {
		$sql .= $casos[$i] . ", ";
		$precios["".$i] = 0;
	}
				
	$sql = substr( $sql, 0, strlen( $sql ) -2 );								
	
	$sql .=") AND B.id_dis = A.id_dispositivo GROUP BY A.caso";
	
	$resultado = mysql_query($sql);

	if( $resultado ) {

		while( $registro = mysql_fetch_array( $resultado ) ) {
				$precios[ $registro["caso"] ] += $registro["precio"];
		}
	}
	return $precios;
}


function consulta_costoconsumo_existe(  $idterreno ) {

	$salida = 0;

	$sql = "SELECT id FROM ce_costodeconsumo_" . $idterreno . "t limit 1";

	$resultado = mysql_query($sql);

	if( $resultado ) {
		$salida = 1;
		if( $registro = mysql_fetch_array( $resultado ) ) {
             $salida = 2;
		}
	}

	return $salida;
}


function getFechaInicial(  $idterreno, $idcaso ) {

	$salida = "";
	$sql = "SELECT anyo, mes FROM ce_medidorCFE_" . $idterreno . "t" . $idcaso . "c limit 1";

	$resultado = mysql_query($sql);

	if( $resultado ) {

		if( $registro = mysql_fetch_array( $resultado ) ) {
             $salida = $registro["anyo"] . "-" . $registro["mes"];
		}
	}

	return $salida;
}


function getFechaFinal(  $idterreno, $idcaso ) {

	$salida = "";
	$sql = "SELECT anyo, mes FROM ce_medidorCFE_" . $idterreno . "t" . $idcaso . "c order by anyo desc, mes desc limit 1";

	$resultado = mysql_query($sql);

	if( $resultado ) {

		if( $registro = mysql_fetch_array( $resultado ) ) {
             $salida = $registro["anyo"] . "-" . $registro["mes"];
		}
	}

	return $salida;
}


function getTarifasTipo(  $tarifa ) {
	$salida = Array();
	$sql = "SELECT epoca, lim_basico_B, lim_int_B, lim_exc_B, lim_basico, lim_basico_A, lim_int_A, lim_alt_A, lim_exc_A, lim_DAC, carga_fijo FROM ce_tarifas_tipo WHERE tipo = '" . $tarifa . "'";

	$resultado = mysql_query($sql);

	if( $resultado ) {

			while( $registro = mysql_fetch_array( $resultado ) ){
				$epoca = $registro["epoca"];

				$salida[$epoca]["lim_basico_B"] = $registro["lim_basico_B"];
				$salida[$epoca]["lim_int_B"]    = $registro["lim_int_B"];
				$salida[$epoca]["lim_exc_B"]    = $registro["lim_exc_B"];
				$salida[$epoca]["lim_basico"]   = $registro["lim_basico"];
				$salida[$epoca]["lim_basico_A"] = $registro["lim_basico_A"];
				$salida[$epoca]["lim_int_A"]    = $registro["lim_int_A"];
				$salida[$epoca]["lim_exc_A"]    = $registro["lim_exc_A"];
				$salida[$epoca]["lim_DAC"]      = $registro["lim_DAC"];
				$salida[$epoca]["carga_fijo"]   = $registro["carga_fijo"];


			}

			mysql_free_result( $resultado );
	}

  return $salida;
}

function getTarifa(  $idterreno ) {

	$tarifa = "0";
	$sql = "SELECT tipo FROM ce_consumo WHERE secuencia = 'ce_cfe_consumohistorico_" . $idterreno . "t'";

	$resultado = mysql_query($sql);

	if( $resultado ) {

			if( $registro = mysql_fetch_array( $resultado ) ){
				$tarifa = $registro["tipo"];
			}

			mysql_free_result( $resultado );
	}

  return $tarifa;
}

//A.anyo, A.mes, A.consumo as consumo,
function getMedidor( $idterreno, $casos, $anyo_inicio, $tarifa ){
	$arreglo = Array();
    $sql = "SELECT A.basico_Bajo as bb, A.intermedio_Bajo as ib, A.basico_Alto as ba, A.intermedio_Alto as ia, A.exedente_Alto as ea, " .
           "B.anyo as anyo, B.mes as mes, B.consumo as consumo" . $casos[0];

    if( count( $casos ) > 1 ) { $sql .= ", C.consumo as consumo" . $casos[1]; }


    $sql.= " FROM ce_simtarifas_" . $tarifa . " A, ce_medidorCFE_" . $idterreno . "t" . $casos[0] . "c B";


	if( count( $casos ) > 1 ) { $sql .= ", ce_medidorCFE_" . $idterreno . "t" . $casos[1] ."c C"; }


    $sql.=  " WHERE A.ano >= " . $anyo_inicio . " AND A.ano = B.anyo AND A.mes = B.mes";

    if( count( $casos ) > 1 ) { $sql .= " AND B.anyo = C.anyo AND B.mes = C.mes"; }

	$resultado = mysql_query($sql);

 	if( $resultado ) {

	$idx = 0;

		while( $registro = mysql_fetch_array( $resultado ) ){
			//$idx = "". $registro["anyo"] . "-" . $registro["mes"];
		    $arreglo[$idx] = new consumo();
			$arreglo[$idx]->v_consumo[ $casos[0] ]  = $registro["consumo" . $casos[0] ];
			$arreglo[$idx]->anyo = $registro["anyo"];
			$arreglo[$idx]->mes  = $registro["mes"];

			if( count( $casos ) > 1 ) { $arreglo[$idx]->v_consumo[ $casos[1] ] = $registro["consumo" . $casos[1] ]; }

			$arreglo[$idx]->basicoBajo     = $registro["bb"];
			$arreglo[$idx]->intermedioBajo = $registro["ib"];
			$arreglo[$idx]->basicoAlto     = $registro["ba"];
			$arreglo[$idx]->intermedioAlto = $registro["ia"];
			$arreglo[$idx]->exedenteAlto   = $registro["ea"];
			$idx ++;
		}

		mysql_free_result( $resultado );
	}

    return $arreglo;
}


function grafica_costo_de_consumo(  $idterreno ) {
$salida = "";
$salida .= "<script type=\"text/javascript\" src=\"https://www.google.com/jsapi\"></script>\n";
$salida.="	    <script type=\"text/javascript\">\n";
$salida.="	      google.load(\"visualization\", \"1\", {packages:[\"corechart\"]});\n";
$salida.="	      google.setOnLoadCallback(drawChart);\n";
$salida.="	      function drawChart() {\n";
$salida.="	        var data = new google.visualization.DataTable();\n";
$salida.="	        data.addColumn('string', 'fecha');\n";



			        	$total_casos = getTotalCasos_cc(  $idterreno );


						for( $i = 1; $i <= $total_casos ; $i ++ ) {
	        				$salida.= "		        data.addColumn('number', 'caso". $i ."');\n";
	       				 }

						 $salida .= "data.addRows([\n";

						///// SE AGREGAN LOS DATOS YA ESTABLECIDOS
						$sql = "SELECT anyo, mes";

						for( $i = 1; $i <= $total_casos ; $i ++ ) {
							        				$sql .=", consumo" . $i;
	       				}

	       				$sql .=  " FROM ce_costodeconsumo_" . $idterreno . "t";

						$resultado = mysql_query( $sql );

						 if( $resultado ) {
						 	while( $registro = mysql_fetch_array( $resultado ) ) {
						 		$salida.= "		          ['".$registro[ "anyo"]. "-".$registro[ "mes"]."' ";
						 		for( $i = 1; $i <= $total_casos ; $i ++ ) {
									$salida.= ", " . $registro["consumo" . $i];
								}
								$salida.= "],\n";
						 	}



						 	mysql_free_result( $resultado );

						 }

								$salida = substr( $salida, 0, strlen( $salida) -2 ). "\n";



$salida.="	        ]);\n";
$salida.="\n";
$salida.="\n";
$salida.="			var options = {\n";
$salida.="	          width: 1000, height: 1000,\n";
$salida.="	          title: 'Costo de consumo terreno: ". $idterreno . "'\n";
$salida.="	        };\n";
$salida.="\n";
$salida.="	        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));\n";
$salida.="	        chart.draw(data, options);\n";
$salida.="	      }\n";
$salida.="    </script>\n";

  return $salida;

}
?>