<?php
function modulos(){
	switch($_REQUEST['mod']){
		case 1: require("modulos/index/index.php");break;
		case 2: require("modulos/acerca/index.php");break;
		case 3: require("modulos/proveedores/index.php");break;
		case 4:{ 
			switch($_REQUEST['act']){
				case 1: require("modulos/terrenos/alta.php");break;
				case 2: require("modulos/terrenos/editar.php");break;
				default: require("modulos/terrenos/index.php");break;	
			}
		}break;
		default: require("modulos/index/index.php");break;
	}
}

function titulo(){
	switch($_REQUEST['mod']){
		case 1: echo "Calculador Energ&eacute;tico";break;
		case 2: echo "Acerca de";break;
		case 3: echo "Proveedores";break;
		case 4: echo "Terrenos";break;
		default: echo "Calculador Energ&eacute;tico";break;
	}
}

function javascripts(){
	switch($_REQUEST['mod']){
		case 3: require("js/proveedores.js");break;
		case 4: require("js/terrenos.js");break;
	}
}
?>