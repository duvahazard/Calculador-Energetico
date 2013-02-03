<?php
/*
--------------------------------------------------------------------------
MODIFICACIONES:
--------------------------------------------------------------------------
Clave: HMN01
Autor: Héctor Mora
Fecha: 29-Nov-2012
Descripción del cambio: Se calcula si es bimestral o mensual el recibo.
--------------------------------------------------------------------------
*/

function query(){

	switch($_REQUEST['act']){
		case 1:{

            ////////////////////////// IDENTIFICA EL TIPO DE RECIBO  B = BIMESTRAL ; M = MENSUAL (HMN01) ////////////////////
			$desde_fecha = explode('-', $_REQUEST['desde'] );
			$hasta_fecha = explode('-', $_REQUEST['hasta'] );

			$total_fecha = count( $desde_fecha );
			$tipo_recibo = 'B';

			if( count( $desde_fecha ) > 1 && count( $hasta_fecha ) > 1 ) {

				$dif =  $hasta_fecha[1] - $desde_fecha[1] ;

				if( $dif < 0 ) {
					$hasta_fecha[1] = $hasta_fecha[1] + 12;
					$dif = $hasta_fecha[1] - $desde_fecha[1];
				}

				if( $dif < 2 ) {
					$tipo_recibo = 'M';
				}
			}
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

			$consumo = $_REQUEST['consumo_historico'];
			$fecha = $_REQUEST['historial'];
			$consumo_watts = $_REQUEST['consumo_watts'];
			$tipo = $_REQUEST['tipo'];
			$demanda = $_REQUEST['demanda'];
			$factores = $_REQUEST['terreno'].';'.$_REQUEST['no_servicio'].';'.$_REQUEST['desde'].';'.$_REQUEST['hasta'].';'.$_REQUEST['tarifa'].';'.$_REQUEST['total_pagar'].';'.$_REQUEST['consumo_watts'].';'.$demanda.';'.$_REQUEST['lectura'].';'.$_REQUEST['medidor'];
			$variable = "mes; consumo; demanda";
			$secuencia = $_REQUEST['terreno'];
			$table = $_REQUEST['terreno'];

			mysql_query("INSERT INTO ce_consumo (tipo, factores, variable, secuencia, tipo_recibo)
											VALUES ('$tipo', '$factores', '$variable', '$secuencia', '$tipo_recibo');");

			//mysql_query("INSERT INTO ".$table." (dia, mes, ano, consumo) VALUES ('".$dia."', '".$mes."', '".$ano."', '".$consumo[$k]."')") or die("Error al guardar recibo de CFE");   *****---------INSERTA PRIMER REGISTRO EN HISTORICO

			$consumo = $_REQUEST['consumo_historico'];
			$fecha = $_REQUEST['historial'];

			if(!empty($consumo) && !empty($fecha)){
				$i=0;
				foreach($_REQUEST['consumo_historico'] as $consumos){
					if(!empty($consumos)){
						$i++;
					}
				}//foreach
				$j=0;
				foreach($_REQUEST['historial'] as $fechas){
					if(!empty($fechas)){
						$j++;
					}
				}//foreach
				if($j !=0 && $i !=0){
					if($j == $i){
						for($k=0; $k<=$i-1; $k++){
							if(!empty($fecha[$k]) and !empty($consumo[$k])){
								//query para guardar a la base de datos de historico
								$date_par = explode('-', $fecha[$k]);
								$dia = $date_par[2];
								$mes = $date_par[1];
								$ano = $date_par[0];
								mysql_query("INSERT INTO ".$table." (dia, mes, ano, consumo) VALUES ('".$dia."', '".$mes."', '".$ano."', '".$consumo[$k]."')") or die("Error al guardar recibo de CFE");

								$url = "index.php?mod=5&act=2&msj=8&terreno=".$_REQUEST['id_terreno']."&tarifa=".$_REQUEST['tarifa'];
							}//if
						}//for
					}// if $j == $i
					else{
						$url = "index.php?mod=5&act=1&msj=9";
					}
				}//ij !=0
				else{

					$date_par = explode('-', $_REQUEST['desde']);
					$dia = $date_par[2];
					$mes = $date_par[1];
					$ano = $date_par[0];
					mysql_query("INSERT INTO $table (dia, mes, ano, consumo) VALUES ('".$dia."', '".$mes."', '".$ano."', '".$consumo_watts."')") or die ("Error al guardar recibo de CFE");
					$url = "index.php?mod=5&act=2&msj=8&terreno=".$_REQUEST['id_terreno']."&tarifa=".$_REQUEST['tarifa'];
				}
			}
			else{

				$date_par = explode('-', $_REQUEST['desde']);
				$dia = $date_par[2];
				$mes = $date_par[1];
				$ano = $date_par[0];
				mysql_query("INSERT INTO $table (dia, mes, ano, consumo) VALUES ('".$dia."', '".$mes."', '".$ano."', '".$consumo_watts."')") or die ("Error al guardar recibo de CFE");
				$url = "index.php?mod=5&act=2&msj=8&terreno=".$_REQUEST['id_terreno']."&tarifa=".$_REQUEST['tarifa'];
			}


		}//CASE 1
		;break;

		case 2:{
			$table = $_REQUEST['table'];
			$id = $_REQUEST['rid'];
			mysql_query("DELETE FROM $table WHERE id = $id") or die(mysql_error());
			$url = "index.php?mod=5&act=2&tarifa=".$_REQUEST['tarifa']."&terreno=".$_REQUEST['id_terreno']."&msj=12";// terminar aqui....
		}break;

		case 3:{
			$rid = $_REQUEST['rid'];
			$row = mysql_fetch_array(mysql_query("SELECT * FROM `ce_consumo` WHERE id=$rid;"));
			$factores_arreglo = explode(";", $row['factores']);
			$factores = $factores_arreglo[0].';'.$_REQUEST['no_servicio'].';'.$factores_arreglo[2].';'.$factores_arreglo[3].';'.$factores_arreglo[4].';'.$factores_arreglo[5].';'.$factores_arreglo[6].';'.$factores_arreglo[7].';'.$factores_arreglo[8].';'.$_REQUEST['medidor'];
			mysql_query("UPDATE ce_consumo SET factores = '".$factores."' WHERE id=".$rid.";") or die("Error al insertar factores en la tabla de Consumo, contacte a su administrador.");
			$url = "index.php?mod=5&act=2&tarifa=".$factores_arreglo[4]."&terreno=".$_REQUEST['terreno']."&msj=23";
		}break;

	}//SWITCH


	return $url;
}
?>