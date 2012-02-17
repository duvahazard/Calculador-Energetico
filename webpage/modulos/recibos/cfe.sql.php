<?php
function query(){
	
	switch($_REQUEST['act']){
		case 1:{
			
			$tipo = $_REQUEST['tipo'];
			$demanda = $_REQUEST['demanda'];
			$factores = $_REQUEST['terreno'].';'.$_REQUEST['no_servicio'].';'.$_REQUEST['desde'].';'.$_REQUEST['hasta'].';'.$_REQUEST['tarifa'].';'.$_REQUEST['total_pagar'].';'.$_REQUEST['consumo_watts'].';'.$demanda.';'.$_REQUEST['lectura'].';'.$_REQUEST['medidor'];
			$variable = "mes; consumo; demanda";
			$secuencia = $_REQUEST['terreno'];
			$table = $_REQUEST['terreno'];
			
			if(mysql_query("INSERT INTO ce_consumo (tipo, factores, variable, secuencia) 
											VALUES ('$tipo', '$factores', '$variable', '$secuencia');")){				
				
				if(!empty($_REQUEST['consumo_historico']) and !empty($_REQUEST['historial'])){
					$consumo = $_REQUEST['consumo_historico'];
					$fecha = $_REQUEST['historial'];
					
					
					$i=0;
					foreach($_REQUEST['consumo_historico'] as $consumos){
						if(!empty($consumos)){
							$i++;
						}
					}			
					$j=0;
					foreach($_REQUEST['historial'] as $fechas){
						if(!empty($fechas)){
							$j++;
						}
					}			
					
					
					if($j == $i){
					
						for($k=0; $k<=$i-1; $k++){
							if(!empty($fecha[$k]) and !empty($consumo[$k])){
								
								//query para guardar a la base de datos de historico
								
								mysql_query("INSERT INTO $table (fecha, consumo) VALUES ('$fecha[$k]', '$consumo[$k]')") or die(mysql_error());
								
								$url = "index.php?mod=5&act=1&msj=1";
							}
							else{
								$url = "index.php?mod=5&act=1&msj=2";
							}
						}
					}else{
						$url = "index.php?mod=5&act=1&msj=3";
					}
					$url = "index.php?mod=5&act=1&msj=55";
				}//if !empty historial y consumo_historico
				else{
					$consumo_watts = $_REQUEST['consumo_watts'];
					$desde = $_REQUEST['desde'];
					mysql_query("INSERT INTO $table (fecha, consumo) VALUES ('$desde', '$consumo_watts')") or die(mysql_error());
					$url = "index.php?mod=5&act=1&msj=1";
				}
			
			}else{
				$url = "index.php?mod=5&act=1&msj=4";
			}// if mysql_query
			
			
		}//CASE 1
		;break;
		
		case 2:{
			$table = $_REQUEST['table'];
			$id = $_REQUEST['rid'];
			mysql_query("DELETE FROM $table WHERE id = $id") or die(mysql_error());
			$url = "index.php?mod=5&act=2&tarifa=".$_REQUEST['tarifa']."&terreno=".$_REQUEST['terreno'];// terminar aqui....
		}break;
		
	}//SWITCH
	
	
	return $url;
}
?>