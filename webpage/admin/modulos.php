<?php
function modulos(){
	switch($_REQUEST['mod']){
		case 1: require("modulos/index/index.php");break;
		case 3: require("modulos/proveedores/index.php");break;
		default: require("modulos/index/index.php");break;
	}
}
?>