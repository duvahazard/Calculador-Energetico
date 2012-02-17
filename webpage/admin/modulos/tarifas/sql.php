<?php
function query(){
	
	switch($_REQUEST['act']){
		
		case 1:{
			$table = "ce_tarifas_".$_REQUEST['tarifa'];  
			$fecha = $_REQUEST['mes'];
			$basico_bajo = $_REQUEST['basico_bajo'];
			$intermedio_bajo = $_REQUEST['intermedio_bajo'];
			$basico_alto = $_REQUEST['basico_alto'];
			$intermedio_alto = $_REQUEST['intermedio_alto'];
			$exedente_alto = $_REQUEST['exedente_alto'];
			
			mysql_query("INSERT INTO `".$table."` (fecha, basico_Bajo, intermedio_Bajo, basico_Alto, intermedio_Alto, exedente_Alto) 
												 VALUES('$fecha', '$basico_bajo', '$intermedio_bajo', '$basico_alto', '$intermedio_alto', '$exedente_alto')") or die('Hubo un error en el query, favor de regresar e intentarlo nuevamente.');
												 
			$url = 'index.php?mod=5&act=1&tarifa='.$_REQUEST['tarifa'].'&msj=1';	
			
		}break;
		
		/*case 2:{
			$fecha = $_REQUEST['mes'];
			$basico_bajo = $_REQUEST['basico_bajo'];
			$intermedio_bajo = $_REQUEST['intermedio_bajo'];
			$basico_alto = $_REQUEST['basico_alto'];
			$intermedio_alto = $_REQUEST['intermedio_alto'];
			$exedente_alto = $_REQUEST['exedente_alto'];
			
			mysql_query("INSERT INTO `ce_tarifas_1` (fecha, basico_Bajo, intermedio_Bajo, basico_Alto, intermedio_Alto, exedente_Alto) 
												 VALUES('$fecha', '$basico_bajo', '$intermedio_bajo', '$basico_alto', '$intermedio_alto', '$exedente_alto')") or die('Hubo un error en el query, favor de regresar e intentarlo nuevamente.');
												 
			$url = 'index.php?mod=5&act=1&tarifa='.$_REQUEST['tarifa'].'&msj=1';	
		}break;
		*/
		case 3:{
			$table = $_REQUEST['table'];
			$id = $_REQUEST['id'];
			$tarifa = $_REQUEST['tarifa'];
			mysql_query("DELETE FROM $table WHERE id='$id';") or die('Hubo un error en el query, favor de regresar e intentarlo nuevamente.');												 
			$url = 'index.php?mod=5&act=1&tarifa='.$tarifa;
		}break;
		
	}
		
	return $url;
}
?>