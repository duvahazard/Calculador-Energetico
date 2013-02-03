<?php
/*
------------------------------------------------------
MODIFICACIONES:
------------------------------------------------------
Clave: HMN01
Autor: Héctor Mora
Descripción: Se blindó el código para el mes 0
Fecha: 29/Noviembre/2012
-------------------------------------------------------
*/

function demanda_promedio( $tid ) {

				$nombre_tabla = "ce_demandapromedio_t".$tid."_c1";

				mysql_query("DROP TABLE IF EXISTS ". $nombre_tabla) or die("Error al borrar la tabla.");
				mysql_query(
						"CREATE TABLE ".$nombre_tabla."(
						 id INT PRIMARY KEY AUTO_INCREMENT,
						 mes INT,
						 demanda_promedio FLOAT);") or die("Error al crear la tabla.");

				$query = mysql_query("SELECT tipo_recibo FROM ce_consumo WHERE secuencia = 'ce_cfe_consumohistorico_" . $tid  ."t'" );
				$tipo_recibo = "";
				if( $row = mysql_fetch_array( $query ) ) {
					$tipo_recibo = $row["tipo_recibo"];
				}

				$recibo_mensual = strcmp( $tipo_recibo, "M" ) == 0;
				$i = 1;


				while($i <= 12){

					$mes_anterior = $i - 1;

					$query         = mysql_query("SELECT * FROM ce_cfe_consumohistorico_".$tid."t WHERE mes = $i ORDER BY mes, ano ASC;");
					$consumo       = 0;
					$sum_horas_mes = 0;

					while($row = mysql_fetch_array($query)){
						$consumo    = $row['consumo'] + $consumo;
						$resultado_mes_anterior = 0;
						$ano[]      = $row['ano'];


						$resultado  = mysql_fetch_array(mysql_query("SELECT num_horas FROM ce_horasDelMes WHERE mes = '".$i."' AND ano= '".$row['ano']."';"));

						if( $mes_anterior > 0 && !$recibo_mensual ) {
							$resultado2 = mysql_fetch_array(mysql_query("SELECT num_horas FROM ce_horasDelMes WHERE mes = '".$mes_anterior."' AND ano= '".$row['ano']."';"));
							$resultado_mes_anterior = $resultado2['num_horas'];
						} else {
							$resultado_mes_anterior = $resultado['num_horas'];
						}

						$sum_horas_mes = $resultado['num_horas'] + $resultado_mes_anterior + $sum_horas_mes;
					}

					if(!empty($consumo)){
							$cuantos_registros = count($ano);

							$sum_horas_mes = $sum_horas_mes / $cuantos_registros;
							$total_meses = $cuantos_registros;

							$consumo_promedio = $consumo / $total_meses;
							$demanda = (float) $consumo_promedio / $sum_horas_mes;

							if( !$recibo_mensual ) {
								if( $mes_anterior == 0 ) {
									$mes_anterior = 12;
								}

							mysql_query( "INSERT INTO ".$nombre_tabla." (mes, demanda_promedio) VALUES('".$mes_anterior."', ".$demanda.")" )
							         or die ("Error al guardar en la tabla: ".$nombre_tabla);
							}

							mysql_query("INSERT INTO ".$nombre_tabla." (mes, demanda_promedio) VALUES('".$i."', ".$demanda.")" ) or die ("Error al guardar en la tabla: ".$nombre_tabla);


						}
					$i++;
					unset($ano);
				}

}


?>