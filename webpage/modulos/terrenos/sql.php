<?php
function query(){
	
	switch($_REQUEST['act']){
		case 1:{
			$uid = $_REQUEST['uid'];
			$nombre = $_REQUEST['nombre'];
			$latitude = $_REQUEST['latitude'];
			$longitude = $_REQUEST['longitude'];
			$ubicacion = $_REQUEST['ubicacion'];
			$dx = $_REQUEST['dx'];
			$dy = $_REQUEST['dy'];
			$phi = $_REQUEST['phi'];
			
			if(mysql_query("INSERT INTO ce_terreno (id_usuario, nombre, latitude, longitude, dx, dy, phi, ubicacion, csolar_table) VALUES('$uid', '$nombre', '$latitude', '$longitude', '$dx', '$dy', '$phi', '$ubicacion', '');")){
				$url = "index.php?mod=4&msj=1";
			}else{
				$url = "index.php?mod=4&act=1&msj=2";
			}
		}//CASE 1
		;break;
		case 2:{
			$tid = $_REQUEST['tid'];
			$nombre = $_REQUEST['nombre'];
			$latitude = $_REQUEST['latitude'];
			$longitude = $_REQUEST['longitude'];
			$ubicacion = $_REQUEST['ubicacion'];
			$dx = $_REQUEST['dx'];
			$dy = $_REQUEST['dy'];
			
			if(mysql_query("UPDATE ce_terreno SET nombre='$nombre', latitude='$latitude', longitude='$longitude', dx='$dx', dy='$dy', ubicacion='$ubicacion' WHERE id=$tid;")){
				$url = "index.php?mod=4&act=2&tid=".$tid."&msj=1";
			}else{
				$url = "index.php?mod=4&act=2&tid=".$tid."&msj=2";
			}
		}//CASE 2
		;break;
		case 3:{
			$tid = $_REQUEST['tid'];
			if(mysql_query("DELETE FROM ce_terreno WHERE id=$tid;")){
				$url = "index.php?mod=4&msj=3";
			}else{
				$url = "index.php?mod=4&msj=4";
			}
		}//CASE 3
		;break;
	}//SWITCH
	
	return $url;
}
?>