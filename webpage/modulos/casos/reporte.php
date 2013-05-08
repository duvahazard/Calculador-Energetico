<?php
	$terreno_id = $_REQUEST["tid"];
	$caso_id    = $_REQUEST["cid"];

	$tarifa = getTarifa( $terreno_id );
	$segundo_anyo = getSegundoAnyo( $terreno_id, $caso_id);
	$arr_consumos_mes = getConsumosMes( $terreno_id, $caso_id, $segundo_anyo );
	$arr_costos_mes   = getCostosMes( $terreno_id, $caso_id, $segundo_anyo );
	$generacion_fotovoltaica = getGeneracionFotovoltaica( $terreno_id, $caso_id, $segundo_anyo );
	$consumo_electrico_CFE   = getConsumosMes( $terreno_id, 1, $segundo_anyo );
	$capacidad_sistema  = getCapacidadSistema( $terreno_id, $caso_id ); //"1 kWp";
	$ciudad_instalacion = getCiudadInstalacion( $terreno_id );
	$ahorro_anual       = getAhorroAnual($terreno_id, $caso_id, $segundo_anyo);
	$costo_total        = "$" . getCostoTotal( $terreno_id, $caso_id );
	$tiempo_amortizacion = "";
	$ahorro_mensual = getAhorroMensual( $terreno_id, $caso_id, $segundo_anyo );
	$pago_cfe_sistema = getPagoMensual( $terreno_id, $caso_id, $segundo_anyo );

?>

<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha">
  <b>Historial de consumo el&eacute;ctrico CFE (kWh)</b>
</div>

<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha" align="center">
  Tarifa el&eacute;ctrica CFE: <?php echo $tarifa; ?>
  <hr>
</div>

<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha" align="center">
  <table border="1">
  <tr>
  <td>Mes</td><td>Ene <?php echo $segundo_anyo; ?></td><td>Feb <?php echo $segundo_anyo; ?></td><td>Mar <?php echo $segundo_anyo; ?></td><td>Abr <?php echo $segundo_anyo; ?></td>
<td>May <?php echo $segundo_anyo; ?></td><td>Jun <?php echo $segundo_anyo; ?></td><td>Jul <?php echo $segundo_anyo; ?></td><td>Ago <?php echo $segundo_anyo; ?></td><td>Sep <?php echo $segundo_anyo; ?></td><td>Oct <?php echo $segundo_anyo; ?></td><td>Nov <?php echo $segundo_anyo; ?></td><td>Dic <?php echo $segundo_anyo; ?></td>
  </tr>
  <tr><td colspan="13"><hr></td></tr>
  <tr>
  <td>Consumo el&eacute;ctrico (kWh)</td>
  <?php
  	for( $i = 0; $i <12; $i ++ ) {
		echo "<td align='right'>" . $arr_consumos_mes[$i] . "</td>";
  	}
  ?>
  </tr>
  <tr>
  	<td colspan="13">&nbsp;</td>
  </tr>
  <tr>
  	<td>Factura CFE (pesos)</td>
	  <?php
		for( $i = 0; $i <12; $i ++ ) {
			echo "<td width='80px'>" . $arr_costos_mes[$i] . "</td>";
		}
	  ?>
  </tr>
  </table>
  <hr>
</div>


<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha" align="center">
<b>Informaci&oacute;n sobre el sistema fotovoltaico</b>
<table>
	<tr>
		<td>Capacidad del sistema: </td><td><?php echo $capacidad_sistema; ?></td><td>&nbsp;</td><td>Ciudad de instalaci&oacute;n: </td><td>&nbsp;&nbsp;<?php echo $ciudad_instalacion; ?></td>
	</tr>
	<tr>
		<td>Costo total del sistema (pesos)</td><td><?php echo $costo_total; ?></td><td>&nbsp;</td><td>Vida &uacute;til del sistema:</td><td>25 a&ntilde;os</td>
	</tr>
</table>
<hr>
</div>

<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha" align="center">
<b>Ahorro obtenido y tiempo de amortizaci&oacute;n del sistema fotovoltaico de <?php echo $capacidad_sistema; ?></b><br>
Ahorro anual en facturaci&oacute;n el&eacute;ctrica (pesos) : <?php echo $ahorro_anual; ?><br>
Tiempo de amortizaci&oacute;n: <?php echo $tiempo_amortizacion; ?><br>
<hr>
</div>

<div id="acerca" class="prefix_1 grid_14 suffix_1 alpha" align="center">
  <table>
  <tr>
  <td>Mes</td><td>Ene <?php echo $segundo_anyo; ?></td><td>Feb <?php echo $segundo_anyo; ?></td><td>Mar <?php echo $segundo_anyo; ?></td><td>Abr <?php echo $segundo_anyo; ?></td>
  <td>May <?php echo $segundo_anyo; ?></td><td>Jun <?php echo $segundo_anyo; ?></td><td>Jul <?php echo $segundo_anyo; ?></td><td>Ago <?php echo $segundo_anyo; ?></td>
  <td>Sep <?php echo $segundo_anyo; ?></td><td>Oct <?php echo $segundo_anyo; ?></td><td>Nov <?php echo $segundo_anyo; ?></td><td>Dic <?php echo $segundo_anyo; ?></td>
  </tr>
  <tr><td colspan="13"><hr></td></tr>
  <tr>
  <td>Generaci&oacute;n fotovoltaica (kWh)</td>
  <?php
  	for( $i = 0; $i <12; $i ++ ) {
		echo "<td>" . $generacion_fotovoltaica[$i] . "</td>";
  	}
  ?>
  </tr>
  <tr>
  	<td colspan="13">&nbsp;</td>
  </tr>
  <tr>
  	<td>Consumo el&eacute;trico a CFE (kWh)</td>
	  <?php
		for( $i = 0; $i <12; $i ++ ) {
			echo "<td>" . $consumo_electrico_CFE[$i] . "</td>";
		}
	  ?>
  </tr>
  <tr>
  	<td>Ahorro mensual(pesos)</td>
	  <?php
		for( $i = 0; $i <12; $i ++ ) {
			echo "<td width='80px'>" . $ahorro_mensual[$i] . "</td>";
		}
	  ?>
  </tr>
  <tr>
  	<td colspan="13">&nbsp;</td>
  </tr>
  <tr>
  	<td>Pago a CFE con Sistema</td>
	  <?php
		for( $i = 0; $i <12; $i ++ ) {
			echo "<td>" . $pago_cfe_sistema[$i] . "</td>";
		}
	  ?>
  </tr>
  <tr>
  	<td colspan="13">&nbsp;</td>
  </tr>

  </table>
  <hr>

</div>

<?php

	function getTarifa( $tid ) {

		$tarifa = "";
		$tabla = "ce_cfe_consumohistorico_". $tid ."t";

		$query =  mysql_fetch_array( mysql_query("SELECT * FROM ce_consumo WHERE factores LIKE '%$tabla%';") );
		$factores = explode(";", $query['factores']);

		$query  = mysql_fetch_array( mysql_query( "SELECT tipo FROM ce_tarifas_tipo WHERE id_tarifa = " . $factores[4] ) );
		$tarifa = $query["tipo"];

		return $tarifa;
	}

	function getSegundoAnyo( $tid, $cid ){

		$anyo = 0;
		$result = mysql_query("SELECT anyo FROM ce_medidorCFE_" . $tid ."t" . $cid . "c limit 1");

		if( $result ) {

			if( $rows =  mysql_fetch_array( $result ) ) {
				$anyo = $rows["anyo"];
				$anyo ++;
			}

			mysql_free_result( $result );

		}

		return $anyo;
	}

	function getConsumosMes( $tid, $cid, $anyo ) {

		$consumos = Array();
		$i = 0;

		$result = mysql_query("SELECT consumo FROM ce_medidorCFE_" . $tid ."t" . $cid . "c WHERE $anyo = " . $anyo );

		if( $result ) {

			while( $rows =  mysql_fetch_array( $result ) ) {
				$consumos[ $i ] = $rows["consumo"];

				$i ++;
			}

			mysql_free_result( $result );

		}

		return $consumos;
	}

	function getCostosMes( $tid, $cid, $anyo ) {

		$costos = Array();
			$i = 0;

			$result = mysql_query( "SELECT consumo".  $cid . " as consumo FROM ce_costodeconsumo_" . $tid ."t WHERE $anyo = " . $anyo );

			if( $result ) {

				while( $rows =  mysql_fetch_array( $result ) ) {
					$costos[ $i ] = "$" . $rows["consumo"];

					$i ++;
				}

				mysql_free_result( $result );

			}

		return $costos;

	//Array( "$760.26", "$567.43", "$549.66", "$366.13", "$467.25", "$1,264.12", "$1,890.41", "$1,986.35", "$1,502.03", "$532.33", "$601.22", "1,493.35" );

	}


	function getCiudadInstalacion( $tid ) {

		$ciudad = "";
		$result = mysql_query("SELECT ubicacion FROM ce_terreno WHERE id = $tid");

		if( $result ) {

			if( $rows =  mysql_fetch_array( $result ) ) {
				$ciudad = $rows["ubicacion"];
			}

			mysql_free_result( $result );

		}

		return $ciudad;
	}

	function getCostoTotal( $tid, $cid ) {

		$suma = 0;
		$result = mysql_query("SELECT ( (B.precio_dispositivo + B.precio_instalacion ) * A.dispositivos ) AS suma FROM ce_casos_". $tid . "t A, ce_dispositivos B WHERE A.caso = $cid AND A.id_dispositivo = B.id_dis");

		if( $result ) {

			while( $rows =  mysql_fetch_array( $result ) ) {
				$suma += $rows["suma"];
			}

			mysql_free_result( $result );

		}

		return $suma;

	}


	function getAhorroAnual( $tid, $cid, $segundo_anyo ) {

		$ahorro_anual = 0;
		$costo_caso_1 = getCostoAnual( $tid, 1, $segundo_anyo );
		$costo_caso_n = getCostoAnual( $tid, $cid, $segundo_anyo );
		$ahorro_anual = $costo_caso_1 - $costo_caso_n;

		return $ahorro_anual;
	}

	function getCostoAnual( $tid, $cid, $anyo ) {

		$suma = 0;
		$consumo_1 = 0; $consumo_12 = 0;
		$mes = "";
		$result = mysql_query("SELECT mes, consumo" . $cid . " AS consumo FROM ce_costodeconsumo_" . $tid . "t WHERE anyo = $anyo AND mes in(1, 12)");

		if( $result ) {

			while( $rows =  mysql_fetch_array( $result ) ) {
				$mes = $rows["mes"];
				if( $mes == 1 ) { $consumo_1 = $rows["consumo"]; }
				if( $mes ==12 ) { $consumo_12= $rows["consumo"]; }
			}

			mysql_free_result( $result );

		}

		return $consumo_12 - $consumo_1;
	}


	function getCapacidadSistema( $tid, $cid ) {

		$capacidad = " kWp";
		$cuenta = 0;
		$factores = "" ;
		$dispositivos = 0;
		$potencia = 0;
		$fact_arr = Array();


		$result = mysql_query( "select B.factores, A.dispositivos FROM ce_casos_". $tid . "t A, ce_dispositivos B WHERE A.id_tipo = 1 AND A.id_dispositivo = B.id_dis" );

		if( $result ) {

			while( $rows = mysql_fetch_array( $result ) ) {
				$factores     = $rows["factores"];
				$dispositivos = $rows["dispositivos"];

				$fact_arr = explode( ';', $factores );
				$potencia = $fact_arr[4];


				$cuenta = $cuenta + ( $dispositivos *  $potencia );
			}

			mysql_free_result( $result );
		}

		return $cuenta . "kWp";
	}

	function getGeneracionFotovoltaica( $tid, $cid, $anyo ) {
		$fv  = Array(0,0,0,0,0,0,0,0,0,0,0,0);
		$ids = Array();
		$i = 0;
		$j = 0;

		$result = mysql_query( "SELECT id FROM ce_casos_" . $tid . "t WHERE id_tipo = 4" );

		if( $result ) {

			while( $rows = mysql_fetch_array( $result ) ) {
				$ids[ $i ] = $rows["id"];
				$i ++;
			}

			mysql_free_result( $result );
		}

		for( $cont = 0; $cont < $i; $cont ++ ) {

			$j = 0;
			$result = mysql_query( "SELECT potenciaCS AS potencia FROM ce_gridtie_" . $tid . "t_" . $ids[$cont] . "g WHERE ano = ". $anyo ." ORDER BY mes ASC" );

			if( $result ) {
				while( $rows = mysql_fetch_array( $result ) ) {
					$fv[ $j ] += $rows["potencia"];
					$j ++;
				}

				mysql_free_result( $result );
			}

		}

		return $fv;
	}

	function getAhorroMensual( $tid, $cid, $anyo ) {
		$caso_1 =  getPagoMensual( $tid, 1, $anyo );
		$caso_n =  getPagoMensual( $tid, $cid, $anyo );
		$r = Array();


		for( $i = 0; $i < 12; $i ++ ) {
			$r[$i] = $caso_1[ $i ] - $caso_n[ $i ];
		}

		return $r;
	}

	function getPagoMensual( $tid, $cid, $anyo ) {
		$am  = Array(0,0,0,0,0,0,0,0,0,0,0,0);
		$costos = Array();
		$j = 1;

		$result = mysql_query( "SELECT consumo" . $cid . " as consumo FROM ce_costodeconsumo_" . $tid . "t WHERE anyo = " . ($anyo -1) . " AND mes = 12"  );

				if( $result ) {

					if( $rows = mysql_fetch_array( $result ) ) {
						$costos[ 0 ] = $rows["consumo"];
					}

					mysql_free_result( $result );

		}

		$result = mysql_query( "SELECT consumo" . $cid . " as consumo FROM ce_costodeconsumo_" . $tid . "t WHERE anyo = " . $anyo  );

		if( $result ) {

			while( $rows = mysql_fetch_array( $result ) ) {
				$costos[ $j ] = $rows["consumo"];
				$j ++;
			}

			mysql_free_result( $result );

		}

		for( $i = 1; $i <= 12; $i ++ ) {

			$am[ $i - 1] = $costos[ $i] - $costos[ ($i - 1) ];

		}


		return $am;
	}

?>
