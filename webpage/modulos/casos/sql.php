<?php
function query(){
	
	switch($_REQUEST['act']){
		case 1:{
			$caso = $_REQUEST['caso'];
			$table = $_REQUEST['table'];
			$terreno = $_REQUEST['terreno'];
			$dispositivo_tipo = $_REQUEST['dispositivo_tipo'];
			$dis = $_REQUEST['dispositivo'];
			$id_tipo = $_REQUEST['id_tipo'];
			$cantidad = $_REQUEST['cantidad'];
			$alt = $_REQUEST['alt'];
			$az = $_REQUEST['az'];
			$equis = $_REQUEST['equis'];
			$ye = $_REQUEST['ye'];
			$zeta = $_REQUEST['zeta'];
			$gridtie = $_REQUEST['gtid'];
			
			$num_dis = count($dis);
			$i=0;
			while($i <= $num_dis){
				if(!empty($dis[$i])){					
					mysql_query("INSERT INTO $table (caso, id_dispositivo, id_tipo, dispositivos, dispositivos_variables, secuencia, medio_ambiente, gridtie_id) VALUES($caso, $dis[$i], $id_tipo, $cantidad[$i],'$alt[$i];$az[$i];$equis[$i];$ye[$i];$zeta[$i]','', '', $gridtie)") or die("Hubo un error al guardar la informaci&oacute;n, consulte a su administrador.");
				}else{
					break;
				}				
				$i++;
			}
			$url = 'index.php?mod=6&act=2&table='.$table.'&terreno='.$terreno.'&dispositivo_tipo='.$dispositivo_tipo.'&msj=1';
		}//CASE 1
		;break;
		case 2:{
			$id = $_REQUEST['id'];
			$table = $_REQUEST['table'];
			mysql_query("DELETE FROM $table WHERE id = $id;") or die ("Error al eliminar dispositivo de la base de datos, consulte a su administrador.");
			$url = "index.php?mod=6&act=2&table=".$table.'&terreno='.$_REQUEST['terreno'];
		}// CASE 2
		break;
		case 3:{
			$caso = $_REQUEST['caso'];
			$table = $_REQUEST['table'];
			$terreno = $_REQUEST['terreno'];
			$dis = $_REQUEST['dispositivo'];			
			$cantidad = $_REQUEST['cantidad'];
			$alt = $_REQUEST['alt'];
			$az = $_REQUEST['az'];
			$equis = $_REQUEST['equis'];
			$ye = $_REQUEST['ye'];
			$zeta = $_REQUEST['zeta'];
			
			mysql_query("UPDATE $table SET dispositivos = '$cantidad', dispositivos_variables = '$alt;$az;$equis;$ye;$zeta' WHERE id=$dis;") or die("Hubo un error al guardar la informaci&oacute;n, consulte a su administrador.");
			$url = 'index.php?mod=6&act=2&table='.$table.'&terreno='.$terreno.'&dispositivo_tipo='.$dispositivo_tipo.'&msj=1';
		}// CASE 3
		break;
		case 4:{
			$cid = $_REQUEST['cid'];
			$table = $_REQUEST['table'];
			$terreno = $_REQUEST['terreno'];
			mysql_query("DELETE FROM $table WHERE caso = $cid;") or die ("Error al eliminar el caso de la base de datos, consulte a su administrador.");
			$url = 'index.php?mod=6&act=2&table='.$table.'&terreno='.$terreno.'&dispositivo_tipo='.$dispositivo_tipo.'&msj=1';
		}// CASE 4
		break;
		case 5:{
			$caso = $_REQUEST['caso'];
			$table = $_REQUEST['table'];
			$terreno = $_REQUEST['terreno'];
			$dispositivo_tipo = $_REQUEST['dispositivo_tipo'];
			$dis = $_REQUEST['dispositivo'];
			$id_tipo = $_REQUEST['id_tipo'];
			$cantidad = $_REQUEST['cantidad'];
			
			$lunes_hr_ini = $_REQUEST['lunes_hr_ini'];
			$lunes_min_ini = $_REQUEST['lunes_min_ini']; 
			$martes_hr_ini = $_REQUEST['martes_hr_ini'];
			$martes_min_ini = $_REQUEST['martes_min_ini'];
			$miercoles_hr_ini = $_REQUEST['miercoles_hr_ini'];
			$miercoles_min_ini = $_REQUEST['miercoles_min_ini'];
			$jueves_hr_ini = $_REQUEST['jueves_hr_ini'];
			$jueves_min_ini = $_REQUEST['jueves_min_ini'];
			$viernes_hr_ini = $_REQUEST['viernes_hr_ini'];
			$viernes_min_ini = $_REQUEST['viernes_min_ini'];
			$sabado_hr_ini = $_REQUEST['sabado_hr_ini'];
			$sabado_min_ini = $_REQUEST['sabado_min_ini'];
			$domingo_hr_ini = $_REQUEST['domingo_hr_ini'];
			$domingo_min_ini = $_REQUEST['domingo_min_ini'];
			
			$lunes_hr_fin = $_REQUEST['lunes_hr_fin'];
			$lunes_min_fin = $_REQUEST['lunes_min_fin']; 
			$martes_hr_fin = $_REQUEST['martes_hr_fin'];
			$martes_min_fin = $_REQUEST['martes_min_fin'];
			$miercoles_hr_fin = $_REQUEST['miercoles_hr_fin'];
			$miercoles_min_fin = $_REQUEST['miercoles_min_fin'];
			$jueves_hr_fin = $_REQUEST['jueves_hr_fin'];
			$jueves_min_fin = $_REQUEST['jueves_min_fin'];
			$viernes_hr_fin = $_REQUEST['viernes_hr_fin'];
			$viernes_min_fin = $_REQUEST['viernes_min_fin'];
			$sabado_hr_fin = $_REQUEST['sabado_hr_fin'];
			$sabado_min_fin = $_REQUEST['sabado_min_fin'];
			$domingo_hr_fin = $_REQUEST['domingo_hr_fin'];
			$domingo_min_fin = $_REQUEST['domingo_min_fin'];
			
			$num_dis = count($dis);
			$i=0;
			while($i <= $num_dis){
				if(!empty($dis[$i])){
					$variables = 
						'Lun '.$lunes_hr_ini[$i].':'.$lunes_min_ini[$i].'-'.$lunes_hr_fin[$i].':'.$lunes_min_fin[$i].';'.
						'Mar '.$martes_hr_ini[$i].':'.$martes_min_ini[$i].'-'.$martes_hr_fin[$i].':'.$martes_min_fin[$i].';'.
						'Mie '.$miercoles_hr_ini[$i].':'.$miercoles_min_ini[$i].'-'.$miercoles_hr_fin[$i].':'.$miercoles_min_fin[$i].';'.
						'Jue '.$jueves_hr_ini[$i].':'.$jueves_min_ini[$i].'-'.$jueves_hr_fin[$i].':'.$jueves_min_fin[$i].';'.
						'Vie '.$viernes_hr_ini[$i].':'.$viernes_min_ini[$i].'-'.$viernes_hr_fin[$i].':'.$viernes_min_fin[$i].';'.
						'Sab '.$sabado_hr_ini[$i].':'.$sabado_min_ini[$i].'-'.$sabado_hr_fin[$i].':'.$sabado_min_fin[$i].';'.
						'Dom '.$domingo_hr_ini[$i].':'.$domingo_min_ini[$i].'-'.$domingo_hr_fin[$i].':'.$domingo_min_fin[$i].';'
						;
					mysql_query("
						INSERT INTO $table (caso, id_dispositivo, id_tipo, dispositivos, dispositivos_variables, secuencia, medio_ambiente) 
						VALUES($caso, $dis[$i], $id_tipo, $cantidad[$i],'$variables','', '')
					") 
					or die("Hubo un error al guardar la informaci&oacute;n, consulte a su administrador.");
					
				}else{
					break;
				}
				
				$i++;
			}
			$url = 'index.php?mod=6&act=2&table='.$table.'&terreno='.$terreno.'&dispositivo_tipo='.$dispositivo_tipo.'&msj=1';			
		}// CASE 5
		break;
		case 6:{
			$cid = $_REQUEST['cid'];
			$table = $_REQUEST['table'];
			$terreno = $_REQUEST['terreno'];
			extract(mysql_fetch_array(mysql_query("SELECT MAX( `caso` ) AS ultimo FROM $table;")));
			$caso = $ultimo + 1;
			$query = mysql_query("SELECT * FROM $table WHERE caso = $cid;");
			while($row = mysql_fetch_array($query)){
				mysql_query("
					INSERT INTO $table (caso, id_dispositivo, id_tipo, dispositivos, dispositivos_variables, secuencia, medio_ambiente) 
					VALUES(".$caso.", ".$row['id_dispositivo'].", ".$row['id_tipo'].", ".$row['dispositivos'].",'".$row['dispositivos_variables']."','', '')
				") 
				or die("Hubo un error al guardar la informaci&oacute;n, consulte a su administrador.");
			}
			$url = 'index.php?mod=6&act=2&table='.$table.'&terreno='.$terreno.'&msj=1';
		}// CASE 6
		break;
	}//SWITCH
	
	return $url;
}
?>