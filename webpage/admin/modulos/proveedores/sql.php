<?php
function query(){
	
	switch($_REQUEST['act']){
		//------------------------ACTIVAR REGISTRO ------------------------
		case 1:{
			$pid = $_REQUEST['pid'];
			if(mysql_query("UPDATE ce_proveedores SET activado=1 WHERE id=$pid;")){
				$url = "index.php?mod=3&act=2&msj=3";
			}else{
				$url = "index.php?mod=3&act=2&msj=4";
			}			
		}//CASE 1
		;break;
		//------------------------DESACTIVAR REGISTRO ------------------------
		case 2:{
			$pid = $_REQUEST['pid'];
			if(mysql_query("UPDATE ce_proveedores SET activado=0 WHERE id=$pid;")){
				$url = "index.php?mod=3&act=2&msj=3";
			}else{
				$url = "index.php?mod=3&act=2&msj=4";
			}			
		}//CASE 2
		;break;
		//------------------------BORRAR REGISTRO ------------------------
		case 3:{
			$pid = $_REQUEST['pid'];
			if(mysql_query("DELETE FROM ce_proveedores WHERE id=$pid;")){
				$url = "index.php?mod=3&act=2&msj=3";
			}else{
				$url = "index.php?mod=3&act=2&msj=5";
			}			
		}//CASE 3
		;break;
		//------------------------AGREGAR REGISTRO ------------------------
		case 4:{
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
				$url = "index.php?mod=3&act=2&msj=1";
			}else{
				$url = "index.php?mod=3&act=2&msj=2";
			}
		}break;//CASE 4
	}//SWITCH
	
	return $url;
}
?>