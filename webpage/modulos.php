<?php
function modulos(){
	$sid = $_SESSION['log'];
	$id = $_SESSION['userid'];
	$query = mysql_fetch_array(mysql_query("SELECT COUNT(id) AS total FROM `ce_usuarios` WHERE id = '$id' AND session = '$sid';"));
	
	if($query['total']==0){
		require("modulos/index/index.php");
	}else{	
		switch($_REQUEST['mod']){
			case 1: require("modulos/index/index.php");break;
			case 2: require("modulos/acerca/index.php");break;
			case 3: require("modulos/proveedores/index.php");break;
			case 4:{ 
				switch($_REQUEST['act']){
					case 1: require("modulos/terrenos/alta.php");break;
					case 2: require("modulos/terrenos/editar.php");break;
					case 3: require("modulos/terrenos/grafica_cs.php");break;
					default: require("modulos/terrenos/index.php");break;	
				}
			}break;
			case 5:{
				switch($_REQUEST['act']){
					case 1: require("modulos/recibos/cfe_index.php");break;
					case 2: require("modulos/recibos/cfe_alta.php");break;
					case 3: require("modulos/recibos/cfe_editar.php");break;
					default: require("modulos/recibos/index.php");break;
				}
			}break;
			case 6:{
				switch($_REQUEST['act']){
					case 1: require("modulos/casos/index.php");break;
					case 2: require("modulos/casos/alta.php");break;
					case 3: require("modulos/casos/editar.php");break;
					case 4: require("modulos/casos/editar2.php");break;
					case 5: require("modulos/casos/grafica_historico_cfe.php");break;
					default: require("modulos/casos/index.php");break;
				}break;
			}
			default: require("modulos/index/index.php");break;
		}// switch
	}
}

function titulo(){
	switch($_REQUEST['mod']){
		case 1: echo "Calculador Energ&eacute;tico";break;
		case 2: echo "Acerca de";break;
		case 3: echo "Proveedores";break;
		case 4: echo "Terrenos";break;
		case 5: echo "Recibos";break;
		case 6: echo "Casos";break;
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