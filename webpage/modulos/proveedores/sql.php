<?php
function query(){
	
	switch($_REQUEST['act']){
		case 1:{
			$nombre = 		$_REQUEST['nombre'];
			$ciudad = 		$_REQUEST['ciudad'];
			$direccion = 	$_REQUEST['direccion'];
			$rfc = 				$_REQUEST['rfc'];
			$mail = 			$_REQUEST['mail'];
			$lada = 			$_REQUEST['lada'];
			$tel = 				$_REQUEST['tel'];
			$lada_fax =		$_REQUEST['lada_fax'];
			$fax = 				$_REQUEST['fax'];
			$url = 				$_REQUEST['url'];	
			
			if(mysql_query("INSERT INTO ce_proveedores (nombre, ciudad, direccion, rfc, correo, telefono, fax, url, activado) 
											VALUES ('$nombre', '$ciudad', '$direccion', '$rfc', '$mail', '$lada-$tel', '$lada_fax-$fax', '$url', 0);")){
				$url = "index.php?mod=3&act=1&msj=1";
			}else{
				$url = "index.php?mod=3&act=1&msj=2";
			}			
		}//CASE 1
		;break;
	}//SWITCH
	
	return $url;
}
?>