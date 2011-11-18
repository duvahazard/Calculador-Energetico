<?php
function query(){
	
	switch($_REQUEST['act']){
		case 1:{
			$pid = $_REQUEST['pid'];
			if(mysql_query("UPDATE ce_proveedores SET activado=1 WHERE id=$pid;")){
				$url = "index.php?mod=3&act=1&msj=1";
			}else{
				$url = "index.php?mod=3&act=1&msj=2";
			}			
		}//CASE 1
		;break;
		case 2:{
			$pid = $_REQUEST['pid'];
			if(mysql_query("UPDATE ce_proveedores SET activado=0 WHERE id=$pid;")){
				$url = "index.php?mod=3&act=1&msj=1";
			}else{
				$url = "index.php?mod=3&act=1&msj=2";
			}			
		}//CASE 2
		;break;
		case 3:{
			$pid = $_REQUEST['pid'];
			if(mysql_query("DELETE FROM ce_proveedores WHERE id=$pid;")){
				$url = "index.php?mod=3&act=1&msj=1";
			}else{
				$url = "index.php?mod=3&act=1&msj=3";
			}			
		}//CASE 3
		;break;
	}//SWITCH
	
	return $url;
}
?>