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
			
		}break;//CASE 4
	}//SWITCH
	
	return $url;
}
?>